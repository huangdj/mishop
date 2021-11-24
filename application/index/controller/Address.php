<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\facade\Session;

class Address extends Controller
{
    protected $middleware = ['Wechat'];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $addresses = \app\common\model\Address::where('customer_id', session('wechat.customer.id'))->select();
        foreach ($addresses as $k => $v) {
            $xing = substr($v['tel'], 3, 4);  //获取手机号中间四位
            $addresses[$k]['tel'] = str_replace($xing, '****', $v['tel']);  //用****进行替换
        }
//        return $addresses;
        $this->assign(compact('addresses'));
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $pca = explode(" ", $request->pca);
        \app\common\model\Address::create([
            'customer_id' => session('wechat.customer.id'),
            'name' => $request->name,
            'province' => $pca[0],
            'city' => $pca[1],
            'area' => $pca[2],
            'tel' => $request->tel,
            'detail' => $request->detail,
        ]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $address = \app\common\model\Address::find($id);
        $this->assign(compact('address'));
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $pca = explode(" ", $request->pca);

        \app\common\model\Address::where('id', $id)
            ->update([
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
            ]);
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\common\model\Address::destroy($id);
        return redirect('/index/Address/manage');
    }

    /***
     * 设置默认地址
     * @param Request $request
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function change_default(Request $request)
    {
        \app\common\model\Customer::where('id', session('wechat.customer.id'))->update(['address_id' => $request->address_id]);

        //重新设置session
        $customer = Session::get('wechat.customer');
        $customer->address_id = $request->address_id;
        $customer->save();

        Session::set('wechat.customer', $customer);
    }

    /***
     * 服务--地址管理
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function manage()
    {
        $addresses = \app\common\model\Address::where('customer_id', session('wechat.customer.id'))->order('create_time', 'desc')->select();
        $this->assign(compact('addresses'));
        return $this->fetch();
    }
}
