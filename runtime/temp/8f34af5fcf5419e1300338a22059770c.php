<?php /*a:1:{s:54:"/var/www/mishop/application/admin/view/user/login.html";i:1590393338;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>小米商城 | 后台登录</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/vendor/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/vendor/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/vendor/layuiadmin/style/login.css" media="all">
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>小米商城</h2>
            <p>小米商城 后台管理中心---管理员登录</p>
        </div>


        <form action="<?php echo url('User/login'); ?>" method="post">
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-username"
                           for="LAY-user-login-username"></label>
                    <input type="text" name="name" id="LAY-user-login-username" lay-verify="required"
                           placeholder="用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                           for="LAY-user-login-password"></label>
                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required"
                           placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-row">
                        <div class="layui-col-xs7">
                            <label class="layadmin-user-login-icon layui-icon layui-icon-vercode"
                                   for="LAY-user-login-vercode"></label>
                            <input type="text" name="captcha" id="LAY-user-login-vercode" lay-verify="required"
                                   placeholder="图形验证码" class="layui-input">
                        </div>
                        <div class="layui-col-xs5">
                            <div style="margin-left: 10px;">
                                <img src="<?php echo url('User/verify'); ?>" style="cursor: pointer"
                                     onclick="this.src='<?php echo url('User/verify'); ?>?'+ Math.random();"
                                     class="layadmin-user-login-codeimg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" value="1"
                           title="记住密码">
                </div>
                <div class="layui-form-item">
                    <button type="submit" class="layui-btn layui-btn-fluid" lay-submit
                            lay-filter="LAY-user-login-submit">
                        登 录
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="https://itfun.tv" target="_blank">https://itfun.tv</a></p>
        <p>
            <span><a href="http://www.layui.com/admin/#get" target="_blank">获取授权</a></span>
            <span><a href="<?php echo url('/auth/Qq/login'); ?>" target="_blank">QQ登录</a></span>
            <span><a href="https://itfun.tv" target="_blank">前往官网</a></span>
        </p>
    </div>
</div>

<script src="/vendor/assets/js/jquery.min.js"></script>
<script src="/vendor/layuiadmin/layui/layui.js"></script>
<!--<script src="/js/common.js"></script>-->
<script>
    layui.config({
        base: '/vendor/' //静态资源所在路径
    }).extend({
        index: 'layuiadmin/lib/index' //主入口模块
    }).use(['index', 'user'], function () {
        //实际使用时记得删除该代码
        layer.msg('请输入管理员账号密码登录', {
            offset: '15px'
            , icon: 1
        });
    });
</script>
</body>
</html>