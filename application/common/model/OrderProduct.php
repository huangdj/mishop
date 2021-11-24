<?php

namespace app\common\model;

use think\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    public function product()
    {
        return $this->belongsTo('Product', 'product_id');
    }
}
