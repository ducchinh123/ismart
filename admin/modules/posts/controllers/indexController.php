<?php

function construct()
{

    load_model('index');
}

function homeAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash = totalTrashPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalPost();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=posts&action=list";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_post = get_data("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id", $start, $num_per_page, "tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;

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
            return redirect_to("?mod=posts&action={$action}");
        }
    }

    load_view('list', $data);
}

function addAction()
{


    if (isset($_POST['btn-submit'])) {

        global $errors, $title, $desc_detail, $desc_short, $image, $cate_parent, $status;

        $errors = [];

        if (empty($_POST['title'])) {

            $errors['title'] = "Không được để trống tiêu đề";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['desc'])) {

            $errors['desc'] = "Không được để trống mô tả chi tiết";
        } else {
            $desc_detail = $_POST['desc'];
        }

        if (empty($_POST['desc_short'])) {

            $errors['desc_short'] = "Không được để trống mô tả ngắn";
        } else {
            $desc_short = $_POST['desc_short'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục bài viết";
        } else {

            $cate_parent = $_POST['parent-Cat'];
        }

        // ảnh đại diện

        $upload_dir = "./public/images/posts/";
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

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái bài viết";
        } else {

            $status = $_POST['status'];
        }



        if (empty($errors)) {



            if ($file_path == "./public/images/posts/-Copy.") {


                $data = [
                    'title' => $title,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'image' => "./public/images/img-thumb.png",
                    'id_cate_posts' => $cate_parent,
                    'status' => $status,
                    'slug' => create_slug($title),
                    'create_at' => date("Y-m-d", time())
                ];
            } else {

                $image = $file_path;

                move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);

                $data = [
                    'title' => $title,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'image' => $file_path,
                    'id_cate_posts' => $cate_parent,
                    'status' => $status,
                    'slug' => create_slug($title),
                    'create_at' => date("Y-m-d", time())
                ];
            }

            add_post($data);
        }
    }

    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('add', $data);
}

function listAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash = totalTrashPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalPost();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=posts&action=list";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_post = get_data("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id", $start, $num_per_page, "tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none' ORDER BY tbl_posts.id DESC");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;

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
            return redirect_to("?mod=posts&action={$action}");
        }
    }

    load_view('list', $data);
}


function deleteAction()
{

    $id = $_GET['id'];
    $url_path = get_info_post($id);
    unlink($url_path['image']);
    deletePost($id);
    return redirect_to("?mod=posts&action=list");
}
function deleteTrashPostAction()
{

    $id = $_GET['id'];
    $url_path = get_info_post($id);
    unlink($url_path['image']);
    deletePost($id);
    return redirect_to("?mod=posts&action=list_trash");
}

function editPostAction()
{
    if (isset($_POST['btn-submit'])) {

        global $errors, $title, $desc_detail, $desc_short, $image, $cate_parent, $status;

        $errors = [];

        if (empty($_POST['title'])) {

            $errors['title'] = "Không được để trống tiêu đề";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['desc'])) {

            $errors['desc'] = "Không được để trống mô tả chi tiết";
        } else {
            $desc_detail = $_POST['desc'];
        }

        if (empty($_POST['desc_short'])) {

            $errors['desc_short'] = "Không được để trống mô tả ngắn";
        } else {
            $desc_short = $_POST['desc_short'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục bài viết";
        } else {

            $cate_parent = $_POST['parent-Cat'];
        }

        // ảnh đại diện

        $upload_dir = "./public/images/posts/";
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

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái bài viết";
        } else {

            $status = $_POST['status'];
        }



        if (empty($errors)) {



            if ($file_path == "./public/images/posts/-Copy.") {

                $id = $_GET['id'];
                $info_post = get_info_post($id);

                $data = [
                    'title' => $title,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'image' => $info_post['image'],
                    'id_cate_posts' => $cate_parent,
                    'status' => $status,
                    'slug' => create_slug($title),
                    'create_at' => date("Y-m-d", time())
                ];
            } else {

                $id = $_GET['id'];
                $info_post = get_info_post($id);
                unlink($info_post['image']);

                move_uploaded_file($_FILES['thumb']['tmp_name'], $file_path);

                $data = [
                    'title' => $title,
                    'desc_short' => $desc_short,
                    'desc_detail' => $desc_detail,
                    'image' => $file_path,
                    'id_cate_posts' => $cate_parent,
                    'status' => $status,
                    'slug' => create_slug($title),
                    'create_at' => date("Y-m-d", time())
                ];
            }

            editPost($_GET['id'], $data);
        }
    }


    $id = $_GET['id'];
    $info_post = get_info_post($id);
    $data['info_post'] = $info_post;
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('update', $data);
}


function searchAction()
{


    if (isset($_POST['btn-submit'])) {

        if (!empty($_POST['s'])) {

            $title = $_POST['s'];
        } else {

            $title = "";
        }
        $list_post = get_list_post_by_title($title);
    }
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash = totalTrash();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;
    $data['list_post'] = $list_post;
    load_view('list', $data);
}

function publicAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash = totalTrashPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;



    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalPublic();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=posts&action=public";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_post = get_data("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id", $start, $num_per_page, "tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;
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
            return redirect_to("?mod=posts&action={$action}");
        }
    }
    load_view('public', $data);
}
function privateAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash = totalTrashPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalPrivate();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=posts&action=private";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_post = get_data("SELECT tbl_posts.*,
     tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id", $start, $num_per_page, "tbl_posts.status = 'Chờ duyệt' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;
    load_view('private', $data);
}

function catePostAction()
{
    $list_cate = get_all_cate();
    $data_tree = data_tree($list_cate, 0);
    $total_cate = total_cate();
    $total_istrash = totalTrash();
    $data['total_cate'] = $total_cate;
    $data['total_istrash'] = $total_istrash;
    // show_data($list_cate);
    // show_data($data_tree);
    $data['list_cate'] = $data_tree;
    load_view('cate', $data);
}

function cate_trashAction()
{
    $list_cate = get_all_trash();
    $total_cate = total_cate();
    $data['total_cate'] = $total_cate;
    $data['list_cate'] = $list_cate;
    $total_istrash = totalTrash();
    $data['total_istrash'] = $total_istrash;
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
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('add_cate', $data);
}

function deleteCateTrashAction()
{

    $id = $_GET['id'];
    delete_cate($id);
    deletePost_Cate($id);
    return redirect_to("?mod=posts&action=cate_trash");
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
    $data_tree = data_tree($list_cate, 0);
    $data['list_cate'] = $data_tree;
    load_view('updateCate', $data);
}


function deletetrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    $trash = updateTrash($id, $data);
    return redirect_to("?mod=posts&action=list");
}

function updateTrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    $trash = updateTrash_yes($id, $data);
    return redirect_to("?mod=posts&action=list_trash");
}

function list_trashAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $total_trash =  $total_trash = totalTrashPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    $data['total_trash'] = $total_trash;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalTrashPost();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;

    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['url'] = "?mod=posts&action=list_trash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_post = get_data("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id ", $start, $num_per_page, "tbl_posts.is_trash = 'yes' AND tbl_posts.display <> 'none'");
    $data['count_'] = count($list_post);
    $data['list_post'] = $list_post;

    // Xóa theo lựa chọn

    if (isset($_POST['sm_action'])) {

        if ($_POST['actions'] == "2" && !empty($_POST['checkItem'])) {
            $ids = [];
            foreach ($_POST['checkItem'] as $id => $val) {
                $ids[] = $id;
            }

            $ids = implode(",", $ids);

            deleteList($ids);
            return redirect_to("?mod=posts&action=list_trash");
        }
    }

    load_view('trash', $data);
}

// update cate trash

function updateCateTrash_yesAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    $trash = updateCate_yes($id, $data);
    $data_post['display'] = 'none';
    editPost_cate($id, $data_post);
    return redirect_to("?mod=posts&action=catePost");
}
function updateCateTrash_noAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    $trash = updateCateTrash_no($id, $data);
    $data_post['display'] = 'block';
    editPost_cate($id, $data_post);
    return redirect_to("?mod=posts&action=cate_trash");
}
