<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Product extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_mishop' => 'am-in',
            '_product' => 'am-active',
            'categories' => \app\common\model\Category::with('children.photo')->where('parent_id', 0)->order('sort')->select(),
            'brands' => Db::table('brand')->where('is_show', true)->select()
        ]);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $products = \app\common\model\Product::all_products($request);
        $attributes = ['is_onsale', 'is_top', 'is_recommend', 'is_hot', 'is_new'];
        $this->assign(compact('products', 'attributes'));
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = new \app\admin\validate\Product;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            $request->created_at = date('Y-m-d H:i:s', time());
            $product = \app\common\model\Product::create($request->param());
            if ($request->has('imgs')) {
                foreach ($request->imgs as $v) {
                    $product->galleries()->save(['img' => $v]);
                }
            }

            $product->categories()->saveAll($request->category_id);
            $this->success('新增商品成功', '/admin/Product/index');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $product = \app\common\model\Product::with(['photo', 'brand', 'categories', 'galleries'])->find($id);
        $this->assign(compact('product'));
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $validate = new \app\admin\validate\Product;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            $product = \app\common\model\Product::find($id);
            $product->update($request->param());

            $product->categories()->sync($request->category_id);

            if ($request->has('imgs')) {
                foreach ($request->imgs as $v) {
                    $product->galleries()->save(['img' => $v]);
                }
            }

            $this->success('编辑商品成功', '/admin/Product/index');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        \app\common\model\Product::destroy($id);
        $this->success('此商品已被移至回收站', '/admin/Product/index');
    }

    /***
     * 删除相册
     * @param Request $request
     */
    public function destroy_gallery(Request $request)
    {
        \app\common\model\Gallery::destroy($request->id);
    }

    /***
     * 改变属性
     * @param Request $request
     */
    public function change_attr(Request $request)
    {
        $product = \app\common\model\Product::find($request->id);
        $attr = $request->attr;
        \app\common\model\Product::where(['id' => $request->id])->setField($attr, !$product[$request->attr]);
    }

    /***
     * 商品回收站
     */
    public function trash()
    {
        $this->assign([
            '_mishop' => 'am-in',
            '_product' => '',
            '_trash' => 'am-active',
        ]);
        $products = \app\common\model\Product::onlyTrashed()->with(['photo', 'brand', 'categories'])->order('created_at', 'desc')->paginate(env('pageSize'));
        $this->assign(compact('products'));
        return $this->fetch();
    }

    /***
     * 恢复商品
     */
    public function restore($id)
    {
        $product = \app\common\model\Product::onlyTrashed()->find($id);
        $product->restore();
        $this->success('商品恢复成功', '/admin/Product/index');
    }

    /***
     * 彻底删除商品
     */
    public function destroy($id)
    {
        $product = \app\common\model\Product::onlyTrashed()->find($id);
        $product->delete(true);
        \app\common\model\ProductCategory::where('product_id', $id)->delete();
        \app\common\model\Gallery::where('product_id', $id)->delete();
        \app\common\model\Photo::where('id', $id)->delete();
        $this->success('商品已被彻底删除', '/admin/Product/trash');
    }
}
