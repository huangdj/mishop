<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    public function children()
    {
        return $this->hasMany('Category', 'parent_id')->order('sort');
    }

    public function photo()
    {
        return $this->belongsTo('Photo', 'photo_id');
    }

    public function products()
    {
        return $this->belongsToMany('Product');
    }
}
