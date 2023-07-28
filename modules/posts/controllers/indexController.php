<?php

function construct()
{

    load_model('index');
}

function indexAction()
{


    // Phân trang //
    $num_per_page = 5;
    $total_rows = totalPost();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['total_rows'] = $total_rows;
    $data['url'] = "bai-viet";
    ///=====================
    $list_post = get_data("SELECT tbl_posts.id, tbl_posts.title, tbl_posts.image, tbl_posts.desc_short, tbl_posts.slug ,tbl_posts.create_at FROM tbl_posts", $start, $num_per_page, "tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;


    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    // Phục vụ cho sản phẩm bán chạy
    $list_bestseller = get_product_bestseller();
    $data['list_bestseller'] = $list_bestseller;

    load_view('index', $data);
}


function detailAction()
{

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id = $_GET['id'];
        $info_post = get_post_by_id($id);
        $data['post'] = $info_post;
    }

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    // Phục vụ cho sản phẩm bán chạy
    $list_bestseller = get_product_bestseller();
    $data['list_bestseller'] = $list_bestseller;

    load_view('detail', $data);
}
