<?php /*a:2:{s:54:"/var/www/mishop/application/index/view/cart/index.html";i:1588734107;s:54:"/var/www/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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

    <div class="cart-index" id="more" <?php if((!$carts->isEmpty())): ?> style="display: none;" <?php endif; ?>>
        <div style="height:1rem;"></div>

        <div class="cart-index-wrap">
            <div class="empt">
                <div class="b3">
                    <a href="/index/Category/index" class="ui-button ui-button-disable">
                        <span>全部商品</span>
                    </a>
                    <a href="/" class="ui-button">
                        <span>精选商品</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-index" id="carts" <?php if(($carts->isEmpty())): ?> style="display: none;" <?php endif; ?>>
        <div class="cart-index-wrap">
            <div class="cart-list">
                <ul>

                    <?php if(is_array($carts) || $carts instanceof \think\Collection || $carts instanceof \think\Paginator): $i = 0; $__LIST__ = $carts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>
                    <li class="item">
                        <div class="ui-box">
                            <div class="imgProduct"><a href="/index/Index/show/id/<?php echo htmlentities($cart->product->id); ?>"><img
                                    src="<?php echo htmlentities($cart->product->photo->image); ?>"></a></div>
                            <div class="info ui-box-flex">
                                <div class="name">
                                    <span><?php echo htmlentities($cart->product->name); ?></span>
                                </div>
                                <div class="price">
                                    <p>
                                        <span>售价：</span><span><?php echo htmlentities($cart->product->price); ?>元</span>
                                        <span>合计：</span><span class="hj"><?php echo htmlentities(number_format($cart->product->price * $cart->num,2)); ?>元</span>
                                    </p>
                                    <div class="tip">
                                        <span style="display: none;">请于2016/04/11 00:58前下单，逾期将失效。</span>
                                    </div>
                                </div>
                                <div class="num" data-id="<?php echo htmlentities($cart->id); ?>" data-price="<?php echo htmlentities($cart->product->price); ?>">
                                    <div class="xm-input-number">
                                        <div class="input-sub <?php if(($cart->num > 1)): ?> active <?php endif; ?>"></div>
                                        <div class="input-num"><span><?php echo htmlentities($cart->num); ?></span></div>
                                        <div class="input-add active"></div>
                                    </div>
                                    <div class="delete">
                                        <a href="javascript:;">
                                            <span class="icon-iconfontshanchu"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="append"></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="pointBox">
                <div class="point" style="display: none;"><span class="act act_special">包邮</span><span></span></div>
                <div class="point">
                    <p>温馨提示：产品是否购买成功，以最终下单为准，请尽快结算</p>
                </div>
            </div>

            <!-- Navbar -->
            <div class="bottom-submit ui-box">
                <div class="price">
                    <span id="num">共<?php echo htmlentities($count['num']); ?>件 金额：</span><br><strong id="total_price"><?php echo htmlentities(number_format($count['total_price'],2)); ?></strong><span>元</span>
                </div>
                <div class="btn"><a class="ui-button ui-button-disable"
                                    href="/index/Category/index"><span>继续购物</span></a></div>
                <div class="btn"><a class="ui-button"
                                    href="/index/Order/checkout"><span>去结算</span></a></div>
            </div>
        </div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(function () {
        //删除
        $('.delete').click(function () {
            swal({
                title: "确定要删除该商品么?",
                text: "删除后不可恢复，请慎重操作!",
                icon: "warning",
                buttons: ['取消', '确定'],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var _this = $(this);
                        $.ajax({
                            type: "DELETE",
                            url: "/index/Cart/destroy",
                            data: {id: _this.parents(".num").data('id')},
                            success: function (data) {
                                var length = $(".item").length;
                                if (length == 1) {
                                    $('#carts').hide();
                                    $('#more').show();
                                    return false;
                                }
                                _this.parents('li').remove();
                                swal("删除成功!");
                                $("#num").text("共" + data.num + "件 金额:");
                                $("#total_price").text((data.total_price).toFixed(2));
                            }
                        })
                    } else {
                        swal("您已取消删除!");
                    }
                });
        })

        //增加数量
        $(".input-add").click(function () {
            var _this = $(this);

            var $num = _this.siblings('.input-num').children('span');
            var $sub = _this.siblings('.input-sub');
            var price = _this.parents(".num").data('price');

            var num = $num.text();
            num = parseInt(num) + 1;
            $num.text(num);

            var hj = (num * price).toFixed(2);
            _this.parents('.info').find('.hj').text(hj + '元');

            if (!$sub.hasClass('active')) {
                $sub.addClass('active');
            }

            $.ajax({
                type: 'POST',
                url: '/index/Cart/change_num',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'add'
                },
                success: function (data) {
                    $("#num").text("共" + data.num + "件 金额:");
                    $("#total_price").text(data.total_price.toFixed(2));
                }
            })
        })


        //减少数量
        $(".input-sub").click(function () {
            var _this = $(this);
            var $num = _this.siblings('.input-num').children('span');
            var num = $num.text();
            var price = _this.parents(".num").data('price');

            if (num == 1) {
                return false;
            }

            num = parseInt(num) - 1;
            if (num == 1) {
                _this.removeClass('active');
            }

            $num.text(num);

            var hj = (num * price).toFixed(2);
            _this.parents('.info').find('.hj').text(hj + '元');

            $.ajax({
                type: 'POST',
                url: '/index/Cart/change_num',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'sub'
                },
                success: function (data) {
                    $("#num").text("共" + data.num + "件 金额:");
                    $("#total_price").text(data.total_price.toFixed(2));
                }
            })
        })
    })
</script>

</body>
</html>
