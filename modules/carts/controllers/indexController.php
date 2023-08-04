<?php

function construct()
{

    load_model('index');
}

function indexAction()
{
    $data = [];
    if (isset($_SESSION['cart'])) {

        $data['cart_buy'] = $_SESSION['cart']['buy'];
        $data['cart_info'] = $_SESSION['cart']['info_cart'];
    }

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }
    load_view('index', $data);
}


function addAction()
{

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id = $_GET['id'];
        $info_prod = get_info_prod($id);
        $url = "san-pham/" . $info_prod['slug'] . "." . $info_prod['id'] . "." . $info_prod['id_cate_prod'] . ".html";
        // Kiểm tra xem đã có sản phẩm này trong giỏ hàng hay chưa?
        /*
        1. Nếu có thì cập nhật số lượng,...
        2. Không có thì thêm vào
    */

        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

            if (isset($_POST['btn-add-cart'])) {

                if (!empty($_POST['num-order'])) {

                    $qty = $_SESSION['cart']['buy'][$id]['qty'] + $_POST['num-order'];
                } else {

                    $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
                }
            } else {

                $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
            }
        } else {

            if (isset($_POST['btn-add-cart'])) {

                if (!empty($_POST['num-order'])) {

                    $qty = $_POST['num-order'];
                } else {

                    $qty = 1;
                }
            } else {

                $qty = 1;
            }
        }
        // Tiến hành thêm

        $_SESSION['cart']['buy'][$id] = [
            'id'  => $info_prod['id'],
            'code' => $info_prod['code'],
            'price' => $info_prod['price_new'],
            'thumb' => $info_prod['main_img'],
            'name' => $info_prod['name'],
            'qty' => $qty,
            'sub_total' => $info_prod['price_new'] * $qty,
            'url' => $url

        ];

        // gọi info_cart để cập nhật sau mỗi lần thêm
        info_cart();

        $data['cart_buy'] = $_SESSION['cart']['buy'];
        $data['cart_info'] = $_SESSION['cart']['info_cart'];
    }

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    load_view('index', $data);
}


function info_cart()
{

    $num_order = 0;
    $total = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) {

        foreach ($_SESSION['cart']['buy'] as $cart) {

            $num_order += $cart['qty'];
            $total += $cart['sub_total'];
        }
    }

    $_SESSION['cart']['info_cart'] = [
        'num_order' => $num_order,
        'total' => $total
    ];
}

function deleteProductAction()
{

    $id = $_GET['id'];
    unset($_SESSION['cart']['buy'][$id]);
    info_cart();
    return redirect_to("gio-hang");
}


function deleteCartAction()
{

    unset($_SESSION['cart']);
    return redirect_to("gio-hang");
}

// cập nhật giỏ hàng

function updateCartAction()
{

    $id = $_POST['id'];
    $qty = $_POST['num_order'];
    $product = get_info_prod($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

        // Cập nhật lại số lượng cho sản phẩm

        $_SESSION['cart']['buy'][$id]['qty'] = $qty;

        // Cập nhật lại thành tiền cho sản phẩm

        $_SESSION['cart']['buy'][$id]['sub_total'] = $qty * $product['price_new'];
        $sub_total = $_SESSION['cart']['buy'][$id]['sub_total'];

        // Cập nhật lại giỏ hàng

        info_cart();

        // lấy ra tổng giá, tổng số lượng, thành tiền để gửi đi

        $total = $_SESSION['cart']['info_cart']['total'];
        $num_order = $_SESSION['cart']['info_cart']['num_order'];

        $dataSendAjax = [
            'total' => currency($total),
            'num_order' => $num_order,
            'sub_total' => currency($sub_total)
        ];

        echo json_encode($dataSendAjax);
    }
}
