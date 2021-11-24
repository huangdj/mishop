<?php

namespace app\index\controller;

use app\common\model\Advert;
use app\common\model\Product;
use think\Controller;
use think\facade\Session;
use think\Request;

class Index extends Controller
{
    protected $middleware = ['Wechat'];

    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_index' => 'on'
        ]);
    }

    /***
     * 商城首页
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $adverts = Advert::with('photo')->where('category_id', 1)->order('sort', 'desc')->select();

        $banners = Advert::with('photo')->where('category_id', 2)->order('sort', 'desc')->select();

        $products = Product::with('photo')->where('is_onsale', true)->order('sort')->limit(2)->select();

        $total = Product::where('is_onsale', true)->count();

        return view('index', compact('adverts', 'banners', 'products', 'total'));
    }


    /***
     * 滑动加载更多数据
     * @param Request $request
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function get_products(Request $request)
    {
        $page = $request->page;
        $num = 2;
        $products = Product::with('photo')->where('is_onsale', true)->limit($page, $num)->order('sort')->select();
        return $products;
    }

    /***
     * 商品详情
     * @param $id
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function show($id)
    {
        $product = Product::with('galleries')->find($id);

        $recommends = Product::with('photo')->where('is_recommend', true)->where('id', '<>', $id)
            ->order('is_top', 'desc')->select();
        return view('show', compact('product', 'recommends'));
    }

    /***
     * 首页搜索
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function search()
    {
        $products = Product::where('is_recommend', true)
            ->order('is_top', 'desc')
            ->order('created_at')
            ->select();
        return view('search', compact('products'));
    }

}
