<?php

namespace app\index\controller;

use app\job\CloseOrder;
use think\Controller;
use think\facade\Config;
use think\Request;
use think\Db;
use Naixiaoxin\ThinkWechat\Facade;
use think\Queue;

class Order extends Controller
{
    protected $middleware = [
        'Wechat' => ['except' => ['notify']],
    ];

    /***
     * 服务---全部订单
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $this->assign([
            '_customer' => 'on'
        ]);

        $orders = \app\common\model\Order::with(['orderProducts.product.photo', 'address'])->order('create_time', 'desc')->select();
        $order_status = Config::get('admin.order_status');
        return view('order/index', compact('orders', 'order_status'));
    }

    /***
     * 去结算
     * @return \think\response\Redirect|\think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function checkout()
    {
        $carts = \app\common\model\Cart::with('product')->where('customer_id', session('wechat.customer.id'))->select();
        $count = \app\common\model\Cart::count_cart($carts);

        //如果购物车中没有商品,跳回购物车页面
        if ($carts->isEmpty()) {
            return redirect('/index/Cart/index');
        }

        $address = \app\common\model\Address::where('id', session('wechat.customer.address_id'))->find();
        return view('order/checkout', compact('carts', 'count', 'address'));
    }

    /***
     * 去付款--即下单
     * @param Request $request
     * @return \think\response\Json
     */
    public function store(Request $request)
    {
        $count = \app\common\model\Cart::count_cart();
        $total_price = $count['total_price'];
        $data = [];

        // 启动事务
        Db::startTrans();

        try {
            //生成订单
            $order = \app\common\model\Order::create([
                'customer_id' => session('wechat.customer.id'),
                'total_price' => $total_price,
                'status' => 1,
                'order_no' => \app\common\model\Order::make_orderNo()
            ]);

            //订单地址
            $address = \app\common\model\Address::find($request->address_id);
            $order->address()->save([
                'province' => $address['province'],
                'city' => $address['city'],
                'area' => $address['area'],
                'detail' => $address['detail'],
                'name' => $address['name'],
                'tel' => $address['tel'],
            ]);

            $carts = \app\common\model\Cart::with('product')->where('customer_id', session('wechat.customer.id'))->select();
            foreach ($carts as $cart) {
                //判断库存是否足够
                if ($cart->product->stock != '-1' and $cart->product->stock - $cart->num < 0) {
                    throw new \Exception('商品' . $cart->product->name . ", 目前仅剩下" . $cart->product->stock . " 件. \n请返回购物车, 修改订单后再下单!");
                }

                //削减库存数量
                if ($cart->product->stock != '-1') {
                    $cart->product->setDec('stock', $cart->num);
                }

                //插入订单商品表
                $order->orderProducts()->save([
                    'product_id' => $cart->product_id,
                    'num' => $cart->num
                ]);
            }

            //清空购物车
            \app\common\model\Cart::where('customer_id', session('wechat.customer.id'))->delete();

            // 提交事务
            Db::commit();
            Queue::later(env('order_ttl'), CloseOrder::class, $data=$order, $queue = null);
            return json(['status' => 1, 'order_id' => $order->id]);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return json(['status' => 0, 'info' => $e->getMessage()]);
        }
    }

    /***
     * 唤起微信支付
     * @param $id
     * @return \think\response\Json|\think\response\View
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function pay($id)
    {
        $payment = Facade::payment();

        /**
         * 第 1 步：查询订单并计算金额
         */
        $order = \app\common\model\Order::with('address')->find($id);

        //计算总价格, 以分为单位, 所以: *100
        $total_fee = ($order->total_price) * 100;

        /**
         * 第 2 步：统一下单
         */
        $result = $payment->order->unify([
            'detail' => '长乐衣品汇',
            'body' => '订单号:' . $order->order_no,
            'out_trade_no' => $order->order_no,
            'total_fee' => $total_fee,
            'notify_url' => 'https://mishop.holyzq.com/index/Order/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
//            'openid' => session('wechat.customer.openid'),
            'openid' => 'ojoGDjgE9PjlDc8b7ParXiM8iwTE',
        ]);

//        return $result['result_code'];


        /**
         * 第 3 步：JSSDK
         */
        if ($result['result_code'] == 'SUCCESS' && $result['return_code'] == 'SUCCESS') {
            $prepayId = $result['prepay_id'];
            $jssdk = $payment->jssdk;
            $json = $jssdk->sdkConfig($prepayId);
            return view('order/show_pay', compact('order', 'json'));
        } else {
            return json($result);
        }
    }

    /***
     * 微信支付回调
     * @throws \EasyWeChat\Kernel\Exceptions\Exception
     */
    public function notify()
    {
        $payment = Facade::payment();

        $response = $payment->handlePaidNotify(function ($message, $fail) {

            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = \app\common\model\Order::where('order_no', $message['out_trade_no'])->find();

            if (!$order || $order->pay_time) { // 如果订单不存在 或者 订单已经支付过了
                return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }

            // 如果订单存在，检查订单是否已经更新过支付状态
            if ($order->status >= 2) { // 状态 >= 2 代表已经支付
                return true; // 已经支付成功了就不再更新了
            }

            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                if ($message['result_code'] === 'SUCCESS') {
                    $order->pay_time = date('Y-m-d H:i:s', time()); // 更新支付时间为当前时间
                    $order->status = 2;

                    // 用户支付失败
                } elseif ($message['result_code'] === 'FAIL') {
                    $order->status = 1;
                }
            } else {
                return $fail('通信失败，请稍后再通知我');
            }

            $order->save(); // 保存订单

            return true; // 返回处理完成
        });

        $response->send();
    }
}
