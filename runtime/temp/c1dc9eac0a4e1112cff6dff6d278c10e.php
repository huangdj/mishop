<?php /*a:3:{s:77:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/index/index.html";i:1588600034;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Layout/app.html";i:1588394207;s:87:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Layout/shared/_footer.html";i:1588641485;}*/ ?>
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
    <div class="page-index" id="home" data-log="首页">
        <div class="index-header">
            <div class="search_bar">
                <a href="/index/Index/search">
                    <span class="icon icon-search"></span>
                    <span class="text">搜索商品名称</span>
                </a>
            </div>
            <div class="search_bottom"></div>
        </div>

        <!--焦点图-->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">

                    <?php if(is_array($adverts) || $adverts instanceof \think\Collection || $adverts instanceof \think\Paginator): $i = 0; $__LIST__ = $adverts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$advert): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="<?php echo htmlentities($advert->url); ?>"><img src="<?php echo htmlentities($advert->photo->image); ?>"/></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </section>

        <!--推荐商品-->
        <div class="list">
            <div class="section">
                <div class="mcells_auto_fill">
                    <div class="body">

                        <?php if(is_array($banners) || $banners instanceof \think\Collection || $banners instanceof \think\Paginator): $i = 0; $__LIST__ = $banners;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
                        <div>
                            <div class="items">
                                <img src="<?php echo htmlentities($banner->photo->image); ?>" style="height: 100px;">
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>

            <div class="product">

                <?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?>
                <div class="section" onclick="location.href='/index/Index/show/id/<?php echo htmlentities($product->id); ?>'">
                    <div>
                        <div class="item">
                            <div class="img">
                                <img class="ico" src="<?php echo htmlentities($product->photo->image); ?>">
                                <?php if($product['is_new'] == '1'): ?>
                                <img class="tag" src="/vendor/wechat/img/new.png">
                                <?php else: ?>
                                <img class="tag" src="/vendor/wechat/img/hot.png">
                                <?php endif; ?>
                            </div>
                            <div class="info">
                                <div class="name"><p><?php echo htmlentities($product->name); ?></p></div>
                                <div class="brief"><p><?php echo htmlentities($product->description); ?></p></div>
                                <div class="price"><p><?php echo htmlentities($product->price); ?>元 起</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div style="text-align: center;margin-top:7px;">
                <span class="more" style="color: #999;font-size: .85em;display: none">暂时没有更多了</span>
            </div>
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


<script>
    $(function () {
        var nStart = 2;

        window.addEventListener('scroll', function () {
            var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            var windowHeitht = document.documentElement.clientHeight || document.body.clientHeight;
            var scrollHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
            // 判断是否滚动到底部
            if (scrollTop + windowHeitht == scrollHeight) {
                var _this = $(".product");

                if (nStart >= <?php echo htmlentities($total); ?>) {
                    $('.more').css('display', 'block'); // 数据加载完后显示自定义样式
                    return false;
                } else {
                    $.post("/index/Index/get_products", {page: nStart}, function (data) {
                        $.each(data, function (i, item) {
                            console.log(item)
                            _this.append('<div class="section" onclick="location.href=\'/index/Index/show/id/' + item.id + '\'">' +
                                '<div>' +
                                '<div class="item">' +
                                '<div class="img">' +
                                '<img class="ico" src="' + item.photo.image + '">' +
                                '<?php if(' + item.is_new + ' == '1'): ?>' +
                                '<img class="tag" src="/vendor/wechat/img/new.png">' +
                                '<?php else: ?>' +
                                '<img class="tag" src="/vendor/wechat/img/hot.png">' +
                                '<?php endif; ?>' +
                                '</div>' +
                                '<div class="info">' +
                                '<div class="name"><p>' + item.name + '</p></div>' +
                                '<div class="brief"><p>' + item.description + '</p></div>' +
                                '<div class="price"><p>' + item.price + '元 起</p></div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>')
                        })
                    })

                    nStart += 2;
                }
            }
        });
    })
</script>

</body>
</html>
