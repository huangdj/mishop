<?php

namespace app\admin\controller;

use think\Request;

class Advertcategory extends Common
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_advertCenter' => 'am-in',
            '_advertCategory' => 'am-active'
        ]);
    }

    /***
     * 广告分类
     */
    public function index()
    {
        $advertCategories = \app\common\model\AdvertCategory::order('sort', 'desc')->select();
        $this->assign(compact('advertCategories'));
        return $this->fetch();
    }


    /***
     * 新增分类
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $info = \app\common\model\AdvertCategory::create($request->param());
        $data = ['id' => $info->id, 'msg' => '新增成功', 'status' => 1];
        return json($data);
    }

    /***
     * 编辑分类
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $advertCategory = \app\common\model\AdvertCategory::find($id);
        $advertCategory->update($request->param());
        $data = ['msg' => '编辑成功', 'status' => 1];
        return json($data);
    }

    /***
     * 删除分类
     * @param Request $request
     */
    public function delete_cate(Request $request)
    {
        \app\common\model\AdvertCategory::destroy($request->id);
        $data = ['msg' => '删除成功', 'status' => 1];
        return json($data);
    }
}
