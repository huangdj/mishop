<?php /*a:2:{s:80:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/address/create.html";i:1588417282;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/index/view/Layout/app.html";i:1588394207;}*/ ?>
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
    <div class="page-address-edit" data-log="地址">

        <div class="edit-box">
            <ul class="ui-list">
                <li class="ui-list-item">
                    <div class="label">收货人：</div>
                    <div class="ui-input"><input placeholder="真实姓名" name="name" maxlength="15" type="text"></div>
                </li>
                <li class="ui-list-item">
                    <div class="label">手机号码：</div>
                    <div class="ui-input"><input placeholder="手机号" name="tel" maxlength="13" type="tel"></div>
                </li>
                <li class="ui-list-item">
                    <div class="label">所在地区：</div>
                    <div class="ui-input">
                        <input placeholder="省 市 区" name="pca" id="pca" maxlength="20" type="text" readonly="readonly" value="">
                    </div>
                </li>
                <li class="ui-list-item">
                    <div class="label">街道地址：</div>
                    <div class="ui-input"><input placeholder="详细地址" name="detail" maxlength="120" type="text"></div>
                </li>
            </ul>
            <div class="save-button">
                <a href="javascript:;" class="ui-button"><span>保存地址</span></a>
            </div>
        </div>


        <div class="ui-mask" style="display:none;"></div>
        <div class="ui-pop" style="display:none;">
            <div class="ui-pop-content">
                <div class="region-list" id="city">

                </div>
            </div>
            <div class="ui-pop-title">选择所在地区</div>
            <div class="ui-pop-close"><a><span class="icon-10chahaokuang"></span></a></div>
        </div>

        <div class="popup-risk-check"></div>
    </div>
</div>


<script src="/vendor/wechat/js/jquery.min.js"></script>
<script src="/vendor/wechat/js/common.js"></script>
<script defer src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>


<script src="/vendor/wechat/js/citySelect.js"></script>
<script>
    $(function () {
        $('.save-button').click(function () {
            var status = true;

            $("input").each(function () {
                var val = $(this).val();
                if (val == "") {
                    status = false;
                }
            });

            if (status == false) {
                alert('您的填写的地址不完整!')
                return false;
            }

            var data = $("input").serialize();

            $.ajax({
                type: "POST",
                url: "/index/Address/save",
                data: data,
                success: function () {
                    location.href = "/index/Address/index";
                }
            })
        })
    })
</script>

</body>
</html>
