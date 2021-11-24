<?php /*a:4:{s:64:"/var/www/mishop/application/admin/view/advertcategory/index.html";i:1588217153;s:54:"/var/www/mishop/application/admin/view/Layout/app.html";i:1587956237;s:65:"/var/www/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:66:"/var/www/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;}*/ ?>
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
                <li>列表</li>
            </ol>
        </div>

        <div class="page-body">

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#add-modal'}">
                                <span class="am-icon-plus"></span>
                                新增
                            </button>
                        </div>
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
                                <th class="table-title">排序</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if(is_array($advertCategories) || $advertCategories instanceof \think\Collection || $advertCategories instanceof \think\Paginator): $i = 0; $__LIST__ = $advertCategories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                            <tr data-id="<?php echo htmlentities($category->id); ?>" id="c_<?php echo htmlentities($category->id); ?>">
                                <td><?php echo htmlentities($category->id); ?></td>
                                <td class="name"><a href="javascript:;"><?php echo htmlentities($category->name); ?></a></td>
                                <td class="am-hide-sm-only sort"><?php echo htmlentities($category->sort); ?></td>
                                <td>
                                    <a href="javascript:;" data-am-modal="{target: '#edit-modal'}" class="edit">编辑</a>
                                    <div class="divider divider-vertical"></div>
                                    <a href="javascript:;" data-am-modal="{target: '#del_cate'}" class="del_cate">删除</a>
                                </td>
                            </tr>
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

    <!--新增模态框-->
    <div class="am-modal am-modal-no-btn" id="add-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">来来来，新增几个分类吧
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>

            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form">
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3">
                            名称
                        </div>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-input-sm" id="name">
                        </div>
                    </div>

                    <div class="am-g am-margin-top sort">
                        <div class="am-u-sm-3">
                            排序
                        </div>
                        <div class="am-u-sm-9">
                            <input type="text" id="sort" class="am-input-sm">
                        </div>
                    </div>

                    <div class="am-margin">
                        <button type="button" class="am-btn am-btn-primary am-radius submit">提 交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--编辑模态框-->
    <div class="am-modal am-modal-no-btn" id="edit-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">来来来，编辑分类吧
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>

            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form">
                    <input type="hidden" id="edit_id">
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-3">
                            名称
                        </div>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-input-sm" id="edit_name">
                        </div>
                    </div>

                    <div class="am-g am-margin-top sort">
                        <div class="am-u-sm-3">
                            排序
                        </div>
                        <div class="am-u-sm-9">
                            <input type="text" id="edit_sort" class="am-input-sm">
                        </div>
                    </div>

                    <div class="am-margin">
                        <button type="button" class="am-btn am-btn-primary am-radius save_cate">提 交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--删除模态框-->
    <div class="am-modal am-modal-alert" tabindex="-1" id="del_cate">
        <input type="hidden" id="del_id">
        <div class="am-modal-dialog">
            <div class="am-modal-bd">
                确定要删除此分类么？
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <a href="javascript:;"><span class="am-modal-btn delete_confirm">确定</span></a>
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

<script>
    $(function () {
        // 新增分类
        $('.submit').click(function () {
            var info = {
                name: $("#name").val(),
                sort: $("#sort").val(),
            }

            if (info.name.length < 3) {
                alert('分类名称长度不能小于3个字符');
                return false;
            }

            var reg = new RegExp("^[0-9]*$");
            if (info.sort == "" || !reg.test(info.sort)) {
                alert('请填写数字类型的排序');
                return false;
            }

            $.post("/admin/AdvertCategory/store", info, function (data) {
                var html = '<tr data-id="' + data.id + '" id="c_' + data.id + '">' +
                    '<td>' + data.id + '</td>' +
                    '<td class="name"><a href="javascript:;">' + info.name + '</a></td>' +
                    '<td class="am-hide-sm-only sort">'+ info.sort + ' </td>' +
                    '<td>' +
                    '<a href="javascript:;" data-am-modal="{target: \'#edit-modal\'}" class="edit">编辑</a> ' +
                    '<div class="divider divider-vertical"></div>' +
                    ' <a href="javascript:;">删除</a>' +
                    '</td>' +
                    '</tr>';

                $(html).appendTo('tbody');
            })

            $('#add-modal').modal('close');
            $(".am-dimmer.am-active").css("opacity", '0');//隐藏遮罩层
        })

        //编辑分类
        $(document).on('click', '.edit', function () {
            var id = $(this).parents('tr').data('id');
            var name = $(this).parents('td').siblings('.name').text();
            var sort = $(this).parents('td').siblings('.sort').text().toString().replace(/^\s+|\s+$/g, ''); // 去除排序值两边的空格

            //设置值
            $("#edit_id").val(id);
            $("#edit_name").val(name);
            $("#edit_sort").val(sort);
        });

        //执行编辑
        $('.save_cate').click(function () {
            var info = {
                id: $("#edit_id").val(),
                name: $("#edit_name").val(),
                sort: $("#edit_sort").val(),
            };

            // console.log(info);return;

            $.ajax({
                type: "POST",
                url: '/admin/AdvertCategory/update/id/' + info.id,
                data: info,
                success: function (data) {
                    if (data.status == 1) {
                        $("#c_" + info.id).find(".name").text(info.name);
                        $("#c_" + info.id).find(".sort").text(info.sort);
                        $("#edit-modal").modal('close');
                        $(".am-dimmer.am-active").css("opacity", '0');
                    }
                }
            })
        });

        //ajax模态框删除
        $('.del_cate').click(function () {
            var id = $(this).parents('tr').data('id');
            $("#del_id").val(id);
        })

        $('.delete_confirm').click(function () {
            var id = $("#del_id").val();
            $.post("/admin/AdvertCategory/delete_cate", {id: id}, function (data) {
                if (data.status == 1) {
                    alert(data.msg);
                    $("tr[data-id='" + id + "']").fadeOut(400);
                }
            })
        })

    })
</script>

</body>
</html>
