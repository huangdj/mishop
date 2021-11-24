<?php

namespace app\common\model;

use think\Model;

class Advert extends Model
{
    protected $autoWriteTimestamp = 'datetime';

    public function photo()
    {
        return $this->belongsTo('Photo', 'photo_id');
    }

    public function category()
    {
        return $this->belongsTo('AdvertCategory', 'category_id');
    }
}
