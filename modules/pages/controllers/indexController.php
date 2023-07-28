<?php

function construct()
{

    load_model('index');
}


function indexAction()
{


    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $info_page = get_page_by_id($id);
        $data['info_page'] = $info_page;
    }

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
