<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Cart extends Controller
{
    protected $middleware = ['Wechat'];

    public function index()
    {
        $carts = \app\common\model\Cart::with('product.photo')->where('customer_id', session('wechat.customer.id'))->select();
        $count = \app\common\model\Cart::count_cart($carts);
        return view('cart/index', compact('carts', 'count'));
    }

    /***
     * 加入购物车
     * @param Request $request
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $cart = \app\common\model\Cart::where('product_id', $request->product_id)->where('customer_id', session('wechat.customer.id'))->find();

        if ($cart) {
            \app\common\model\Cart::where('id', $cart->id)->setInc('num');
            return;
        }

        //否则购物车表,创建新数据
        \app\common\model\Cart::create([
            'product_id' => $request->product_id,
            'customer_id' => session('wechat.customer.id'),
        ]);
    }

    /**
     * 修改购物车商品数量
     * @param Request $request
     * @return array
     */
    function change_num(Request $request)
    {
        if ($request->type == 'add') {
            \app\common\model\Cart::where('id', $request->id)->setInc('num');
        } else {
            \app\common\model\Cart::where('id', $request->id)->setDec('num');
        }
        return \app\common\model\Cart::count_cart();
    }

    /**
     * 删除
     * @param Request $request
     * @return array
     */
    function destroy(Request $request)
    {
        $id = $request->id;
        \app\common\model\Cart::destroy($id);
        return \app\common\model\Cart::count_cart();
    }
}
