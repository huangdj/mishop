<?php

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Request;
use think\facade\Session;
use think\facade\Cookie;

class User extends Controller
{
    public function login(Request $request)
    {
        if ($_POST) {
            $data['name|email'] = $request->name;
            $data['password'] = set_password($request->password);
            $captcha = $request->captcha;
            if (!captcha_check($captcha)) {
                $this->error('验证码填写错误');
            }
            $user = \app\common\model\User::where($data)->find();
            if (!$user) {
                $this->error('用户名或密码填写错误');
            }

//            //随机生成token
//            $token = md5(uniqid() . rand(100000, 999999));
//            //把token值存入数据库
//            \app\common\model\User::where(['id' => $user->id])->setField('token', $token);
//
//            //判断是否勾选了记住密码
//            if ($request->remember) {
//                Cookie::set('token', $token, time() + 60);
//            } else {
//                Cookie::set('token', $token, null);
//            }
            Session::set('user', $user);
            $this->success('登录成功', '/admin');
        } else {
            return view('login');
        }
    }

    public function logout()
    {
        Session::flush();
        cookie('token', null);
        $this->success('您已成功退出', '/admin/User/login');
    }

    public function verify()
    {
        $config = [
            // 验证码字体大小
            'fontSize' => 30,
            // 验证码位数
            'length' => 4,
            'codeSet' => '123456789',
            // 关闭验证码杂点
            'useNoise' => false,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }


}
