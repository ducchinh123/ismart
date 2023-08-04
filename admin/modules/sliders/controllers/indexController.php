<?php

function construct()
{

    load_model('index');
}


function indexAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;
    // Phân trang //
    $num_per_page = 3;
    $total_rows = $total_slider;

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=sliders&action=index";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "tbl_sliders.is_trash = 'no'");
    $data['count_'] = count($list_slider);
    $data['list_slider'] = $list_slider;

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
            return redirect_to("?mod=sliders&action={$action}");
        }
    }
    load_view('index', $data);
}
function publicAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;
    // Phân trang //
    $num_per_page = 3;
    $total_rows = $total_public;

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=sliders&action=public";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "`status` = 'Công khai' AND tbl_sliders.is_trash = 'no'");
    $data['list_slider'] = $list_slider;
    $data['count_'] = count($list_slider);
    //=========
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
            return redirect_to("?mod=sliders&action={$action}");
        }
    }
    load_view('index', $data);
}
function privateAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;
    // Phân trang //
    $num_per_page = 3;
    $total_rows = $total_private;

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=sliders&action=private";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "`status` = 'Chờ duyệt' AND tbl_sliders.is_trash = 'no'");
    $data['list_slider'] = $list_slider;
    $data['count_'] = count($list_slider);
    //=========
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
            return redirect_to("?mod=sliders&action={$action}");
        }
    }
    load_view('index', $data);
}
function searchAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;

    if (isset($_POST['btn-submit'])) {

        if (!empty($_POST['s'])) {
            $title = $_POST['s'];
        } else {

            $title = "";
        }
        // Phân trang //
        $num_per_page = 3;
        $total_rows = totalSearch($title);

        //--> Tính số trang
        $num_page = ceil($total_rows / $num_per_page);
        //--> Trang hiện tại
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //--> Chỉ mục bắt đầu lấy ra
        $start = ($page - 1) * $num_per_page;

        $data['num_page'] = $num_page;
        $data['page'] = $page;
        $data['url'] = "?mod=sliders&action=index";
        $data['total_rows'] = $total_rows;
        ///=====================
        $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "`name` LIKE  '%{$title}%'");
        $data['list_slider'] = $list_slider;
    }
    load_view('index', $data);
}

function addAction()
{

    global $errors, $title, $url, $status, $image;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['title'])) {

            $errors['title'] = "Không được để trống tiêu đề slider";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['slug'])) {

            $errors['slug'] = "Không được để trống link slider";
        } else {

            $url = $_POST['slug'];
        }


        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trống trạng thái slider";
        } else {

            $status = $_POST['status'];
        }


        // ảnh đại diện

        $upload_dir = "./public/images/sliders/";
        $file_path = $upload_dir . basename($_FILES['thumb']['name']);
        $types_file = ["jpg", "jpeg", "png", "gif"];

        if (!empty($_FILES['thumb']['name'])) {

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
        } else {

            $errors['image'] = "Không được để trống ảnh slider";
        }
        // end ảnh đại diện


        if (empty($errors)) {

            move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);
            $image = $file_path;
            $data = [
                'name' => $title,
                'link' => $url,
                'image' => $file_path,
                'status' => $status,
                'create_at' => date('Y-m-d', time())
            ];

            addSlider($data);
        }
    }

    load_view('add');
}


function deleteAction()
{

    $id = $_GET['id'];
    $info_thumb = get_info_slider($id);
    unlink($info_thumb['image']);
    deleteSlider($id);
    return redirect_to("?mod=sliders&action=indexTrash");
}


function editAction()
{
    global $errors, $title, $url, $status, $image;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['title'])) {

            $errors['title'] = "Không được để trống tiêu đề slider";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['slug'])) {

            $errors['slug'] = "Không được để trống link slider";
        } else {

            $url = $_POST['slug'];
        }


        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trống trạng thái slider";
        } else {

            $status = $_POST['status'];
        }


        // ảnh đại diện

        $upload_dir = "./public/images/sliders/";
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


        if (empty($errors)) {


            if ($file_path == "./public/images/sliders/-Copy.") {

                $id = $_GET['id'];
                $info_slider = get_info_slider($id);

                $image = $file_path;
                $data = [
                    'name' => $title,
                    'link' => $url,
                    'image' => $info_slider['image'],
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            } else {

                $id = $_GET['id'];
                $info_thumb = get_info_slider($id);
                unlink($info_thumb['image']);
                move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);
                $image = $file_path;
                $data = [
                    'name' => $title,
                    'link' => $url,
                    'image' => $file_path,
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            }



            updateSlider($data, $_GET['id']);
        }
    }
    $id = $_GET['id'];
    $info_slider = get_info_slider($id);
    $data['info_slider'] = $info_slider;
    load_view('update', $data);
}


// trash

function indexTrashAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = $total_trash;

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=sliders&action=indexTrash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "tbl_sliders.is_trash = 'yes'");
    $data['list_slider'] = $list_slider;
    $data['list_slider'] = $list_slider;
    $data['count'] = count($list_slider);

    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            foreach ($ids as $id) {

                $info_thumb = get_info_slider($id);
                unlink($info_thumb['image']);
            }

            $ids = implode(",", $ids);
            $action = $_GET['action'];
            deleteList($ids);
            return redirect_to("?mod=sliders&action={$action}");
        }
    }
    load_view('indexTrash', $data);
}


function removeTrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    removeTrash($id, $data);
    return redirect_to("?mod=sliders&action=index");
}


function updateTrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    removeTrash($id, $data);
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_slider = totalSlider();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_slider'] = $total_slider;
    // Phân trang //
    $num_per_page = 3;
    $total_rows = $total_trash;

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=sliders&action=index";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_slider = get_data("SELECT * FROM `tbl_sliders`", $start, $num_per_page, "tbl_sliders.is_trash = 'yes'");
    $data['count'] = count($list_slider);
    $data['list_slider'] = $list_slider;
    load_view('indexTrash', $data);
}
