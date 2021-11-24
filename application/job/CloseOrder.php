<?php

namespace app\job;

use think\queue\Job;
use app\common\model\Order;

class CloseOrder
{
    public function fire(Job $job, $data)
    {
        $order = Order::where('order_no', $data['order_no'])->find();

        // 如果已经支付则不需要关闭订单，直接退出
        if ($order->pay_time) {
            return;
        }

        Order::where('id', $order->id)->update(['closed' => false]);
        // 循环遍历订单中的商品，将订单中的数量加回到商品的库存中去
        foreach ($order->orderProducts as $item) {
            $item->product->addStock($item->num);
        }

        if ($job->attempts() > 3) {
            //通过这个方法可以检查这个任务已经重试了几次了
            return;
        }


        //如果任务执行成功后 记得删除任务，不然这个任务会重复执行，直到达到最大重试次数后失败后，执行failed方法
        $job->delete();

        // 也可以重新发布这个任务
        $job->release(env('order_ttl')); //$delay为延迟时间

    }

    public function failed($data)
    {
        // ...任务达到最大重试次数后，失败了
    }
}