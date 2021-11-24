<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use thans\jwt\facade\JWTAuth;

class User extends Controller
{
    /***
     * 登录接口
     * @param Request $request
     * @return \think\response\Json
     */
    public function login(Request $request)
    {
        $data['name|email'] = $request->name;
        $data['password'] = set_password($request->password);

        if (!$data) {
            return json(['status' => false, 'message' => '请填写账号或密码']);
        }

        $user = \app\common\model\User::where($data)->find();

        if (!$user) {
            return json(['status' => false, 'message' => '账号或密码填写错误']);
        }
        $array_user = $user->toArray();
        $token = JWTAuth::builder($array_user);
        return json(['access_token' => $token, 'token_type' => 'Bearer', 'status' => true, 'message' => '登录成功']);
    }

    /***
     * 注册接口
     * @param Request $request
     * @return \think\response\Json
     */
    public function register(Request $request)
    {
        $name = $request->param('name');
        $email = $request->param('email');
        $password = set_password($request->password);
        $check_password = $request->check_password;

        if (!$name || !$password) {
            return json(['status' => false, 'message' => '用户或密码必填']);
        }

        $username = \app\common\model\User::where('name', $name)->find();
        if ($username) {
            return json(['status' => false, 'message' => '此用户名已被注册']);
        }

        $userEmail = \app\common\model\User::where('email', $email)->find();
        if ($userEmail) {
            return json(['status' => false, 'message' => '此邮箱已被注册']);
        }

        if ($check_password != $request->password) {
            return json(['status' => false, 'message' => '两次密码输入不一致']);
        }

        $user = \app\common\model\User::create([
            'name' => $name,
            'password' => $password,
            'email' => $email,
            'admin' => false,
        ]);

        return json(['user' => $user, 'status' => true, 'message' => '注册成功']);

    }
}
