<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_category' => 'on'
        ]);
    }

    /***
     * 分类
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $categories = \app\common\model\Category::with('children.photo')->where('parent_id', 0)->order('sort')->select();
        return view('index', compact('categories'));
    }

    /***
     * 分类对应的商品
     * @param Request $request
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function product(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('category_id') and $request->category_id != '') {
                $result = \app\common\model\ProductCategory::where('category_id', $request->category_id)->select()->toArray();
                $product_ids = array_column($result, 'product_id');
                $query->whereIn('id', $product_ids);
            }

            // 首页搜索
            if ($request->has('searchword')) {
                if ($request->has('searchword') and $request->searchword != '') {
                    $search = "%" . $request->searchword . "%";
                    $query->where('name', 'like', $search);
                }
            }
        };

        $products = \app\common\model\Product::where($where)->with('photo')
            ->order('is_top', "desc")->order('created_at')
            ->select();
        return view('product', compact('products'));
    }

}
