<?php

function construct()
{

    load_model('index');
}


function indexAction()
{


    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $list_cate = get_all_cate();
        $list_child = data_tree($list_cate, $_GET['id']);
        $data['id'] = $_GET['id'];
        $data['url'] = $_GET['url'];

        if (!empty($list_child)) {
            $list_id = [];

            foreach ($list_child as $child) {

                $list_id[] = $child['id'];
            }

            $ids = "(" . implode(',', $list_id) . ")";

            $list_product = get_product_by_id_cate($ids);

            //

            // Phân trang //
            $num_per_page = 12;
            $total_rows = count($list_product);

            //--> Tính số trang
            $num_page = ceil($total_rows / $num_per_page);
            //--> Trang hiện tại
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            //--> Chỉ mục bắt đầu lấy ra
            $start = ($page - 1) * $num_per_page;

            $data['num_page'] = $num_page;
            $data['page'] = $page;
            $data['url'] = "san-pham/" . $_GET['url'] . ".html/" . $_GET['id'];
            $data['total_rows'] = $total_rows;
            ///=====================

            $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
            INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in {$ids}");

            if (isset($_POST['btn-filter'])) {

                if (!empty($_POST['select'])) {

                    if ($_POST['select'] == "1") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in {$ids}", "tbl_products.name ASC");
                    }
                    if ($_POST['select'] == "2") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in {$ids}", "tbl_products.name DESC");
                    }
                    if ($_POST['select'] == "3") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in {$ids}", "tbl_products.price_new ASC");
                    }
                    if ($_POST['select'] == "4") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in {$ids}", "tbl_products.price_new DESC");
                    }
                }
            }
            $data['count_'] = count($list_product);
            $data['list_product'] = $list_product;
        } else {

            $list_product = get_product_by_id_cate("(" . $_GET['id'] . ")");

            //

            $id =  $_GET['id'];


            // Phân trang //
            $num_per_page = 12;
            $total_rows = count($list_product);

            //--> Tính số trang
            $num_page = ceil($total_rows / $num_per_page);
            //--> Trang hiện tại
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            //--> Chỉ mục bắt đầu lấy ra
            $start = ($page - 1) * $num_per_page;

            $data['num_page'] = $num_page;
            $data['page'] = $page;
            $data['url'] = "san-pham/" . $_GET['url'] . ".html/" . $_GET['id'];
            $data['total_rows'] = $total_rows;
            ///=====================


            $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
            INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in ($id)");
            if (isset($_POST['btn-filter'])) {

                if (!empty($_POST['select'])) {

                    if ($_POST['select'] == "1") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in ($id)", "tbl_products.name ASC");
                    }
                    if ($_POST['select'] == "2") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in ($id)", "tbl_products.name DESC");
                    }
                    if ($_POST['select'] == "3") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in ($id)", "tbl_products.price_new ASC");
                    }
                    if ($_POST['select'] == "4") {

                        $list_product = get_data("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
                INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai'", $start, $num_per_page, "tbl_cate_product.id in ($id)", "tbl_products.price_new DESC");
                    }
                }
            }
            $data['count_'] = count($list_product);
            $data['list_product'] = $list_product;
        }

        $data['cate_name'] = get_name_cate($_GET['id']);
    }

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    // Phục vụ cho việc show danh mục đa cấp
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('index', $data);
}
function listAction()
{

    // Phục vụ cho việc show danh mục đa cấp
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    $cate_name = [
        'name' => "TẤT CẢ SẢN PHẨM"
    ];

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    $data['cate_name'] = $cate_name;

    // Phân trang //
    $num_per_page = 12;
    $total_rows = totalProduct();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "san-pham/danh-sach-san-pham.html";
    $data['total_rows'] = $total_rows;
    ///=====================

    $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
        FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");

    if (isset($_POST['btn-filter'])) {

        if (!empty($_POST['select'])) {

            if ($_POST['select'] == "1") {

                $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
                FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' ", "tbl_products.name ASC");
            }
            if ($_POST['select'] == "2") {

                $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
                FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' ", "tbl_products.name DESC");
            }
            if ($_POST['select'] == "3") {

                $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
                FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' ", "tbl_products.price_new DESC");
            }
            if ($_POST['select'] == "4") {

                $list_product = get_data("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
                FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id", $start, $num_per_page, "tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' ", "tbl_products.price_new ASC");
            }
        }
    }
    $data['count_'] = count($list_product);
    $data['list_product'] = $list_product;
    load_view('index', $data);
}

function detailAction()
{


    // Phục vụ lấy ra list sản phẩm cùng loại
    if (!empty($_GET['id']) && !empty($_GET['id_cate'])) {

        $id = $_GET['id'];
        $id_cate = $_GET['id_cate'];
        $list_product_same_kind = get_product_same_kind($id, $id_cate);
        $data['same_kind'] = $list_product_same_kind;
    }

    // Hiển thị thông tin của sản phẩm vừa nhấp

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $info_product = get_info_prod($id);
        $data['info_product'] = $info_product;

        $list_thumb_detail = get_thumb_detail($id);
        $data['thumb_detail'] = $list_thumb_detail;
    }


    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    // Phục vụ cho việc show danh mục đa cấp
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    $list_product = get_all_product();
    $data['list_product'] = $list_product;
    $cate_name = [
        'name' => "TẤT CẢ SẢN PHẨM"
    ];
    $data['cate_name'] = $cate_name;

    load_view('detail', $data);
}


function searchAction()
{

    // Phục vụ cho việc show danh mục đa cấp
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;


    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }



    if (isset($_POST['s'])) {

        $value = $_POST['s'];
        if (!empty($_POST['s'])) {
            $cate_name = [
                'name' => "Kết quả cho " . "'" . $value . "'"
            ];
        } else {

            $cate_name = [
                'name' => "Kết quả cho ' '"
            ];
        }
        $data['cate_name'] = $cate_name;

        $total_rows = totalResult($value);
        $data['total_rows'] = $total_rows;
        ///=====================
        $list_product = get_list_product_by_title($value);
        $data['count_'] = count($list_product);
        $data['list_product'] = $list_product;
    }

    load_view('index', $data);
}
