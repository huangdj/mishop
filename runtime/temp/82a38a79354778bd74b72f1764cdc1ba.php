<?php /*a:2:{s:54:"/var/www/mishop/application/index/view/index/show.html";i:1588830014;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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
    <div class="page-product-view" data-log="商品详情">

        <div class="product-view">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">

                        <?php if(is_array($product->galleries) || $product->galleries instanceof \think\Collection || $product->galleries instanceof \think\Paginator): $i = 0; $__LIST__ = $product->galleries;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gallery): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="javascript:;"><img src="<?php echo htmlentities($gallery->img); ?>"/></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </section>

            <div class="b2">
                <div class="b21">
                    <div class="b211">
                        <div class="name"><p><?php echo htmlentities($product->name); ?></p></div>
                        <div class="price"><strong><?php echo htmlentities($product->price); ?>元</strong></div>
                    </div>
                    <div class="b212">
                        <div class="icon-fenxiang"></div>
                    </div>
                </div>
                <div class="b22">
                    <p><?php echo htmlentities($product->description); ?></p>
                </div>
            </div>

            <div class="ui-b7">
                <h3>为您推荐</h3>
                <div class="ui-carousel-container">
                    <div class="ui-carousel-viewport">

                        <?php if(is_array($recommends) || $recommends instanceof \think\Collection || $recommends instanceof \think\Paginator): $i = 0; $__LIST__ = $recommends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?>
                        <a href="/index/Index/show/id/<?php echo htmlentities($recommend->id); ?>">
                            <img src="<?php echo htmlentities($recommend->photo->image); ?>">
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="b5">
                <div class="b51"></div>
                <div class="b52">
                    <div class="blc">
                        <?php echo $product->content; ?>
                    </div>
                </div>
            </div>
            <div class="b7">
                <div class="b70">
                    <a href="/">
                        <div class="icon-home"></div>
                    </a>
                </div>
                <div class="b72">
                    <!--<a href="javascript:;" class="off">暂时缺货</a>-->
                    <a href="javascript:;" id="buy" data-pid="<?php echo htmlentities($product->id); ?>">立即购买</a>
                </div>

                <div class="b73">
                    <a href="/index/Cart/index">
                        <div class="icon-gouwuche"></div>
                    </a>
                </div>
            </div>
            <a href="javascript:;" onclick="goTop()" id="top" style="visibility: visible;">
                <img src="http://s1.mi.com/m/images/m/top.png">
            </a>
        </div>
        <div class="share-component"></div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script>
    $(function () {
        $("#buy").click(function () {
            var pid = $(this).data('pid');
            $.ajax({
                type: "POST",
                url: "/index/Cart/store",
                data: {product_id: pid},
                success: function () {
                    location.href = "/index/cart/index";
                }
            })
        })
    })
</script>

</body>
</html>
