<?php /*a:3:{s:60:"/var/www/mishop/application/index/view/category/product.html";i:1588599637;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;s:65:"/var/www/mishop/application/index/view/Layout/shared/_footer.html";i:1588641485;}*/ ?>
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
    <div class="page-list" data-log="商品列表">
        <ol class="version">

            <?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?>
            <li>
                <a class="version-item" href="/index/Index/show/id/<?php echo htmlentities($product->id); ?>">
                    <div class="version-item-img"><img
                            src="<?php echo htmlentities($product->photo->image); ?>">
                    </div>
                    <div class="version-item-intro">
                        <div class="version-item-name"><p><?php echo htmlentities($product->name); ?></p></div>
                        <div class="version-item-intro-price"><span><?php echo htmlentities($product->price); ?>元</span></div>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
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
