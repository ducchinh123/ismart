<?php

function construct()
{

    load_model('index');
}


function indexAction()
{
    // Phục vụ cho việc show danh mục đa cấp
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    // Phục vụ cho việc show slider
    $list_sliders = get_all_slider();
    $data['list_slider'] = $list_sliders;
    // Phục vụ cho sản phẩm bán chạy
    $list_bestseller = get_product_bestseller();
    $data['list_bestseller'] = $list_bestseller;
    // Pục vụ cho sản phẩm nổi bật
    $list_featured = get_product_featured();
    $data['list_featured'] = $list_featured;

    // hiển thị sản phẩm kèm tên danh mục tương ứng


    $list_cate_id = get_cate_parent_id();

    if (!empty($list_cate_id)) {

        $list_cate = get_all_cate();

        $list_item = [];

        foreach ($list_cate_id as $item) {

            $list_child = data_tree($list_cate, $item['id']);

            if (!empty($list_child)) {
                $list_id = [];

                foreach ($list_child as $child) {

                    $list_id[] = $child['id'];
                }

                $ids = "(" . implode(',', $list_id) . ")";

                $list_product = get_product_by_id_cate($ids);

                $list_item[] = [
                    'id_cate' => $item['id'],
                    'cate_name' => $item['name'],
                    'product' => $list_product
                ];
            }
        }

        if (!empty($list_item)) {

            $data['list_item'] = $list_item;
        }
    }


    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }




    load_view('index', $data);
}
