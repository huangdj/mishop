<?php /*a:2:{s:78:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/index/search.html";i:1588600494;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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
    <div class="page-search" data-log="搜索页">
        <div class="header">
            <div class="left">
                <a href="/" title="小米商城" data-log="HEAD-首页" class="home">
                    <span class="icon-home icon"></span>
                </a>
            </div>
            <div class="tit">
                <div class="searchword"><input autofocus="autofocus"></div>
            </div>
            <div class="searchlabel">
                <a>
                    <span class="icon icon-search"></span>
                </a>
            </div>
        </div>
        <div>
            <ul class="list-default">

                <?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?>
                <li <?php if($product->is_top == '1'): ?> class="top" <?php endif; ?> onclick="location.href='/index/Index/show/id/<?php echo htmlentities($product->id); ?>'">
                    <span><?php echo htmlentities($product->name); ?></span>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script>
    $(function () {
        $(".icon-search").click(function () {
            var searchword = $.trim($(".searchword input").val());
            location.href = '/index/Category/product?searchword=' + searchword;
        });
    })
</script>

</body>
</html>
