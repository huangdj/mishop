<?php /*a:3:{s:58:"/var/www/mishop/application/index/view/customer/index.html";i:1588917865;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;s:65:"/var/www/mishop/application/index/view/Layout/shared/_footer.html";i:1588641485;}*/ ?>
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
    <div class="page-personal-center" data-log="个人中心">
        <div class="b1">
            <div class="new_info">
                <div>
                    <div class="name"></div>
                    <div class="img"><img src="<?php echo htmlentities($customer); ?>"></div>
                </div>
            </div>
            <div class="new_nav">
                <ul>
                    <li>
                        <a href="/index/Order/index">
                            <div class="spr spr1"></div>
                            <p>全部订单</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-event="40000000100060002">
                            <div class="spr spr2"></div>
                            <p>待付款</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-event="40000000100060003">
                            <div class="spr spr3"></div>
                            <p>待收货</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <ol class="list">
            <li data-event="40000000100060005"><strong class="sprl ise"></strong><a>意见反馈</a></li>
            <li onclick="location.href='/index/Address/manage'">
                <strong class="sprl is"></strong>地址管理
            </li>
        </ol>

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
