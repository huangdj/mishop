<?php /*a:4:{s:80:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/product/create.html";i:1588124650;s:76:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/app.html";i:1587956237;s:87:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_header.html";i:1587521497;s:88:"/Users/holy/Developer/ThinkPHP/mishop/application/admin/view/Layout/shared/_sidebar.html";i:1588335042;}*/ ?>
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
    
<link rel="stylesheet" href="/vendor/webupload/dist/webuploader.css"/>
<link rel="stylesheet" type="text/css" href="/vendor/webupload/style.css"/>

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
                <li><a href="/admin/Product/index">商品管理</a></li>
                <li>新增商品</li>
            </ol>
        </div>

        <div class="page-body">
            <form class="am-form am-form-horizontal" action="/admin/Product/save" method="post">

                <div class="am-tabs am-margin" data-am-tabs>
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">通用信息</a></li>
                        <li><a href="#tab2">商品介绍</a></li>
                        <li><a href="#tab3">商品相册</a></li>
                    </ul>
                    <div class="am-tabs-bd">

                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">类别</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select multiple
                                            data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                            name="category_id[]">
                                        <option value="">请选择</option>

                                        <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                        <optgroup label="<?php echo htmlentities($category->name); ?>">
                                            <?php if(is_array($category['children']) || $category['children'] instanceof \think\Collection || $category['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo htmlentities($child->id); ?>">
                                                <?php echo htmlentities($child->name); ?>
                                            </option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </optgroup>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">名称</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="name" placeholder="输入商品名称">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">品牌</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360}"
                                            name="brand_id">
                                        <option value="">请选择</option>

                                        <?php if(is_array($brands) || $brands instanceof \think\Collection || $brands instanceof \think\Paginator): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($brand['id']); ?>">
                                            <?php echo htmlentities($brand['name']); ?>
                                        </option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">图片</label>

                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <div class="am-form-group am-form-file">
                                        <button type="button" class="am-btn am-btn-success am-btn-sm">
                                            <i class="am-icon-cloud-upload" id="loading"></i> 上传缩略图
                                        </button>
                                        <input type="file" id="image_upload">
                                        <input type="hidden" name="photo_id">
                                    </div>

                                    <hr data-am-widget="divider" style=""
                                        class="am-divider am-divider-dashed am-no-layout">

                                    <div>
                                        <img src="" id="img_show" style="max-height: 150px;margin-bottom: 10px;">
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">单价</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="price" placeholder="输入商品单价">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">库存</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="stock" placeholder="输入商品库存">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">排序</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="sort" placeholder="输入商品排序">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">上架</label>

                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" value="1" name="is_onsale" checked=""> 是
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" value="0" name="is_onsale"> 否
                                    </label>
                                </div>
                            </div>

                            <div class="am-margin-top">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">类型</label>

                                <input type="hidden" name="is_top" value="0">
                                <input type="hidden" name="is_recommend" value="0">
                                <input type="hidden" name="is_hot" value="0">
                                <input type="hidden" name="is_new" value="0">

                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <div class="am-btn-group" data-am-button>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_top" value="1"> 置顶
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_recommend" value="1"> 推荐
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_hot" value="1"> 热销
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_new" value="1"> 新品
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab2">

                            <div class="am-margin-top">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">介绍</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <script id="container" name="content" type="text/plain">这里写商品内容</script>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">
                            <div id="uploader">
                                <div class="queueList">
                                    <div id="dndArea" class="placeholder">
                                        <div id="filePicker"></div>
                                        <p>或将照片拖到这里，单次最多可选300张</p>
                                    </div>
                                </div>
                                <div class="statusBar" style="display:none;">
                                    <div class="progress">
                                        <span class="text">0%</span>
                                        <span class="percentage"></span>
                                    </div>
                                    <div class="info"></div>
                                    <div class="btns">
                                        <div id="filePicker2"></div>
                                        <div class="uploadBtn">开始上传</div>
                                    </div>
                                </div>

                                <div id="imgs"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location='/admin/Product/index'"
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

<script type="text/javascript" src="/vendor/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/vendor/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>

<script type="text/javascript" src="/vendor/webupload/dist/webuploader.js"></script>
<script type="text/javascript" src="/vendor/webupload/upload.js"></script>

</body>
</html>
