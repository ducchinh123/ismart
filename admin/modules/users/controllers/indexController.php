<?php

function construct()
{

    load_model('index');
}

function loginAction()
{
    // global $errors;
    global $errors, $username, $password;
    #1. Đặt cờ hiệu
    $errors = [];
    #2. Xủ lý và bắt lỗi

    if (isset($_POST['send-login'])) {



        if (empty($_POST['username'])) {

            $errors['username'] = "Không được để trống tên đăng nhập";
        } elseif (!is_username($_POST['username'])) {

            $errors['username'] = "Tên đăng nhập không đúng định dạng";
        } else {

            $username = $_POST['username'];
        }


        if (empty($_POST['password'])) {

            $errors['password'] = "Không được bỏ trống mật khẩu";
        } elseif (!is_password($_POST['password'])) {

            $errors['password'] = "Mật khẩu không đúng định dạng";
        } else {

            $password = md5($_POST['password']);
        }

        #3. Kết luận

        if (empty($errors)) {

            if (check_login($username, $password)) {

                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $username;
                redirect_to();
            } else {

                $errors['account'] = "Username hoặc Password không chính xác!";
            }
        }
    }

    load_view('index');
}



function logoutAction()
{
    return log_out();
}



function updateAction()
{

    // global $errors;
    global $errors, $fullname, $email_input, $phone_number, $address;
    #1. Đặt cờ hiệu
    $errors = [];

    if (isset($_POST['btn-submit'])) {

        // check fullname
        if (empty($_POST['fullname'])) {

            $errors['fullname'] = "Không được bỏ trống tên hiển thị";
        } else {

            $fullname = $_POST['fullname'];
        }

        // check phone number

        if (empty($_POST['phone_number'])) {

            $errors['phone_number'] = "Không được để trống số điện thoại";
        } elseif (!is_phone($_POST['phone_number'])) {

            $errors['phone_number'] = "SĐT không đúng định dạng";
        } else {

            $phone_number = $_POST['phone_number'];
        }

        // check address
        if (empty($_POST['address'])) {

            $errors['address'] = "Không được bỏ trống địa chỉ";
        } else {

            $address = $_POST['address'];
        }

        if (empty($errors)) {

            $data = [
                'fullname' => $fullname,
                'phone_number' => $phone_number,
                'address' => $address
            ];

            update_user_login(user_login(), $data);
        }
    }

    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('update', $data);
}


function changePassAction()
{

    global $errors, $currentPass, $newPass, $confirmPass;
    $errors = [];

    if (isset($_POST['send-resquest'])) {

        // check field pass current

        if (empty($_POST['currentPassword'])) {
            $errors['currentPassword'] = "Không được để trống mật khẩu cũ";
        } elseif (!check_password(md5($_POST['currentPassword']))) {
            $errors['currentPassword'] = "Mật khẩu cũ không chính xác. Kiểm tra lại!";
        } else {

            $currentPass = $_POST['currentPassword'];
        }
        // check field pass new
        if (empty($_POST['newPassword'])) {
            $errors['newPassword'] = "Không được để trống mật khẩu mới";
        } elseif (!is_password($_POST['newPassword'])) {

            $errors['newPassword'] = "Mật khẩu đặt lại không đúng định dạng";
        } else {

            $newPass = md5($_POST['newPassword']);
        }

        // check filed pass confirm
        if (empty($_POST['Confpassword'])) {
            $errors['Confpassword'] = "Không được để trống mật khẩu nhập lại";
        } elseif (md5($_POST['Confpassword']) != $newPass) {

            $errors['Confpassword'] = "Mật khẩu đặt lại không khớp mật khẩu mới";
        } else {

            $confirmPass = $_POST['Confpassword'];
        }

        if (empty($errors)) {

            $data = [
                'password' => $newPass
            ];
            update_user_login(user_login(), $data);
        }
    }

    load_view('changepass');
}
