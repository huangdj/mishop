<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Advert extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_advertCenter' => 'am-in',
            '_advert' => 'am-active',
            'categories' => \app\common\model\AdvertCategory::all()
        ]);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }
        };
        $adverts = \app\common\model\Advert::with(['photo', 'category'])->where($where)->order('sort', 'desc')->paginate(env('pageSize'));
        $this->assign(compact('adverts'));
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
        $validate = new \app\admin\validate\Advert;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            \app\common\model\Advert::create($request->param());
            $this->success('新增成功', '/admin/Advert/index');
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

    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete()
    {

    }
}
