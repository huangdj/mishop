<?php

namespace app\admin\controller;

class Index extends Common
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_admin' => 'am-active'
        ]);
    }

    public function index()
    {
        return view('index');
    }


}
