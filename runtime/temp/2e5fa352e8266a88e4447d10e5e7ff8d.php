<?php /*a:2:{s:58:"/var/www/mishop/application/index/view/address/manage.html";i:1588816460;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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
    <div class="page-address-list" data-log="地址列表">

        <div class="address-manage">
            <div class="ui-card">
                <ul class="ui-card-item ui-list">

                    <?php if(is_array($addresses) || $addresses instanceof \think\Collection || $addresses instanceof \think\Paginator): $i = 0; $__LIST__ = $addresses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?>
                    <li class="ui-list-item identity">
                        <a href="/index/Address/delete/id/<?php echo htmlentities($address->id); ?>">删除</a>
                        <span class="consignee"><?php echo htmlentities($address->name); ?></span>
                        <span><?php echo htmlentities($address->tel); ?></span>
                    </li>
                    <li class="ui-list-item edit" onclick="location.href='/index/Address/edit/id/<?php echo htmlentities($address->id); ?>'">
                        <p><?php echo htmlentities($address->province); ?> <?php echo htmlentities($address->city); ?> <?php echo htmlentities($address->area); ?></p>
                        <p><?php echo htmlentities($address->detail); ?></p>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </div>

        <div class="add"><a href="/index/Address/create" class="ui-button ui-button-active"><span>新建地址</span></a></div>
        <div class="popup-risk-check"></div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


</body>
</html>
