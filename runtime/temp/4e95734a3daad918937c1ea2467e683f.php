<?php /*a:3:{s:55:"/var/www/mishop/application/index/view/order/index.html";i:1588919905;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;s:65:"/var/www/mishop/application/index/view/Layout/shared/_footer.html";i:1588641485;}*/ ?>
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


<div class="wrapper">
    <div class="page-my-order" data-log="我的订单">
        <div class="header">
            <div class="left"><a title="小米商城" data-log="HEAD-首页" onclick="history.go(-1)" class="home"><img
                    src="http://s1.mi.com/m/images/m/icon_back_n.png" class="ib"></a></div>
            <div class="tit"><h2 data-log="HEAD-标题-我的订单"><span class="title">我的订单</span></h2></div>
            <div class="right"><a href="/1/#/search/index">
                <div class="icon icon-search"></div>
            </a></div>
        </div>
        <div class="order_list">

            <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?>
            <div class="ol-item">
                <div>
                    <div class="oi1">
                        <div class="oi11">
                            <div class="oi111"><p>
                                <strong>订单日期：</strong><span><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($order->create_time)? strtotime($order->create_time) : $order->create_time)); ?></span></p></div>
                            <div class="oi112"><p><strong>订单编号：</strong><span><?php echo htmlentities($order->order_no); ?></span></p></div>
                        </div>
                        <div class="oi12"><p><?php echo htmlentities($order_status["$order->status"]); ?></p></div>
                    </div>
                    <div class="oi2">
                        <ul>
                            <?php foreach($order->order_products as $order_product): ?>
                            <li>
                                <div class="oi21">
                                    <div class="img"><img src="<?php echo htmlentities($order_product->product->photo->image); ?>"></div>
                                </div>
                                <div class="oi22"><p><?php echo htmlentities($order_product->product->name); ?></p></div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="oi3">
                        <p>
                            <span>共<?php echo htmlentities(count($order->order_products)); ?>件商品</span><span>总金额：</span><strong><?php echo htmlentities(number_format($order->total_price,2)); ?>元</strong>
                        </p>
                    </div>

                    <?php if($order->status == 1): ?>
                    <div class="oi4">
                        <a href="/index/Order/pay/id/<?php echo htmlentities($order->id); ?>" class="org">立即付款</a>
                        <a href="javascript:;">取消订单</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="footer">
    <ul>
        <li>
            <a href="/" class="<?php echo isset($_index) ? htmlentities($_index) : ''; ?>">
                <div class="nav">
                    <div class="ih ispr"></div>
                    <p>商城</p>
                </div>
            </a>
        </li>
        <li>
            <a href="/index/Category/index" class="<?php echo isset($_category) ? htmlentities($_category) : ''; ?>">
                <div class="nav">
                    <div class="ic ispr"></div>
                    <p>分类</p>
                </div>
            </a>
        </li>
        <li>
            <a href="/index/Cart/index">
                <div class="nav">
                    <div class="is ispr"></div>
                    <p>购物车</p>
                </div>
            </a>
        </li>
        <li>
            <a href="/index/Customer/index" class="<?php echo isset($_customer) ? htmlentities($_customer) : ''; ?>">
                <div class="nav">
                    <div class="if ispr"></div>
                    <p>服务</p>
                </div>
            </a>
        </li>
    </ul>
</div>


    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


</body>
</html>
