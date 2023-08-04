<?php

function construct()
{

    load_model('index');
}

function listAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalImage();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=thumb-products&action=list";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_image = get_data("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id", $start, $num_per_page, "tbl_image_product.is_trash = 'no' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
    $data['list_image'] = $list_image;
    $data['count_'] = count($list_image);
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
            return redirect_to("?mod=thumb-products&action={$action}");
        }
    }
    load_view('list', $data);
}
function publicAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;

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
    $data['page_'] = $page;
    $data['url'] = "?mod=thumb-products&action=public";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_image = get_data("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id", $start, $num_per_page, "tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Công khai' AND tbl_image_product.is_trash = 'no'");
    $data['list_image'] = $list_image;
    $data['count_'] = count($list_image);
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
            return redirect_to("?mod=thumb-products&action={$action}");
        }
    }
    load_view('list', $data);
}
function privateAction()
{

    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;

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
    $data['page_'] = $page;
    $data['url'] = "?mod=thumb-products&action=private";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_image = get_data("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
     on tbl_image_product.product_id = tbl_products.id", $start, $num_per_page, "tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Chờ duyệt' AND tbl_image_product.is_trash = 'no'");
    $data['list_image'] = $list_image;
    $data['count_'] = count($list_image);
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
            return redirect_to("?mod=thumb-products&action={$action}");
        }
    }
    load_view('list', $data);
}

function addAction()
{

    global $errors, $parent_id, $status, $file_path1, $file_path2, $file_path3, $file_path4, $file_path5, $file_path6;
    $errors = [];

    if (isset($_POST['btn-submit'])) {



        // ảnh đại diện 1

        $upload_dir = "./public/images/products/image_detail/";
        $file_path1 = $upload_dir . basename($_FILES['thumb1']['name']);
        $file_path2 = $upload_dir . basename($_FILES['thumb2']['name']);
        $file_path3 = $upload_dir . basename($_FILES['thumb3']['name']);
        $file_path4 = $upload_dir . basename($_FILES['thumb4']['name']);
        $file_path5 = $upload_dir . basename($_FILES['thumb5']['name']);
        $file_path6 = $upload_dir . basename($_FILES['thumb6']['name']);
        $types_file = ["jpg", "jpeg", "png", "gif"];

        if (!in_array(pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb1']['name'])) {

            $errors['image1'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb1']['size'] > 20000000) {

                $errors['image1'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path1)) {

                $new_file_name = pathinfo($_FILES['thumb1']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb1']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION);
                }

                $file_path1 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 2

        if (!in_array(pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb2']['name'])) {

            $errors['image2'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb2']['size'] > 20000000) {

                $errors['image2'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path2)) {

                $new_file_name = pathinfo($_FILES['thumb2']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb2']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION);
                }

                $file_path2 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 3


        if (!in_array(pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb3']['name'])) {

            $errors['image3'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb3']['size'] > 20000000) {

                $errors['image3'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path3)) {

                $new_file_name = pathinfo($_FILES['thumb3']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb3']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION);
                }

                $file_path3 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // // ảnh đại diện 4

        if (!in_array(pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb4']['name'])) {

            $errors['image4'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb4']['size'] > 20000000) {

                $errors['image4'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path4)) {

                $new_file_name = pathinfo($_FILES['thumb4']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb4']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION);
                }

                $file_path4 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // // ảnh đại diện 5
        if (!in_array(pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb5']['name'])) {

            $errors['image5'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb5']['size'] > 20000000) {

                $errors['image5'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path5)) {

                $new_file_name = pathinfo($_FILES['thumb5']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb5']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION);
                }

                $file_path5 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 6


        if (!in_array(pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb6']['name'])) {

            $errors['image6'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb6']['size'] > 20000000) {

                $errors['image6'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path6)) {

                $new_file_name = pathinfo($_FILES['thumb6']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb6']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION);
                }

                $file_path6 = $new_file_path;
            }
        }
        // end ảnh đại diện

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái sản phẩm";
        } else {

            $status = $_POST['status'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục sản phẩm";
        } else {

            $parent_id = $_POST['parent-Cat'];
        }


        if (empty($errors)) {

            if (
                $file_path1 == "./public/images/products/image_detail/-Copy." && $file_path2 == "./public/images/products/image_detail/-Copy." && $file_path3 == "./public/images/products/image_detail/-Copy." &&
                $file_path4 == "./public/images/products/image_detail/-Copy." &&  $file_path5 == "./public/images/products/image_detail/-Copy." &&  $file_path6 == "./public/images/products/image_detail/-Copy."
            ) {



                $data = [
                    'img_one' => "./public/images/img-product.png",
                    'img_two' => "./public/images/img-product.png",
                    'img_three' => "./public/images/img-product.png",
                    'img_four' => "./public/images/img-product.png",
                    'img_five' => "./public/images/img-product.png",
                    'img_six' => "./public/images/img-product.png",
                    'product_id' => $parent_id,
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            } else {


                move_uploaded_file($_FILES['thumb1']['tmp_name'], $file_path1);
                move_uploaded_file($_FILES['thumb2']['tmp_name'], $file_path2);
                move_uploaded_file($_FILES['thumb3']['tmp_name'], $file_path3);
                move_uploaded_file($_FILES['thumb4']['tmp_name'], $file_path4);
                move_uploaded_file($_FILES['thumb5']['tmp_name'], $file_path5);
                move_uploaded_file($_FILES['thumb6']['tmp_name'], $file_path6);
                $data = [
                    'img_one' => $file_path1,
                    'img_two' => $file_path2,
                    'img_three' => $file_path3,
                    'img_four' => $file_path4,
                    'img_five' => $file_path5,
                    'img_six' => $file_path6,
                    'product_id' => $parent_id,
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            }


            addImage($data);
        }
    }

    $list_product = get_all_product();
    $data['list_product'] = $list_product;



    load_view('add', $data);
}


function deleteAction()
{

    $id = $_GET['id'];
    $info_thumb = get_info_image($id);
    unlink($info_thumb['img_one']);
    unlink($info_thumb['img_two']);
    unlink($info_thumb['img_three']);
    unlink($info_thumb['img_four']);
    unlink($info_thumb['img_five']);
    unlink($info_thumb['img_six']);
    deleteImage($id);
    return redirect_to("?mod=thumb-products&action=indexTrash");
}

function editAction()
{

    global $errors, $parent_id, $status;
    $errors = [];

    if (isset($_POST['btn-submit'])) {



        // ảnh đại diện 1

        $upload_dir = "./public/images/products/image_detail/";
        $file_path1 = $upload_dir . basename($_FILES['thumb1']['name']);
        $file_path2 = $upload_dir . basename($_FILES['thumb2']['name']);
        $file_path3 = $upload_dir . basename($_FILES['thumb3']['name']);
        $file_path4 = $upload_dir . basename($_FILES['thumb4']['name']);
        $file_path5 = $upload_dir . basename($_FILES['thumb5']['name']);
        $file_path6 = $upload_dir . basename($_FILES['thumb6']['name']);
        $types_file = ["jpg", "jpeg", "png", "gif"];

        if (!in_array(pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb1']['name'])) {

            $errors['image1'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb1']['size'] > 20000000) {

                $errors['image1'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path1)) {

                $new_file_name = pathinfo($_FILES['thumb1']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb1']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb1']['name'], PATHINFO_EXTENSION);
                }

                $file_path1 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 2

        if (!in_array(pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb2']['name'])) {

            $errors['image2'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb2']['size'] > 20000000) {

                $errors['image2'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path2)) {

                $new_file_name = pathinfo($_FILES['thumb2']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb2']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb2']['name'], PATHINFO_EXTENSION);
                }

                $file_path2 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 3


        if (!in_array(pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb3']['name'])) {

            $errors['image3'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb3']['size'] > 20000000) {

                $errors['image3'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path3)) {

                $new_file_name = pathinfo($_FILES['thumb3']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb3']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb3']['name'], PATHINFO_EXTENSION);
                }

                $file_path3 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // // ảnh đại diện 4

        if (!in_array(pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb4']['name'])) {

            $errors['image4'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb4']['size'] > 20000000) {

                $errors['image4'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path4)) {

                $new_file_name = pathinfo($_FILES['thumb4']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb4']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb4']['name'], PATHINFO_EXTENSION);
                }

                $file_path4 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // // ảnh đại diện 5
        if (!in_array(pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb5']['name'])) {

            $errors['image5'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb5']['size'] > 20000000) {

                $errors['image5'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path5)) {

                $new_file_name = pathinfo($_FILES['thumb5']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb5']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb5']['name'], PATHINFO_EXTENSION);
                }

                $file_path5 = $new_file_path;
            }
        }
        // end ảnh đại diện
        // ảnh đại diện 6


        if (!in_array(pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION), $types_file) && !empty($_FILES['thumb6']['name'])) {

            $errors['image6'] = "Ảnh không đúng định dạng. Ví dụ .png, .jpeg, .jpg, .gif";
        } else {

            if ($_FILES['thumb6']['size'] > 20000000) {

                $errors['image6'] = "Không vượt quá 20MB";
            }

            if (file_exists($file_path6)) {

                $new_file_name = pathinfo($_FILES['thumb6']['name'], PATHINFO_FILENAME) . "-Copy.";
                $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION);
                $k = 1;

                while (file_exists($new_file_path)) {

                    $new_file_name =  pathinfo($_FILES['thumb6']['name'], PATHINFO_FILENAME) . "-Copy({$k}).";
                    $k++;
                    $new_file_path = $upload_dir . $new_file_name . pathinfo($_FILES['thumb6']['name'], PATHINFO_EXTENSION);
                }

                $file_path6 = $new_file_path;
            }
        }
        // end ảnh đại diện

        if (empty($_POST['status'])) {

            $errors['status'] = "Không được để trạng thái sản phẩm";
        } else {

            $status = $_POST['status'];
        }

        if (empty($_POST['parent-Cat'])) {

            $errors['parent-Cat'] = "Không được để trống danh mục sản phẩm";
        } else {

            $parent_id = $_POST['parent-Cat'];
        }


        if (empty($errors)) {



            if (
                $file_path1 == "./public/images/products/image_detail/-Copy." && $file_path2 == "./public/images/products/image_detail/-Copy." && $file_path3 == "./public/images/products/image_detail/-Copy." &&
                $file_path4 == "./public/images/products/image_detail/-Copy." &&  $file_path5 == "./public/images/products/image_detail/-Copy." &&  $file_path6 == "./public/images/products/image_detail/-Copy."
            ) {



                $id = $_GET['id'];
                $info_image = get_info_image($id);


                $data = [
                    'img_one' => $info_image['img_one'],
                    'img_two' => $info_image['img_two'],
                    'img_three' => $info_image['img_three'],
                    'img_four' => $info_image['img_four'],
                    'img_five' => $info_image['img_five'],
                    'img_six' => $info_image['img_six'],
                    'product_id' => $parent_id,
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            } else {

                $id = $_GET['id'];
                $info_image = get_info_image($id);

                if ($file_path1 == "./public/images/products/image_detail/-Copy.") {

                    $img_one = $info_image['img_one'];
                } else {
                    unlink($info_image['img_one']);
                    $img_one = $file_path1;
                }
                if ($file_path2 == "./public/images/products/image_detail/-Copy.") {

                    $img_two = $info_image['img_two'];
                } else {
                    unlink($info_image['img_two']);
                    $img_two = $file_path2;
                }

                if ($file_path3 == "./public/images/products/image_detail/-Copy.") {

                    $img_three = $info_image['img_three'];
                } else {
                    unlink($info_image['img_three']);
                    $img_three = $file_path3;
                }


                if ($file_path4 == "./public/images/products/image_detail/-Copy.") {

                    $img_four = $info_image['img_four'];
                } else {
                    unlink($info_image['img_four']);
                    $img_four = $file_path4;
                }


                if ($file_path5 == "./public/images/products/image_detail/-Copy.") {

                    $img_five = $info_image['img_five'];
                } else {
                    unlink($info_image['img_five']);
                    $img_five = $file_path5;
                }


                if ($file_path6 == "./public/images/products/image_detail/-Copy.") {

                    $img_six = $info_image['img_six'];
                } else {
                    unlink($info_image['img_six']);
                    $img_six = $file_path6;
                }





                move_uploaded_file($_FILES['thumb1']['tmp_name'], $img_one);
                move_uploaded_file($_FILES['thumb2']['tmp_name'], $img_two);
                move_uploaded_file($_FILES['thumb3']['tmp_name'], $img_three);
                move_uploaded_file($_FILES['thumb4']['tmp_name'], $img_four);
                move_uploaded_file($_FILES['thumb5']['tmp_name'], $img_five);
                move_uploaded_file($_FILES['thumb6']['tmp_name'], $img_six);
                $data = [
                    'img_one' => $img_one,
                    'img_two' => $img_two,
                    'img_three' => $img_three,
                    'img_four' => $img_four,
                    'img_five' => $img_five,
                    'img_six' => $img_six,
                    'product_id' => $parent_id,
                    'status' => $status,
                    'create_at' => date('Y-m-d', time())
                ];
            }


            updateImage($data, $_GET['id']);
        }
    }
    $id = $_GET['id'];
    $info_image = get_info_image($id);
    $data['info_image'] = $info_image;
    $list_product = get_all_product();
    $data['list_product'] = $list_product;
    load_view('update', $data);
}

// remove trash

function removeTrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'yes';
    removeTrash($id, $data);
    $list_image = get_all_images();
    $data['list_image'] = $list_image;
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;
    load_view('list', $data);
}


function updateImageTrashAction()
{

    $id = $_GET['id'];
    $data['is_trash'] = 'no';
    removeTrash($id, $data);
    $list_image = get_all_images_trash();
    $data['list_image'] = $list_image;
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;
    load_view('listTrash', $data);
}

// list

function indexTrashAction()
{


    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_image = totalImage();
    $total_trash = totalTrash();
    $data['total_trash'] = $total_trash;
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_image'] = $total_image;

    // Phân trang //
    $num_per_page = 3;
    $total_rows = totalTrash();

    //--> Tính số trang
    $num_page = ceil($total_rows / $num_per_page);
    //--> Trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //--> Chỉ mục bắt đầu lấy ra
    $start = ($page - 1) * $num_per_page;
    $data['num_page'] = $num_page;
    $data['page_'] = $page;
    $data['url'] = "?mod=thumb-products&action=indexTrash";
    $data['total_rows'] = $total_rows;
    ///=====================
    $list_image = get_data("SELECT tbl_image_product.id as image_id, tbl_image_product.img_one, 
    tbl_image_product.img_two, tbl_image_product.img_three, tbl_image_product.img_four, 
    tbl_image_product.img_five, tbl_image_product.img_six, tbl_image_product.product_id,
    tbl_image_product.creator, tbl_image_product.create_at, tbl_image_product.status,
    tbl_image_product.is_trash, tbl_products.name  FROM `tbl_image_product` INNER JOIN `tbl_products` on tbl_image_product.product_id = tbl_products.id", $start, $num_per_page, "tbl_image_product.is_trash = 'yes' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
    $data['list_image'] = $list_image;
    $data['count_'] = count($list_image);
    //=========

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
            return redirect_to("?mod=thumb-products&action={$action}");
        }
    }
    load_view('listTrash', $data);
}
