<?php

get_header();


?>

<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="?mod=users&action=changePass" method="POST">
                <h3 class="text-center">ĐỔI MẬT KHẨU TÀI KHOẢN</h3>

                <div class="form-group">
                    <label for="password">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="password" name="currentPassword" value="<?php echo set_value("currentPass"); ?>" placeholder="Nhập mật khẩu cũ...">
                    <?php echo form_error('currentPassword'); ?>

                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu đặt lại</label>
                    <input type="password" class="form-control" id="password" name="newPassword" value="" placeholder="Nhập mật khẩu mới...">
                    <?php echo form_error('newPassword'); ?>

                </div>

                <div class="form-group">
                    <label for="password">Xác nhận mật khẩu đặt lại</label>
                    <input type="password" class="form-control" id="Confpassword" name="Confpassword" value="" placeholder="Nhập lại mật khẩu mới...">
                    <?php echo form_error('Confpassword'); ?>

                </div>

                <div class="text-center">
                    <input type="submit" name="send-resquest" class="btn btn-outline-primary" value="Cập nhật">
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php

get_footer();
?>