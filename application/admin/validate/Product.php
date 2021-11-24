<?php

namespace app\admin\validate;

use think\Validate;

class Product extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'category_id' => 'require',
        'name' => 'require|max:255',
        'brand_id' => 'require',
        'photo_id' => 'require',
        'stock' => 'require|number',
        'sort' => 'require|number|between:1,99',
        'content' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'category_id.require' => '请选择分类',
        'name.require' => '请填写商品名称',
        'name.max' => '名称最多不能超过25个字符',
        'brand_id.require' => '请选择品牌',
        'photo_id.require' => '请选择缩略图',
        'stock.require' => '请填写库存',
        'stock.number' => '库存必须是数字',
        'sort.require' => '排序必须',
        'sort.number' => '排序必须是数字',
        'sort.between' => '排序只能在1-99之间',
        'content.require' => '请填写介绍信息',
    ];
}
