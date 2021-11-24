<?php

namespace app\backstage\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        echo "我是后台首页";
    }
}