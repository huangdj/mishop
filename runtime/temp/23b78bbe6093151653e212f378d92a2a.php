<?php /*a:4:{s:58:"/var/www/mishop/application/admin/view/category/index.html";i:1588561616;s:54:"/var/www/mishop/application/admin/view/Layout/app.html";i:1587956237;s:65:"/var/www/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:66:"/var/www/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;}*/ ?>
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
                <li>分类列表</li>
            </ol>
        </div>

        <div class="page-body">

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <button type="button" onclick="location='/admin/Category/create'"
                                class="am-btn am-btn-primary">
                            <span class="am-icon-plus"></span>
                            新增
                        </button>

                        <button type="button" class="am-btn am-btn-primary" id="show_all">
                            <span class="am-icon-arrows-alt"></span> 展开所有
                        </button>
                    </div>
                </div>
            </div>

            <div class="am-g am-g-collapse">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">名称</th>
                                <th class="table-type">分类商品</th>
                                <th class="table-type">缩略图</th>
                                <th class="table-date am-hide-sm-only">排序</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                            <tr data-id="<?php echo htmlentities($category->id); ?>" id="row_<?php echo htmlentities($category->id); ?>" class="xParent">
                                <td><?php echo htmlentities($category['id']); ?></td>
                                <td><a href="javascript:;"><?php echo htmlentities($category['name']); ?></a></td>
                                <td></td>
                                <td></td>
                                <td class="am-hide-sm-only">
                                    <span class="am-badge am-badge-secondary"><?php echo htmlentities($category['sort']); ?></span>
                                </td>
                                <td>
                                    <a href="<?php echo url('Category/edit', ['id'=>$category['id']]); ?>">编辑</a>
                                    <div class="divider divider-vertical"></div>
                                    <a href="javascript:;" class="del_one">删除</a>
                                </td>
                            </tr>

                            <?php if(is_array($category['children']) || $category['children'] instanceof \think\Collection || $category['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                            <tr data-id="<?php echo htmlentities($child->id); ?>" class="xChildren child_row_<?php echo htmlentities($category->id); ?>">
                                <td><?php echo htmlentities($child['id']); ?></td>
                                <td><a href="javascript:;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<?php echo htmlentities($child['name']); ?></a></td>
                                <td>
                                    <a class="am-badge am-badge-secondary"
                                       href="/admin/Product/index?category_id=<?php echo htmlentities($child->id); ?>">查看商品</a>
                                </td>
                                <td>
                                    <img src="<?php echo isset($child['photo']['image']) ? htmlentities($child['photo']['image']) : ''; ?>" alt="" class="thumb">
                                </td>
                                <td class="am-hide-sm-only">
                                    <span class="am-badge am-badge-secondary"><?php echo htmlentities($child['sort']); ?></span>
                                </td>
                                <td>
                                    <a href="<?php echo url('Category/edit', ['id'=>$child['id']]); ?>">编辑</a>
                                    <div class="divider divider-vertical"></div>
                                    <a href="javascript:;" class="del_one">删除</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
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

<script>
    $(function () {
        $('.del_one').click(function () {
            if (confirm('确定要删除么?')) {
                var id = $(this).parents('tr').data('id');
                var _this = $(this);
                $.ajax({
                    type: 'post',
                    url: "/admin/Category/delete",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == 0) {
                            alert(data.message);
                            return false;
                        } else {
                            alert(data.message);
                            _this.parents('tr').remove();
                        }
                    }
                })
            }
        })

        //展开与折叠表格
        $("tr.xParent").dblclick(function () {
            $(this).toggleClass('am-active');
            $(".child_" + this.id).toggle();
        });

        $("#show_all").click(function () {
            $("tr.xParent").toggleClass('am-active');
            $("tr.xChildren").toggle();
        });
    })
</script>

</body>
</html>
