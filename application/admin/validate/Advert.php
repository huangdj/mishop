<?php

namespace app\admin\validate;

use think\Validate;

class Advert extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'category_id' => 'require',
        'title' => 'require|max:50',
        'photo_id' => 'require',
        'url' => 'require|url',
        'sort' => 'require|number|between:1,99',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'category_id.require' => '请选择分类',
        'title.require' => '请输入标题',
        'title.max' => '标题最多不能超过50个字符',
        'photo_id.require' => '请上传图片',
        'url.require' => '链接必须',
        'url.url' => '链接必须合法的',
        'sort.require' => '排序必须',
        'sort.number' => '排序必须是数字',
        'sort.between' => '排序只能在1-99之间',
    ];
}
