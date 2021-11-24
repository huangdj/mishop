<?php /*a:4:{s:79:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/product/index.html";i:1588562278;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/app.html";i:1587956237;s:87:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:88:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;}*/ ?>
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
    
<link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">

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
                <li>商品列表</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <form class="am-form am-form-horizontal">

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按名称</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="keyword" placeholder="请输入名称"
                                       value="<?php echo Request::param('keyword'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按品牌</label>
                            <div class="am-u-sm-9">
                                <select data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360}"
                                        name="brand_id">
                                    <option value="">请选择</option>

                                    <?php if(is_array($brands) || $brands instanceof \think\Collection || $brands instanceof \think\Paginator): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($brand['id']); ?>" <?php if($brand['id'] == Request::param('brand_id')): ?> selected <?php endif; ?>>
                                        <?php echo htmlentities($brand['name']); ?>
                                    </option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按分类</label>
                            <div class="am-u-sm-9">
                                <select name="category_id" data-am-selected="{btnWidth: '100%', btnSize: 'sm'}">
                                    <option value="">所有分类</option>
                                    <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                    <optgroup label="<?php echo htmlentities($category->name); ?>">
                                        <?php if(is_array($category['children']) || $category['children'] instanceof \think\Collection || $category['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($child->id); ?>" <?php if($child->id == Request::param('category_id')): ?>
                                            selected <?php endif; ?>>
                                            <?php echo htmlentities($child->name); ?>
                                        </option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </optgroup>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按日期</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="created_at" name="created_at" placeholder="请选择日期"
                                       value="<?php echo Request::param('created_at'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group search-buttons">
                            <button class="am-btn am-btn-primary" type="submit">查 询</button>
                            <button class="am-btn am-btn-default" type="button"
                                    onclick="location='/admin/Product/index'">重 置
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" onclick="location='/admin/Product/create'"
                                    class="am-btn am-btn-primary"><span class="am-icon-plus"></span>
                                新增
                            </button>
                            <button type="button" class="am-btn am-btn-default">
                                <span class="am-icon-trash-o"></span> 删除
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
                                <th class="table-check"><input type="checkbox"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">缩略图</th>
                                <th class="table-type">商品名称</th>
                                <th class="table-author am-hide-sm-only">所属分类</th>
                                <th class="table-date am-hide-sm-only">品牌</th>
                                <th class="table-date am-hide-sm-only">单价</th>
                                <th class="table-date am-hide-sm-only">上架</th>
                                <th class="table-date am-hide-sm-only">置顶</th>
                                <th class="table-date am-hide-sm-only">推荐</th>
                                <th class="table-date am-hide-sm-only">热销</th>
                                <th class="table-date am-hide-sm-only">新品</th>
                                <th class="table-date am-hide-sm-only">排序</th>
                                <th class="table-date am-hide-sm-only">库存</th>
                                <th class="table-date am-hide-sm-only">上架日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?>
                            <tr data-id="<?php echo htmlentities($product->id); ?>">
                                <td><input type="checkbox"/></td>
                                <td><?php echo htmlentities($product->id); ?></td>
                                <td>
                                    <img src="<?php echo htmlentities($product->photo->image); ?>" alt="" class="thumb">
                                </td>
                                <td><a href="javascript:;"><?php echo htmlentities(sub($product->name)); ?></a></td>
                                <td>
                                    <?php foreach($product->categories as $category): ?>
                                    <span class="am-badge am-badge-success am-radius"><?php echo htmlentities($category->name); ?></span>
                                    <?php endforeach; ?>
                                </td>
                                <td class="am-hide-sm-only">
                                    <span class="am-badge am-badge-warning am-radius"><?php echo htmlentities($product->brand->name); ?></span>
                                </td>
                                <td class="am-hide-sm-only">￥<?php echo htmlentities($product->price); ?></td>

                                <?php foreach($attributes as $attr): ?>
                                <td class="am-hide-sm-only">
                                    <?php echo change_attr($product,$attr); ?>
                                </td>
                                <?php endforeach; ?>

                                <td class="am-hide-sm-only">
                                    <span class="am-badge am-badge-secondary"><?php echo htmlentities($product->sort); ?></span>
                                </td>
                                <td class="am-hide-sm-only"><?php echo htmlentities($product->stock); ?></td>
                                <td class="am-hide-sm-only"><?php echo htmlentities(date('Y-m-d',!is_numeric($product->created_at)? strtotime($product->created_at) : $product->created_at)); ?></td>
                                <td>
                                    <a href="/admin/Product/edit/id/<?php echo htmlentities($product->id); ?>">编辑</a>
                                    <div class="divider divider-vertical"></div>
                                    <a href="<?php echo url('Product/delete', ['id'=>$product->id]); ?>"
                                       onclick="if(confirm('确定要将此商品移至回收站么？')) return true;else return false;">删除</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 <?php echo htmlentities($products->total()); ?> 条记录
                            <div class="am-fr">
                                <?php echo $products; ?>
                            </div>
                        </div>
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

<script src="/vendor/daterangepicker/moment.min.js"></script>
<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<script>
    $(function () {
        $("#created_at").daterangepicker({
            autoUpdateInput: false,
            locale: {
                "applyLabel": "确定",
                "cancelLabel": "取消",
                'daysOfWeek': ['一', '二', '三', '四', '五', '六', '日'],
                'monthNames': ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            },

        }, function (startDate, endDate, label) {  //匿名函数
            this.element[0].value = startDate.format('YYYY-MM-DD') + ' ~ ' + endDate.format('YYYY-MM-DD');
        });

        $('.change_attr').click(function () {
            var data = {
                id: $(this).parents('tr').data('id'),
                attr: $(this).data('attr')
            }
            var _this = $(this);
            $.ajax({
                type: "POST",
                url: "/admin/Product/change_attr",
                data: data,
                success: function () {
                    _this.toggleClass('am-icon-check am-icon-close');
                }
            })
        })
    })
</script>

</body>
</html>
