<?php

function construct()
{

    load_model('index');
}


function indexAction()
{


    $data['total_order'] = total_order();
    $data['total_order_trash'] = total_order_trash();

    // Phân trang //
    $num_per_page = 5;
    $total_rows = total_order();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=orders&action=index";
    $data['total_rows'] = $total_rows;
    ///=====================
    if (isset($_POST['sm_s'])) {

        if (!empty($_POST['s'])) {
            $code = $_POST['s'];
        } else {
            $code = '';
        }
        $list_order = get_order_search($code);
        $data['total_rows'] = 0;
    } else {
        $list_order = get_data("SELECT tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` ", $start, $num_per_page, "1 AND tbl_orders.is_trash = 'no' ORDER BY tbl_orders.id DESC");
    }
    $data['count_'] = count($list_order);
    if (!empty($list_order)) {
        $data['list_order'] = $list_order;
    }

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
            return redirect_to("?mod=orders&action=index");
        }
    }

    load_view('index', $data);
}
//

//

function customerAction()
{


    $data['total_customer'] = total_customer();


    // Phân trang //
    $num_per_page = 5;
    $total_rows = total_customer();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=orders&action=customer";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_customer = get_data("SELECT tbl_orders.id, tbl_orders.fullname,tbl_orders.phone, tbl_orders.email, tbl_orders.address, tbl_orders.num_order, tbl_orders.create_at FROM `tbl_orders` ", $start, $num_per_page, "1 ORDER BY tbl_orders.fullname ASC");
    $data['count_'] = count($list_customer);
    if (!empty($list_customer)) {
        $data['list_customer'] = $list_customer;
    }

    load_view('customer', $data);
}

function detailAction()
{
    $id = $_GET['id'];


    if (isset($_POST['sm_status'])) {

        if (!empty($_POST['st_order'])) {
            $st_order = $_POST['st_order'];
            $data['st_order'] = $st_order;

            if (!empty($_GET['id'])) {
                $order = get_detail_order($_GET['id']);
                if ($st_order == "Đang Vận chuyển") {

                    $title = '[Ismart] Thư xác nhận trạng thái "Đang vận chuyển" cho đơn hàng ' . $order['code_order'] . ' của bạn';
                    $content = "Cảm ơn bạn đã đặt hàng tại Ismart. Hiện đơn hàng của bạn đang ở trạng thái ĐANG VẬN CHUYỂN. Trong thời gian này bạn vui lòng chờ đợi hàng về và có thể tiếp tục hoạt động mua sắm khác trên Ismart nhé. Cảm ơn bạn! ";
                } elseif ($st_order == "Thành công") {
                    $title = '[Ismart] Thư xác nhận giao hàng thành công cho đơn hàng ' . $order['code_order'] . ' của bạn';
                    $content = "Cảm ơn bạn đã đặt hàng tại Ismart. Hiện đơn hàng của bạn đang ở trạng thái THÀNH CÔNG. Bạn vui lòng kiểm tra kỹ lại sản phẩm đã đặt, nếu có vấn đề gì ngoài ý muốn bạn lòng liên hệ lại cửa hàng qua SĐT: 0888575576. Cảm ơn bạn!";
                } else {
                    $content = "";
                }
                if (!empty($content)) {
                    send_email($order['email'], $order['fullname'], $title, $content);
                }
            }
            updateOrder($_GET['id'], $data);
        }
    }
    if (!empty($id)) {
        $order = get_detail_order($id);
        $data['order'] = $order;
        $data['info_prod'] = json_decode($order['detail_order'], true);
    }
    load_view('detail', $data);
}


// xóa tạm

function deleteAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    remove_order($id, $data);
    redirect_to("?mod=orders&action=index");
}

function restoreAction()
{
    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    remove_order($id, $data);
    redirect_to("?mod=orders&action=indexTrash");
}

function indexTrashAction()
{


    $data['total_order'] = total_order();
    $data['total_order_trash'] = total_order_trash();

    // Phân trang //
    $num_per_page = 5;
    $total_rows = total_order();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=orders&action=indexTrash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_order = get_data("SELECT  tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` ", $start, $num_per_page, "1 AND tbl_orders.is_trash = 'yes' ORDER BY tbl_orders.id DESC");
    $data['count_'] = count($list_order);
    if (!empty($list_order)) {
        $data['list_order'] = $list_order;
    }

    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);

            deleteList($ids);
            return redirect_to("?mod=orders&action=indexTrash");
        }
    }


    load_view('trash', $data);
}

// xóa đơn hàng

function deleteTrashAction()
{

    $id = $_GET['id'];
    deleteTrash($id);
    redirect_to("?mod=orders&action=indexTrash");
}
