<?php /*a:5:{s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/menu/index.html";i:1588647551;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/app.html";i:1587956237;s:87:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:88:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Menu/_form.html";i:1588365053;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ITFun Admin Examples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/vendor/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/vendor/assets/css/admin.css">
    <link rel="stylesheet" href="/static/common.css">
    
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <a href="/"><img src="/vendor/assets/i/logo.png" alt="ITFun"><strong>ITFun 后台管理</strong></a>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}">
        <span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱
                <span class="am-badge am-badge-primary">5</span></a>
            </li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ucfirst(session('user')->name); ?> 管理员 <span
                        class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="<?php echo url('/admin/User/logout'); ?>"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only">
                <a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span>
                    <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>


<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li>
                <a href="/admin" class="<?php echo isset($_admin) ? htmlentities($_admin) : ''; ?>">
                    <span class="am-icon-dashboard"></span> 首页
                </a>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-mishop'}">
                    <span class="am-icon-shopping-cart"></span>
                    商城中心 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub <?php echo isset($_mishop) ? htmlentities($_mishop) : ''; ?>" id="collapse-mishop">
                    <li>
                        <a href="/admin/Brand/index" class="<?php echo isset($_brand) ? htmlentities($_brand) : ''; ?>">
                            商品品牌
                        </a>
                    </li>
                    <li>
                        <a href="/admin/Category/index" class="<?php echo isset($_category) ? htmlentities($_category) : ''; ?>">
                            商品分类
                        </a>
                    </li>
                    <li>
                        <a href="/admin/Product/index" class="<?php echo isset($_product) ? htmlentities($_product) : ''; ?>">
                            商品管理
                        </a>
                    </li>
                    <li>
                        <a href="/admin/Product/trash" class="<?php echo isset($_trash) ? htmlentities($_trash) : ''; ?>">
                            商品回收站
                        </a>
                    </li>
                </ul>
            </li>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-advertCenter'}">
                    <span class="am-icon-google"></span>
                    广告中心 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub <?php echo isset($_advertCenter) ? htmlentities($_advertCenter) : ''; ?>" id="collapse-advertCenter">
                    <li>
                        <a href="/admin/Advert/index" class="<?php echo isset($_advert) ? htmlentities($_advert) : ''; ?>">
                            广告管理
                        </a>
                    </li>
                    <li>
                        <a href="/admin/AdvertCategory/index" class="<?php echo isset($_advertCategory) ? htmlentities($_advertCategory) : ''; ?>">
                            广告分类
                        </a>
                    </li>
                </ul>
            </li>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-weChat'}">
                    <span class="am-icon-wechat"></span>公众号管理 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub <?php echo isset($_weChat) ? htmlentities($_weChat) : ''; ?>" id="collapse-weChat">
                    <li>
                        <a href="/admin/Menu/index" class="<?php echo isset($_menu) ? htmlentities($_menu) : ''; ?>">
                            微信菜单
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

    <!-- sidebar end -->

    <!-- content start -->
    
<div class="admin-content">
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>微信菜单</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <button type="button" class="am-btn am-btn-danger"
                                onclick="if(confirm('确实要删除所有菜单吗？')){location='/admin/Menu/delete';} else return false;">
                            <span class="am-icon-trash-o"></span> 删除菜单
                        </button>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <div class="am-tab-panel">
                        <form class="am-form" action="/admin/Menu/update" method="post">

                            <div class="am-tabs" data-am-tabs>
                                <ul class="am-tabs-nav am-nav am-nav-tabs">
                                    <li class="am-active"><a href="#tab0">菜单一</a></li>
                                    <li><a href="#tab1">菜单二</a></li>
                                    <li><a href="#tab2">菜单三</a></li>
                                </ul>

                                <div class="am-tabs-bd">
                                    <?php
                                 $button = isset($buttons[0]) ? $buttons[0] : "";
                                 $button1 = isset($buttons[1]) ? $buttons[1] : "";
                                 $button2 = isset($buttons[2]) ? $buttons[2] : "";
                            ?>
                                    <div class="am-tab-panel am-fade am-in am-active" id="tab0">
    <table class="am-table am-table-hover">
        <thead>
        <tr>
            <th>级别</th>
            <th>类型</th>
            <th>名称</th>
            <th>值</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>一级菜单：</td>
            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[0][type]">
                    <option value="click" <?php if((isset($button["type"]) and $button["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button["type"]) and $button["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[0][name]" value="<?php echo isset($button['name']) ? htmlentities($button['name']) : ''; ?>"
                       class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[0][value]"
                       <?php if((isset($button["key"]))): ?> value="<?php echo htmlentities($button['key']); ?>"
                       <?php elseif((isset($button["url"]))): ?> value="<?php echo htmlentities($button['url']); ?>"
                       <?php else: ?> value=""
                       <?php endif; ?>

                class="am-form-field am-radius">
            </td>
        </tr>

        <?php $__FOR_START_1086502265__=0;$__FOR_END_1086502265__=5;for($i=$__FOR_START_1086502265__;$i < $__FOR_END_1086502265__;$i+=1){ ?>
        <tr>
            <td>二级菜单：<?php echo htmlentities($i+1); ?></td>

            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[0][sub_button][<?php echo htmlentities($i); ?>][type]">
                    <option value="click" <?php if((isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[0][sub_button][<?php echo htmlentities($i); ?>][name]"
                       value="<?php echo isset($button['sub_button']["$i"]["name"]) ? htmlentities($button['sub_button']["$i"]["name"]) : ''; ?>"
                       class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[0][sub_button][<?php echo htmlentities($i); ?>][value]"
                       <?php if((isset($button['sub_button']["$i"]["key"]))): ?>
                        value="<?php echo htmlentities($button['sub_button']["$i"]["key"]); ?>"
                        <?php elseif((isset($button['sub_button']["$i"]["url"]))): ?>
                        value="<?php echo htmlentities($button['sub_button']["$i"]["url"]); ?>"
                        <?php else: ?>
                        value=""
                        <?php endif; ?>
                class="am-form-field am-radius">
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<div class="am-tab-panel am-fade" id="tab1">
    <table class="am-table am-table-hover">
        <thead>
        <tr>
            <th>级别</th>
            <th>类型</th>
            <th>名称</th>
            <th>值</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>一级菜单：</td>
            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[1][type]">
                    <option value="click" <?php if((isset($button1["type"]) and $button1["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button1["type"]) and $button1["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[1][name]" value="<?php echo isset($button1['name']) ? htmlentities($button1['name']) : ''; ?>"
                       class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[1][value]"
                       <?php if((isset($button1["key"]))): ?> value="<?php echo htmlentities($button1['key']); ?>"
                <?php elseif((isset($button1["url"]))): ?> value="<?php echo htmlentities($button1['url']); ?>"
                <?php else: ?> value=""
                <?php endif; ?>

                class="am-form-field am-radius">
            </td>
        </tr>

        <?php $__FOR_START_978852935__=0;$__FOR_END_978852935__=5;for($i=$__FOR_START_978852935__;$i < $__FOR_END_978852935__;$i+=1){ ?>
        <tr>
            <td>二级菜单：<?php echo htmlentities($i+1); ?></td>

            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[1][sub_button][<?php echo htmlentities($i); ?>][type]">
                    <option value="click" <?php if((isset($button1['sub_button']["$i"]["type"]) and $button1['sub_button']["$i"]["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button1['sub_button']["$i"]["type"]) and $button1['sub_button']["$i"]["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[1][sub_button][<?php echo htmlentities($i); ?>][name]"
                       value="<?php echo isset($button1['sub_button']["$i"]["name"]) ? htmlentities($button1['sub_button']["$i"]["name"]) : ''; ?>"
                class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[1][sub_button][<?php echo htmlentities($i); ?>][value]"
                       <?php if((isset($button1['sub_button']["$i"]["key"]))): ?>
                value="<?php echo htmlentities($button1['sub_button']["$i"]["key"]); ?>"
                <?php elseif((isset($button1['sub_button']["$i"]["url"]))): ?>
                value="<?php echo htmlentities($button1['sub_button']["$i"]["url"]); ?>"
                <?php else: ?>
                value=""
                <?php endif; ?>
                class="am-form-field am-radius">
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<div class="am-tab-panel am-fade" id="tab2">
    <table class="am-table am-table-hover">
        <thead>
        <tr>
            <th>级别</th>
            <th>类型</th>
            <th>名称</th>
            <th>值</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>一级菜单：</td>
            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[2][type]">
                    <option value="click" <?php if((isset($button2["type"]) and $button2["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button2["type"]) and $button2["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[2][name]" value="<?php echo isset($button2['name']) ? htmlentities($button2['name']) : ''; ?>"
                       class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[2][value]"
                       <?php if((isset($button2["key"]))): ?> value="<?php echo htmlentities($button2['key']); ?>"
                <?php elseif((isset($button2["url"]))): ?> value="<?php echo htmlentities($button2['url']); ?>"
                <?php else: ?> value=""
                <?php endif; ?>

                class="am-form-field am-radius">
            </td>
        </tr>

        <?php $__FOR_START_713697645__=0;$__FOR_END_713697645__=5;for($i=$__FOR_START_713697645__;$i < $__FOR_END_713697645__;$i+=1){ ?>
        <tr>
            <td>二级菜单：<?php echo htmlentities($i+1); ?></td>

            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[2][sub_button][<?php echo htmlentities($i); ?>][type]">
                    <option value="click" <?php if((isset($button2['sub_button']["$i"]["type"]) and $button2['sub_button']["$i"]["type"] == 'click')): ?> selected <?php endif; ?>>click</option>
                    <option value="view" <?php if((isset($button2['sub_button']["$i"]["type"]) and $button2['sub_button']["$i"]["type"] == 'view')): ?> selected <?php endif; ?>>view</option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[2][sub_button][<?php echo htmlentities($i); ?>][name]"
                       value="<?php echo isset($button2['sub_button']["$i"]["name"]) ? htmlentities($button2['sub_button']["$i"]["name"]) : ''; ?>"
                class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[2][sub_button][<?php echo htmlentities($i); ?>][value]"
                       <?php if((isset($button2['sub_button']["$i"]["key"]))): ?>
                value="<?php echo htmlentities($button2['sub_button']["$i"]["key"]); ?>"
                <?php elseif((isset($button2['sub_button']["$i"]["url"]))): ?>
                value="<?php echo htmlentities($button2['sub_button']["$i"]["url"]); ?>"
                <?php else: ?>
                value=""
                <?php endif; ?>
                class="am-form-field am-radius">
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>




                                </div>
                            </div>

                            <div class="am-margin">
                                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu"
   data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/vendor/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/vendor/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/vendor/assets/js/amazeui.min.js"></script>
<script src="/vendor/assets/js/app.js"></script>

</body>
</html>
