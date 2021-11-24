<?php /*a:4:{s:57:"/var/www/mishop/application/admin/view/category/edit.html";i:1587711346;s:54:"/var/www/mishop/application/admin/view/Layout/app.html";i:1587956237;s:65:"/var/www/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:66:"/var/www/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;}*/ ?>
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
                <li><a href="/admin/Category/index">商品分类</a></li>
                <li>编辑分类</li>
            </ol>
        </div>

        <div class="page-body">

            <form class="am-form am-form-horizontal" method="post" action="<?php echo url('admin/Category/update', ['id'=>$category->id]); ?>">
                <div class="am-form-group">
                    <label class="am-u-sm-12 am-u-md-3 am-form-label">上级分类</label>
                    <div class="am-u-sm-12 am-u-md-5 am-u-end">
                        <select data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox:1}"
                                name="parent_id">
                            <option value="0">顶级分类</option>

                            <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($cate['id']); ?>" <?php if($cate['id'] == $category->parent_id): ?> selected <?php endif; ?>><?php echo htmlentities($cate['name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-sm-12 am-u-md-3 am-form-label">名称</label>
                    <div class="am-u-sm-12 am-u-md-5 am-u-end">
                        <input type="text" name="name" value="<?php echo htmlentities($category->name); ?>">
                    </div>
                </div>

                <?php if($category->parent_id != '0'): ?>
                <div class="am-form-group">
                    <label class="am-u-sm-12 am-u-md-3 am-form-label">
                        缩略图
                    </label>

                    <div class="am-u-sm-12 am-u-md-5 am-u-end">
                        <div class="am-form-group am-form-file">
                            <button type="button" class="am-btn am-btn-success am-btn-sm">
                                <i class="am-icon-cloud-upload" id="loading"></i> 上传缩略图
                            </button>
                            <input type="file" id="image_upload">
                            <input type="hidden" name="photo_id">
                        </div>

                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed am-no-layout">

                        <div>
                            <img src="<?php echo htmlentities($category->photo->image); ?>" id="img_show" style="max-height: 150px;margin-bottom: 10px;">
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="am-form-group">
                    <label class="am-u-sm-12 am-u-md-3 am-form-label">排序</label>
                    <div class="am-u-sm-12 am-u-md-5 am-u-end">
                        <input type="text" name="sort" value="<?php echo htmlentities($category->sort); ?>">
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location='/admin/Category/index'"
                                class="am-btn am-btn-default am-btn-sm am-radius">返 回
                        </button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="admin-content-footer">
        <p>Copyright © 2013-2018 长乐未央技术研发部出品</p>
    </footer>
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

<script src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
<script src="/static/upload.js"></script>

</body>
</html>
