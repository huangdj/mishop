<?php

namespace app\index\controller;

use think\Controller;

class Customer extends Controller
{
    protected $middleware = ['Wechat'];
    /***
     * 服务
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

        $customer = session('wechat.customer.headimgurl');
        return view('index', compact('customer'));
    }


}
