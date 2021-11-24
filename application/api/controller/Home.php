<?php /** @noinspection ALL */

/**
 * Created by PhpStorm.
 * User: huangdongjin
 * Date: 2020/05/08
 * Time: 20:38
 */

namespace app\api\controller;

use app\common\model\Advert;
use app\common\model\Product;
use think\Controller;
use think\Request;
use thans\jwt\facade\JWTAuth;

class Home extends Controller
{
    /**
     * 首页
     * @return \think\response\View
     */
    public function index()
    {
        $adverts = Advert::with('photo')->where('category_id', 1)->order('sort', 'desc')->select();

        $banners = Advert::with('photo')->where('category_id', 2)->order('sort', 'desc')->select();

        $products = Product::with('photo')->where('is_onsale', true)->order('sort')->limit(2)->select();

        $total = Product::where('is_onsale', true)->count();

        return success_json(compact('adverts', 'banners', 'products', 'total'), '查询成功!');
    }

    /***
     * 商城详情
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
        return success_json(compact('product', 'recommends'), '查询成功!');
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

}
