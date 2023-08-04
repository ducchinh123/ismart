<?php

function construct()
{

    load_model('index');
}


function indexAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_product = totalProduct();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_product'] = $total_product;
    $total_trash = totalProductTrash();
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalProduct();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=index";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
    $data['count_'] = count($list_product);
    $data['list_product'] = $list_product;


    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);

            $info = [];
            $info['is_trash'] = 'yes';
            removeList($ids, $info);
            $action = $_GET['action'];
            return redirect_to("?mod=products&action={$action}");
        }
    }

    load_view('index', $data);
}
function publicProdAction()
{



    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_product = totalProduct();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_product'] = $total_product;
    $total_trash = totalProductTrash();
    $data['total_trash'] = $total_trash;
    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalPublic();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=publicProd";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
    $data['count_'] = count($list_product);
    $data['list_product'] = $list_product;

    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);

            $info = [];
            $info['is_trash'] = 'yes';
            removeList($ids, $info);
            $action = $_GET['action'];
            return redirect_to("?mod=products&action={$action}");
        }
    }
    load_view('index', $data);
}
function privateProdAction()
{



    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_product = totalProduct();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_product'] = $total_product;
    $total_trash = totalProductTrash();
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalPrivate();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=privateProd";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Chờ duyệt' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
    $data['count_'] = count($list_product);
    $data['list_product'] = $list_product;
    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);

            $info = [];
            $info['is_trash'] = 'yes';
            removeList($ids, $info);
            $action = $_GET['action'];
            return redirect_to("?mod=products&action={$action}");
        }
    }
    load_view('index', $data);
}


function addAction()
{

    global $errors, $title, $code, $priceOld, $priceNew, $desc_detail, $desc_short, $image, $parent_id, $status, $notification, $featured, $bestseller, $num;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['product_name'])) {

            $errors['product_name'] = "Không được để trống tên sản phẩm";
        } else {

            $title = $_POST['product_name'];
        }

        if (empty($_POST['product_num'])) {

            $errors['product_num'] = "Không được để trống số lượng sản phẩm";
        } else {

            $num = $_POST['product_num'];
        }


        if (empty($_POST['product_code'])) {

            $errors['product_code'] = "Không được để trống mã sản phẩm";
        } else {

            $code = $_POST['product_code'];
        }


        if (empty($_POST['desc_short'])) {

            $errors['desc_short'] = "Không được để trống mô tả ngắn";
        } else {

            $desc_short = $_POST['desc_short'];
        }


        if (empty($_POST['desc_detail'])) {

            $errors['desc_detail'] = "Không được để trống mô tả chi tiết";
        } else {

            $desc_detail = $_POST['desc_detail'];
        }

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái sản phẩm";
        } else {

            $status = $_POST['status'];
        }

        if (empty($_POST['notification'])) {

            $errors['notification'] = "Không được để tình trạng sản phẩm";
        } else {

            $notification = $_POST['notification'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục sản phẩm";
        } else {

            $parent_id = $_POST['parent-Cat'];
        }

        $priceInt = intval($_POST['priceNew']);
        if (empty($_POST['priceNew']) && $_POST['priceNew'] != 0) {

            $errors['priceNew'] = "Không được để trống giá của sản phẩm";
        } elseif ($priceInt < 0) {
            $errors['priceNew'] = "Giá sản phẩm không được âm";
        } elseif ($priceInt == 0) {
            $errors['priceNew'] = "Giá sản phẩm phải lớn hơn 0";
        } elseif (filter_var($_POST['priceNew'], FILTER_VALIDATE_INT) != TRUE) {

            $errors['priceNew'] = "Giá sản phẩm phải là một số nguyên";
        } else {

            $priceNew = $_POST['priceNew'];
        }

        $priceIntOld = intval($_POST['priceOld']);

        if (!empty($_POST['priceOld']) || ($_POST['priceOld'] == 0)) {

            if ($priceIntOld < 0) {
                $errors['priceOld'] = "Giá cũ sản phẩm không được âm";
            } elseif ($priceIntOld == 0) {
                $errors['priceOld'] = "Giá cũ sản phẩm phải lớn hơn 0";
            } elseif (filter_var($_POST['priceOld'], FILTER_VALIDATE_INT) != TRUE) {

                $errors['priceOld'] = "Giá sản phẩm phải là một số nguyên";
            } else {
                $priceOld = $_POST['priceOld'];
            }
        }



        // ảnh đại diện

        $upload_dir = "./public/images/products/";
        $file_path = $upload_dir . basename($_FILES['thumb']['name']);
        $types_file = ["jpg", "jpeg", "png", "gif"];

        if (!in_array(pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb']['name'])) {

            $errors['image'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb']['size'] > 20000000) {

                $errors['image'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path)) {

                $new_file_name = pathinfo($_FILES['thumb']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);
                }

                $file_path = $new_file_path;
            }
        }
        // end ảnh đại diện


        if (!empty($_POST['is_featured'])) {

            $featured = $_POST['is_featured'];
        } else {

            $featured = "NULL";
        }

        if (!empty($_POST['is_bestseller'])) {

            $bestseller = $_POST['is_bestseller'];
        } else {

            $bestseller = "NULL";
        }



        if (empty($errors)) {


            if ($file_path == "./public/images/products/-Copy.") {



                $data = [
                    'name' => $title,
                    'code' => $code,
                    'price_old' => $priceOld,
                    'price_new' => $priceNew,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'main_img' => "./public/images/img-product.png",
                    'id_cate_prod' => $parent_id,
                    'status' => $status,
                    'notification' => $notification,
                    'is_featured' => $featured,
                    'is_bestseller' => $bestseller,
                    'slug' => create_slug($title),
                    'number' => $num,
                    'create_at' => date('Y-m-d', time())
                ];
            } else {


                move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);
                $data = [
                    'name' => $title,
                    'code' => $code,
                    'price_old' => $priceOld,
                    'price_new' => $priceNew,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'main_img' => $file_path,
                    'id_cate_prod' => $parent_id,
                    'status' => $status,
                    'notification' => $notification,
                    'is_featured' => $featured,
                    'is_bestseller' => $bestseller,
                    'slug' => create_slug($title),
                    'number' => $num,
                    'create_at' => date('Y-m-d', time())
                ];
            }

            $image = $file_path;

            addProduct($data);
        }
    }

    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('add', $data);
}


function deleteTrashAction()
{

    $id = $_GET['id'];
    $info_prod = get_info_prod($id);
    unlink($info_prod['main_img']);
    $info_thumb = get_info_image($id);
    unlink($info_thumb['img_one']);
    unlink($info_thumb['img_two']);
    unlink($info_thumb['img_three']);
    unlink($info_thumb['img_four']);
    unlink($info_thumb['img_five']);
    unlink($info_thumb['img_six']);
    deleteImageProd($id);
    deleteProduct($id);
    return redirect_to("?mod=products&action=indexTrash");
}

function updateAction()
{
    global $errors, $title, $code, $priceOld, $priceNew, $desc_detail, $desc_short, $image, $parent_id, $status, $notification, $featured, $bestseller, $num;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['product_name'])) {

            $errors['product_name'] = "Không được để trống tên sản phẩm";
        } else {

            $title = $_POST['product_name'];
        }

        if (empty($_POST['product_num'])) {

            $errors['product_num'] = "Không được để trống số lượng sản phẩm";
        } else {

            $num = $_POST['product_num'];
        }


        if (empty($_POST['product_code'])) {

            $errors['product_code'] = "Không được để trống mã sản phẩm";
        } else {

            $code = $_POST['product_code'];
        }


        if (empty($_POST['desc_short'])) {

            $errors['desc_short'] = "Không được để trống mô tả ngắn";
        } else {

            $desc_short = $_POST['desc_short'];
        }


        if (empty($_POST['desc_detail'])) {

            $errors['desc_detail'] = "Không được để trống mô tả chi tiết";
        } else {

            $desc_detail = $_POST['desc_detail'];
        }

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái sản phẩm";
        } else {

            $status = $_POST['status'];
        }

        if (empty($_POST['notification'])) {

            $errors['notification'] = "Không được để tình trạng sản phẩm";
        } else {

            $notification = $_POST['notification'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục sản phẩm";
        } else {

            $parent_id = $_POST['parent-Cat'];
        }

        $priceInt = intval($_POST['priceNew']);
        if (empty($_POST['priceNew']) && $_POST['priceNew'] != 0) {

            $errors['priceNew'] = "Không được để trống giá của sản phẩm";
        } elseif ($priceInt < 0) {
            $errors['priceNew'] = "Giá sản phẩm không được âm";
        } elseif ($priceInt == 0) {
            $errors['priceNew'] = "Giá sản phẩm phải lớn hơn 0";
        } elseif (filter_var($_POST['priceNew'], FILTER_VALIDATE_INT) != TRUE) {

            $errors['priceNew'] = "Giá sản phẩm phải là một số nguyên";
        } else {

            $priceNew = $_POST['priceNew'];
        }

        $priceIntOld = intval($_POST['priceOld']);

        if (!empty($_POST['priceOld']) || ($_POST['priceOld'] == 0)) {

            if ($priceIntOld < 0) {
                $errors['priceOld'] = "Giá cũ sản phẩm không được âm";
            } elseif ($priceIntOld == 0) {
                $errors['priceOld'] = "Giá cũ sản phẩm phải lớn hơn 0";
            } elseif (filter_var($_POST['priceOld'], FILTER_VALIDATE_INT) != TRUE) {

                $errors['priceOld'] = "Giá sản phẩm phải là một số nguyên";
            } else {
                $priceOld = $_POST['priceOld'];
            }
        }



        // ảnh đại diện

        $upload_dir = "./public/images/products/";
        $file_path = $upload_dir . basename($_FILES['thumb']['name']);
        $types_file = ["jpg", "jpeg", "png", "gif"];

        if (!in_array(pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb']['name'])) {

            $errors['image'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb']['size'] > 20000000) {

                $errors['image'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path)) {

                $new_file_name = pathinfo($_FILES['thumb']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);
                }

                $file_path = $new_file_path;
            }
        }
        // end ảnh đại diện

        if (!empty($_POST['is_featured'])) {

            $featured = $_POST['is_featured'];
        } else {

            $featured = "NULL";
        }

        if (!empty($_POST['is_bestseller'])) {

            $bestseller = $_POST['is_bestseller'];
        } else {

            $bestseller = "NULL";
        }



        if (empty($errors)) {

            if ($file_path == "./public/images/products/-Copy.") {

                $id = $_GET['id'];
                $info_prod = get_info_prod($id);


                $data = [
                    'name' => $title,
                    'code' => $code,
                    'price_old' => $priceOld,
                    'price_new' => $priceNew,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'main_img' => $info_prod['main_img'],
                    'id_cate_prod' => $parent_id,
                    'status' => $status,
                    'notification' => $notification,
                    'is_featured' => $featured,
                    'is_bestseller' => $bestseller,
                    'slug' => create_slug($title),
                    'number' => $num,
                    'create_at' => date('Y-m-d', time())
                ];
            } else {

                $id = $_GET['id'];
                $info_prod = get_info_prod($id);
                unlink($info_prod['main_img']);
                move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);
                $data = [
                    'name' => $title,
                    'code' => $code,
                    'price_old' => $priceOld,
                    'price_new' => $priceNew,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'main_img' => $file_path,
                    'id_cate_prod' => $parent_id,
                    'status' => $status,
                    'notification' => $notification,
                    'is_featured' => $featured,
                    'is_bestseller' => $bestseller,
                    'slug' => create_slug($title),
                    'number' => $num,
                    'create_at' => date('Y-m-d', time())
                ];
            }

            updateProduct($data, $_GET['id']);
        }
    }

    $id = $_GET['id'];
    $info_prod = get_info_prod($id);
    $data['product'] = $info_prod;
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('update', $data);
}

function searchProductAction()
{
    if (isset($_POST['btn-submit'])) {

        if (!empty($_POST['s'])) {

            $title = $_POST['s'];
        } else {
            $title = "";
        }


        $list_products = get_list_product_by_title($title);
        $data['list_product'] = $list_products;
    }

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_product = totalProduct();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_product'] = $total_product;
    $total_trash = totalProductTrash();
    $data['total_trash'] = $total_trash;

    load_view('index', $data);
}

function cateProductAction()
{




    $total_cate = totalCateProduct();
    $total_cate_trash = totalCateTrashProduct();
    $data['total_cate'] = $total_cate;
    $data['total_cate_trash'] = $total_cate_trash;


    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalCateProduct();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=cateProduct";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_cate = get_data("SELECT * FROM `tbl_cate_product`", $start, $num_per_page, "tbl_cate_product.is_trash = 'no'");
    $data['count_'] = count($list_cate);
    $data['list_cate'] = data_tree($list_cate, 0);
    load_view('cate', $data);
}

// list trash cate

function cateProductTrashAction()
{
    $list_cate = get_all_cate_trash();
    $data['list_cate'] = $list_cate;

    $total_cate = totalCateProduct();
    $total_cate_trash = totalCateTrashProduct();
    $data['total_cate'] = $total_cate;
    $data['total_cate_trash'] = $total_cate_trash;

    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalCateTrashProduct();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=cateProductTrash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_cate = get_data("SELECT * FROM `tbl_cate_product`", $start, $num_per_page, "tbl_cate_product.is_trash = 'yes'");
    $data['count_'] = count($list_cate);
    $data['list_cate'] = $list_cate;

    load_view('cateTrash', $data);
}

function addCateAction()
{
    global $errors, $title, $parent, $status;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['title'])) {
            $errors['title'] = "Không được để trống tên danh mục";
        } else {
            $title = $_POST['title'];
        }

        if ($_POST['parent-Cat'] < 0) {

            $errors['parent-Cat'] = "Không được để trống danh mục cha";
        } else {
            $parent = $_POST['parent-Cat'];
        }

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trống trạng thái";
        } else {

            $status = $_POST['status'];
        }



        if (empty($errors)) {

            $data = [
                'name' => $title,
                'slug' => create_slug($title),
                'parent_id' => $parent,
                'status' => $status,
                'create_at' => date('Y-m-d', time())
            ];

            addCate($data);
        }
    }
    $list_cate = get_all_cate();
    $data['list_cate'] = $list_cate;
    load_view('add_cate', $data);
}


function deleteCateAction()
{
    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    delete_cate($id, $data);
    $data_prod['display'] = 'none';
    updateProduct_display($id, $data_prod);
    return redirect_to("?mod=products&action=cateProduct");
}

function deleteCateTrashAction()
{
    $id = $_GET['id'];
    if (count(get_id_child_by_id_parent($id)) > 0) {

        $ids = get_id_child_by_id_parent($id)[0]['id'];
        $info_prod = get_info_prod_by_id_cate($ids);
        unlink($info_prod['main_img']);
        $info_thumb = get_info_image($info_prod['id']);
        unlink($info_thumb['img_one']);
        unlink($info_thumb['img_two']);
        unlink($info_thumb['img_three']);
        unlink($info_thumb['img_four']);
        unlink($info_thumb['img_five']);
        unlink($info_thumb['img_six']);
        delete_cate_by_id_parent($id);
        delete_cate_trash($id);
        deleteImageProd($info_prod['id']);
        deleteProduct($info_prod['id']);
    } else {
        delete_cate_trash($id);
        $info_prod = get_info_prod_by_id_cate($id);
        unlink($info_prod['main_img']);
        $info_thumb = get_info_image($info_prod['id']);
        unlink($info_thumb['img_one']);
        unlink($info_thumb['img_two']);
        unlink($info_thumb['img_three']);
        unlink($info_thumb['img_four']);
        unlink($info_thumb['img_five']);
        unlink($info_thumb['img_six']);
        deleteImageProd($info_prod['id']);
        deleteProduct($info_prod['id']);
    }

    return redirect_to("?mod=products&action=cateProductTrash");
}

function updateCateTrashAction()
{
    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    delete_cate($id, $data);
    $data_prod['display'] = 'block';
    updateProduct_display($id, $data_prod);
    return redirect_to("?mod=products&action=cateProductTrash");
}


function editCateAction()
{
    global $errors, $title, $parent, $status;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['title'])) {
            $errors['title'] = "Không được để trống tên danh mục";
        } else {
            $title = $_POST['title'];
        }

        if ($_POST['parent-Cat'] < 0) {

            $errors['parent-Cat'] = "Không được để trống danh mục cha";
        } else {
            $parent = $_POST['parent-Cat'];
        }

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trống trạng thái";
        } else {

            $status = $_POST['status'];
        }



        if (empty($errors)) {

            $data = [
                'name' => $title,
                'slug' => create_slug($title),
                'parent_id' => $parent,
                'status' => $status,
                'create_at' => date('Y-m-d', time())
            ];

            updateCate($data, $_GET['id']);
        }
    }
    $id = $_GET['id'];
    $info_cate = get_info_cate($id);
    $data['info_cate'] = $info_cate;
    $list_cate = get_all_cate();
    $data['list_cate'] = $list_cate;
    load_view('updateCate', $data);
}


// Thùng rác

function removeTrashProdAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = "yes";
    update_prod($id, $data);
    return redirect_to("?mod=products&action=index");
}

function updateTrashProdAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = "no";
    update_prod($id, $data);
    return redirect_to("?mod=products&action=indexTrash");
}


// hiển thi sản phẩm trong thùng

function indexTrashAction()
{
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_product = totalProduct();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_product'] = $total_product;
    $total_trash = totalProductTrash();
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 5;
    $total_rows = $total_trash;


    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=products&action=indexTrash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_product = get_data("SELECT `tbl_products`.*, tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name FROM `tbl_products` INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.display <> 'none' AND tbl_products.is_trash = 'yes'");
    $data['count_'] = count($list_product);
    $data['list_product'] = $list_product;

    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);
            $action = $_GET['action'];
            deleteList($ids);
            return redirect_to("?mod=products&action={$action}");
        }
    }

    load_view('indexTrash', $data);
}
