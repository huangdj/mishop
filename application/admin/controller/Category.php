<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_mishop' => 'am-in',
            '_category' => 'am-active',
            'categories' => \app\common\model\Category::with('children.photo')->where('parent_id', 0)->order('sort')->select(),
        ]);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
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
        $validate = new \app\admin\validate\Category;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            \app\common\model\Category::create($request->param());
            $this->success('新增成功', '/admin/Category/index');
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
        $category = \app\common\model\Category::with('photo')->find($id);
        $this->assign(compact('category'));
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
        $validate = new \app\admin\validate\Category;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            \app\common\model\Category::where('id', $id)->update($request->param());
            return redirect('/admin/Category/index');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        $children = \app\common\model\Category::where('parent_id', $request->id)->count();
        if ($children > 0) {
            return json(['status' => 0, 'message' => '此分类有二级分类不能删除']);
        }

        \app\common\model\Category::destroy($request->id);
        return json(['status' => 1, 'message' => '删除成功']);
    }
}
