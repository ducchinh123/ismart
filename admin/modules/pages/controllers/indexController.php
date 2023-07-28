<?php

function construct()
{

    load_model('index');
}

function addAction()
{


    global $errors, $title, $desc, $status;
    $errors = [];
    if (isset($_POST['btn-submit'])) {

        if (empty($_POST['title'])) {

            $errors['title'] = "Không được để trống tiêu đề trang";
        } else {

            $title = $_POST['title'];
        }

        if (empty($_POST['desc'])) {

            $errors['desc'] = "Không được để trống mô tả trang";
        } else {

            $desc = $_POST['desc'];
        }

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái trang";
        } else {

            $status = $_POST['status'];
        }

        if (empty($errors)) {

            $data = [

                'title' => $title,
                'description' => $desc,
                'slug' => create_slug($title),
                'status' => $status,
                'creator' => 'Admin',
                'create_at' => date('Y-m-d', time())
            ];
            addPage($data);
        }
    }

    load_view('index');
}

function listAction()
{


    $data['trash'] = trashPage();
    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalPage();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=pages&action=list";
    $data['total_rows'] = $total_rows;
    ///=====================
    $listPage = get_data("SELECT * FROM `tbl_pages`", $start, $num_per_page, "status = 'Công khai' AND is_trash = 'no'");
    $data['listPage'] = $listPage;
    $data['count_'] = count($listPage);
    //=========
    load_view('list', $data);
}

function publicAction()
{

    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();
    $data['trash'] = trashPage();
    // Phân trang //
    $num_per_page = 3;
    $total_rows = publicPage();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=pages&action=public";
    $data['total_rows'] = $total_rows;
    ///=====================
    $listPage = get_data("SELECT * FROM `tbl_pages`", $start, $num_per_page, "status = 'Công khai' AND is_trash = 'no'");
    $data['listPage'] = $listPage;
    $data['count_'] = count($listPage);
    load_view('public', $data);
}
function pendingAction()
{
    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();
    $data['trash'] = trashPage();
    // Phân trang //
    $num_per_page = 3;
    $total_rows = privatePage();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=pages&action=private";
    $data['total_rows'] = $total_rows;
    ///=====================
    $listPage = get_data("SELECT * FROM `tbl_pages`", $start, $num_per_page, "status = 'Chờ duyệt' AND is_trash = 'no'");
    $data['listPage'] = $listPage;
    $data['count_'] = count($listPage);
    load_view('pending', $data);
}

function deletetrashAction()
{
    $id = $_GET['id'];
    $data['is_trash'] = "yes";
    $update = trash($id, $data);
    return redirect_to(
        "?mod=pages&action=list"
    );
}
function deleteAction()
{
    $id = $_GET['id'];
    $delete = deletePage($id);
    return redirect_to(
        "?mod=pages&action=trashcan"
    );
}


function editAction()
{

    if (isset($_POST['btn-submit'])) {

        global $errors, $title, $desc, $status;
        $errors = [];
        if (isset($_POST['btn-submit'])) {

            if (empty($_POST['title'])) {

                $errors['title'] = "Không được để trống tiêu đề trang";
            } else {

                $title = $_POST['title'];
            }

            if (empty($_POST['desc'])) {

                $errors['desc'] = "Không được để trống mô tả trang";
            } else {

                $desc = $_POST['desc'];
            }

            if (empty($_POST['status'])) {

                $errors['status'] = "Không được để trạng thái trang";
            } else {

                $status = $_POST['status'];
            }

            if (empty($errors)) {

                $data = [

                    'title' => $title,
                    'description' => $desc,
                    'status' => $status,
                    'creator' => 'Admin',
                    'slug' => create_slug($title),
                    'create_at' => date('Y-m-d', time())
                ];

                edit_page($data, $_GET['id']);
            }
        }
    }
    $id = $_GET['id'];
    $info = get_page_current($id);
    $data['info_page'] = $info;
    load_view('update', $data);
}


function searchAction()
{

    if (isset($_POST['search'])) {

        if (!empty($_POST['keyword'])) {

            $data['listPage'] = searchPage($_POST['keyword']);
        } else {

            $data['listPage'] = get_all_page();
        }
    } else {
        $data['listPage'] = get_all_page();
    }

    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();
    $data['trash'] = trashPage();
    load_view('list', $data);
}

function searchPrivateAction()
{

    if (isset($_POST['search'])) {

        if (!empty($_POST['keyword'])) {

            $data['listPage'] = searchPrivatePage($_POST['keyword']);
        } else {

            $data['listPage'] = get_all_page();
        }
    } else {
        $data['listPage'] = get_all_page();
    }

    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();
    $data['trash'] = trashPage();
    load_view('list', $data);
}

function trashcanAction()
{

    $data['count'] = totalPage();
    $data['public'] = publicPage();
    $data['private'] = privatePage();
    $data['trash'] = trashPage();
    // Phân trang //
    $num_per_page = 3;
    $total_rows = trashPage();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=pages&action=trashcan";
    $data['total_rows'] = $total_rows;
    ///=====================
    $listPage = get_data("SELECT * FROM `tbl_pages`", $start, $num_per_page, "is_trash = 'yes'");
    $data['listPage'] = $listPage;
    $data['count_'] = count($listPage);
    load_view('trash_can', $data);
}


function updateTrashAction()
{

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $data['is_trash'] = 'no';
        $update = updateTrash($id, $data);
    }

    return redirect_to("?mod=pages&action=trashcan");
}
