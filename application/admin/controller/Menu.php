<?php

namespace app\admin\controller;

use think\Request;
use think\facade\Cache;
use think\exception\HttpException;

class Menu extends Common
{
    private $menu;

    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_weChat' => 'am-in',
            '_menu' => 'am-active'
        ]);

        $app = app('wechat.official_account');
        $this->menu = $app->menu;
    }

    public function index()
    {
        try {
            $buttons = Cache::remember('wechat_config_menus', function () {
                $menus = $this->menu->list();
                return $menus['menu']['button'];
            });
        } catch (HttpException $e) {
            $buttons = [];
        }

        $this->assign(compact('buttons'));
        return $this->fetch();
    }

    public function update(Request $request)
    {
        $buttons = wechat_menus($request->buttons);
        $this->menu->create($buttons);
        Cache::rm('wechat_config_menus');  // 清除缓存
        $this->success('编辑成功', '/admin/Menu/index');
    }

    public function delete()
    {
        $this->menu->delete();
        Cache::rm('wechat_config_menus');
        $this->success('删除成功', '/admin/Menu/index');
    }

}
