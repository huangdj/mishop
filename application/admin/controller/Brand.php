<?php

namespace app\admin\controller;

use think\Request;
use think\Db;

class Brand extends Common
{
    function __construct()
    {
        parent::__construct();
        $this->assign([
            '_mishop' => 'am-in',
            '_brand' => 'am-active'
        ]);
    }

    public function index(Request $request)
    {
        $where = function ($query) use ($request) {
            //按名称
            if ($request->q and $request->q != ' ') {
                $search = "%" . $request->q . "%";
                $query->where('name', 'like', $search);
            }

        };
        $brands = Db::table('brand')->where($where)->order('sort', 'desc')->paginate(env('pageSize'));
        return view('index', compact('brands'));
    }

    public function add()
    {
        return $this->fetch();
    }

    public function store(Request $request)
    {
        $validate = new \app\admin\validate\Brand;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            Db::table('brand')->insert($request->param());
            $this->success('新增成功', '/admin/Brand/index');
        }
    }

    public function edit($id)
    {
        $brand = Db::table('brand')->find($id);
        $this->assign(compact('brand'));
        return $this->fetch();
    }

    public function update(Request $request, $id)
    {
        $validate = new \app\admin\validate\Brand;

        if (!$validate->check($request->param())) {
            $this->error($validate->getError());
        } else {
            Db::name('brand')->where('id', $id)->update($request->param());
            return redirect('/admin/Brand/index');
        }
    }

    public function destroy($id)
    {
        Db::name('brand')->where('id', $id)->delete();
        return redirect('/admin/Brand/index');
    }

    public function del_all(Request $request)
    {
        Db::table('brand')->whereIn('id', $request->checked_id)->delete();
        return json(['status' => 1, 'message' => '删除成功']);
    }
}
