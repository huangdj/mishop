<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Session;
use think\facade\Cookie;

class Common extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    private function check_login()
    {
        if (!Session::has('user')) {
            $this->error('您还没有登录，请先登录后再访问', '/admin/User/login');
        }

        //如果token不存在，肯定是还没有登录
//        if (!Cookie::get('token')) {
//            $this->error('您还没有登录', '/admin/User/login');
//        }
//
//        //如果token与数据库比对不上，表示用户伪造的token信息
//        $token = $_COOKIE['token'];
//        $user = \app\common\model\User::where(['token' => $token])->find();
//        if (!$user) {
//            $this->error('非法登录', '/admin/User/login');
//        }

//        Session::set('user', $user); // 登录成功后保存用户信息到session
    }
}
