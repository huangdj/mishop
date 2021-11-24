<?php

namespace app\common\model;

use think\Model;
use think\Request;
use think\model\concern\SoftDelete;

class Product extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function categories()
    {
        return $this->belongsToMany('Category');
    }

    public function galleries()
    {
        return $this->hasMany('Gallery', 'product_id');
    }

    public function photo()
    {
        return $this->belongsTo('Photo', 'photo_id');
    }

    public function brand()
    {
        return $this->belongsTo('Brand', 'brand_id');
    }

    /***
     * 增加库存
     * @param $num
     * @return int
     */
    public function addStock($num)
    {
        return $this->setInc('stock', $num);
    }

    static function all_products(Request $request)
    {
        $where = function ($query) use ($request) {
            //按名称
            if ($request->keyword and $request->keyword != '') {
                $search = "%" . $request->keyword . "%";
                $query->where('name', 'like', $search);
            }

            //按品牌
            if ($request->brand_id and $request->brand_id != '') {
                $query->where('brand_id', $request->brand_id);
            }

            // 按分类
            if ($request->has('category_id') and $request->category_id != '') {
                $result = \app\common\model\ProductCategory::where('category_id', $request->category_id)->select()->toArray();
                $product_ids = array_column($result, 'product_id');
                $query->whereIn('id', $product_ids);
            }

            // 按日期
            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->created_at);

                $start = $time[0] . ' 00:00:00';
                $end = $time[1] . ' 23:59:59';
                $query->whereTime('created_at', 'between', [$start, $end]);
            }
        };

        $products = self::with(['photo', 'brand', 'categories'])->where($where)->order('created_at', 'desc')->paginate(env('pageSize'));
        return $products;
    }
}
