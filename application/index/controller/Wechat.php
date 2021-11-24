<?php

namespace app\index\controller;

use think\Controller;

class Wechat extends Controller
{
    public function index()
    {
        // 先初始化微信
        $app = app('wechat.official_account');
        $app->server->push(function ($message) {
            return '欢迎关注长乐衣品汇， 赶快进入商城逛逛吧~';
        });
        $app->server->serve()->send();
    }

}
