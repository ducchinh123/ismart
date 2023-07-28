<!DOCTYPE html>
<html>

<head>
    <title>Quản lý ISMART</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/unitop.vn/back-end/project_ismart/ismart.com/admin/">
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="header-wp">
            <div class="wp-inner clearfix">
                <a href="?mod=posts&controller=index&action=home" title="" id="logo" class="fl-left">ADMIN</a>
                <ul id="main-menu" class="fl-left">
                    <li>
                        <a href="?mod=pages&action=list" title="">Trang</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?mod=pages&action=add" title="">Thêm mới</a>
                            </li>
                            <li>
                                <a href="?mod=pages&action=list" title="">Danh sách trang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?mod=posts&action=home" title="">Bài viết</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?mod=posts&action=add" title="">Thêm mới</a>
                            </li>
                            <li>
                                <a href="?mod=posts&action=home" title="">Danh sách bài viết</a>
                            </li>
                            <li>
                                <a href="?mod=posts&action=catePost" title="">Danh mục bài viết</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?mod=products&action=index" title="">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?mod=products&action=add" title="">Thêm mới</a>
                            </li>
                            <li>
                                <a href="?mod=products&action=index" title="">Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="?mod=products&action=cateProduct" title="">Danh mục sản phẩm</a>
                            </li>
                            <li>
                                <a href="?mod=thumb-products&action=list" title="">Ảnh sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?mod=orders&action=index" title="">Bán hàng</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?mod=orders&action=index" title="">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="?mod=orders&action=customer" title="">Danh sách khách hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?mod=orders&action=index" title="">Slider</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?mod=sliders&action=add" title="">Thêm mới</a>
                            </li>
                            <li>
                                <a href="?mod=sliders&action=index" title="">Danh sách Slider</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                    <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div id="thumb-circle" class="fl-left">
                            <img src="public/images/img-admin.png">
                        </div>
                        <h3 id="account" class="fl-right">Admin</h3>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="?mod=users&controlller=index&action=update" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                        <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                    </ul>
                </div>
            </div>
        </div>