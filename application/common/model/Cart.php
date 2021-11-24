<?php

namespace app\common\model;

use think\Model;
use thans\jwt\facade\JWTAuth;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo('Product', 'product_id');
    }

    /**
     * 计算购物车总价和数量
     */
    static function count_cart($carts = null)
    {
        $count = [];

        //避免重复查询数据
        $carts = $carts ? $carts : self::with('product')->where('customer_id', session('wechat.customer.id'))->select();

        $total_price = 0;
        $num = 0;
        foreach ($carts as $v) {
            $total_price += $v->product->price * $v->num;
            $num += $v->num;
        }

        $count['total_price'] = $total_price;
        $count['num'] = $num;

        return $count;
    }

    /**
     * 计算购物车总价和数量--分离版商城
     */
    static function count_carts($carts = null)
    {
        $count = [];

        //避免重复查询数据
        $carts = $carts ? $carts : self::with('product')->where('user_id', JWTAuth::auth()['id'])->select();

        $total_price = 0;
        $num = 0;
        foreach ($carts as $v) {
            $total_price += $v->product->price * $v->num;
            $num += $v->num;
        }

        $count['total_price'] = $total_price;
        $count['num'] = $num;

        return $count;
    }
}
