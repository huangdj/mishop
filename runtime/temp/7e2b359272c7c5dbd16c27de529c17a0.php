<?php /*a:2:{s:58:"/var/www/mishop/application/index/view/order/checkout.html";i:1588814428;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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


<div class="wrap">
    <div class="page-order-checkout">
        <div class="page-order-checkout-wrap">
            <div class="b1 icon_arrow" onclick="location.href='/index/Address/index'">
                <?php if(isset($address)): ?>
                <div class="b11"><p><span><?php echo htmlentities($address->name); ?></span> <span><?php echo htmlentities($address->tel); ?></span></p></div>
                <div class="b13">
                    <p class="address" data-id="<?php echo isset($address->id) ? htmlentities($address->id) : ''; ?>"><?php echo isset($address->province) ? htmlentities($address->province) : ''; ?> <?php echo isset($address->city) ? htmlentities($address->city) : ''; ?>
                    <?php echo isset($address->area) ? htmlentities($address->area) : ''; ?> <?php echo isset($address->detail) ? htmlentities($address->detail) : ''; ?>
                    </p>
                </div>
                <?php else: ?>
                <div class="b11"><p><span>没有收货地址!</span></p></div>
                <div class="b13">
                    <p class="address" data-id="">
                        <span style="color:#FF5722;">亲, 请先填写一个收货地址~</span>
                    </p>
                </div>
                <?php endif; ?>
            </div>
            <div class="ui_line"></div>
            <div class="b2">
                <ul>
                    <li class="on"><a href="javascript:;" class="wechatpay">微信支付</a></li>
                    <!--<li class=""><a href="javascript:;" class="">货到付款</a></li>-->
                </ul>
            </div>
            <div class="ui_line"></div>

            <div class="b8">

                <?php if(is_array($carts) || $carts instanceof \think\Collection || $carts instanceof \think\Paginator): $i = 0; $__LIST__ = $carts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>
                <div class="b8w">
                    <div class="b81">
                        <div class="img"><img src="<?php echo htmlentities($cart->product->photo->image); ?>">
                        </div>
                    </div>
                    <div class="b82">
                        <div class="name"><p>
                            <span><?php echo htmlentities($cart->product->name); ?></span></p></div>
                    </div>
                    <div class="b83">
                        <div class="price"><strong><?php echo htmlentities($cart->product->price); ?>元 * <?php echo htmlentities($cart->num); ?></strong></div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="ui_line"></div>
            <div class="b5">
                <div class="b51"><p><strong>商品价格：</strong><span><?php echo htmlentities(number_format($count['total_price'],2)); ?>元</span></p>
                </div>
                <div class="b53"><p><strong>配送费用：</strong><span>0元</span></p></div>
            </div>
            <div class="b7">
                <div class="b71">
                    <span>共<?php echo htmlentities($count['num']); ?>件 合计: </span><strong><?php echo htmlentities(number_format($count['total_price'],2)); ?>元</strong></div>
                <div class="b72"><a href="javascript:;" class="ui-button" id="pay"><span>去付款</span></a></div>
            </div>
        </div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script>
    $(function () {
        //去付款，就是下单，跳到订单确认页
        $("#pay").click(function () {
            var address_id = $(".address").data('id');
            if (address_id == '') {
                alert('请先填写一个送货地址~');
                return false;
            }
            $.ajax({
                type: 'POST',
                url: '/index/Order/store',
                data: {address_id: address_id},
                success: function (data) {
                    // console.log(data);return;
                    if (data.status == 0) {
                        alert(data.info);
                        location.href = '/index/Cart/index';
                        return false;
                    }
                    //微信支付
                    location.href = '/index/Order/pay/id/' + data.order_id;
                }
            })
        });
    });
</script>

</body>
</html>
