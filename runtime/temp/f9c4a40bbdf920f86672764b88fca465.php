<?php /*a:2:{s:80:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Order/show_pay.html";i:1588643710;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>长乐衣品汇</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/vendor/wechat/favicon.ico">

    <link rel="stylesheet" href="/vendor/wechat/flexslider/flexslider.css">
    <link rel="stylesheet" href="/vendor/wechat/css/common.css">
    <script src="/vendor/wechat/js/fontSize.js"></script>
</head>
<body>

<div id="globalLoading" class="global-loading">
    <div class="global-loading-logo">
        <div id="globalLoadingAnim" class="global-loading-anim"></div>
    </div>
    <div class="global-loading-text">正在努力为您加载中...</div>
</div>

<script src="/vendor/wechat/js/loading.js"></script>


<div id="wrapper">
    <div class="page-order-pay" data-log="在线支付">
        <div class="box box1">
            <div class="p1"><span class="icon-checked"></span><span>订单提交成功</span></div>
            <div class="p2">
                <span style="color: #FF5722">请在30分钟内完成支付，超时订单将自动关闭。</span>
            </div>
            <div class="p2"><p class="count" style="color: #D92E2E"></p></div>
        </div>
        <div class="box box2">
            <div class="p">订单金额：<?php echo htmlentities(number_format($order->total_price + $order->express_money,2)); ?>元 &nbsp;&nbsp; 订单编号：<?php echo htmlentities($order->out_trade_no); ?></div>
            <div class="p h_box">
                <div>收货信息：</div>
                <div class="flex_1">
                    <?php echo htmlentities($order->address->name); ?> <?php echo htmlentities($order->address->tel); ?>
                    <br><?php echo htmlentities($order->address->province); ?> <?php echo htmlentities($order->address->city); ?> <?php echo htmlentities($order->address->area); ?>
                    <?php echo htmlentities($order->address->detail); ?>
                </div>
            </div>
            <!--<div class="p">发票类型：个人电子发票 <p>发票抬头：个人</p></div>-->
        </div>
        <div class="box box3">
            <div class="head"><span>请选择支付方式</span></div>
            <div class="list">
                <div class="item active">
                    <div data-log="A0-微信" class="inner">
                        <div class="p">微信</div>
                        <div class="p right">推荐使用微信支付</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box4">
            <div class="p p1">
                <p>本次需支付：<span class="hot"><?php echo htmlentities(number_format($order->total_price + $order->express_money,2)); ?>元</span></p>
            </div>
        </div>
        <div class="box box5">
            <a href="javascript:;" data-log="bottom-bankgo" class="ui-button" id="pay"><span>立即支付</span></a>
        </div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script>
    window.onload = function () {
        countDown();

        function addZero(i) {
            return i < 10 ? "0" + i : i + "";
        }

        function countDown() {
            var nowtime = new Date();
            var endtime = new Date(<?php echo json_encode($order->create_time); ?>)
            // endtime.setSeconds(endtime.getSeconds() + 30); // 设置30秒
            endtime.setMinutes(endtime.getMinutes() + 30); // 设置30分钟

            var lefttime = parseInt((endtime.getTime() - nowtime.getTime()) / 1000);

            var m = parseInt(lefttime / 60 % 60);

            var s = parseInt(lefttime % 60);
            m = addZero(m);

            s = addZero(s);

            document.querySelector(".count").innerHTML = `剩余支付时间：${m} 分 ${s} 秒`;
            if (lefttime <= 0) {
                document.querySelector(".count").innerHTML = "订单已失效";
                return;
            }
            setTimeout(countDown, 1000);
        }
    }
</script>

</body>
</html>
