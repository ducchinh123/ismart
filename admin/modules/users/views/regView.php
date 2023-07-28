<?php

get_header();


?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="?mod=users&controller=index&action=reg" method="POST">
            <h3 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h3>

            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo  set_value('fullname'); ?>">
                <?php echo form_error('fullname'); ?>
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('username'); ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email_input'); ?>">


                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" value="">
                <?php echo form_error('password'); ?>
            </div>

            <div class="form-group">
                <p class="text-center text-danger"><?php echo form_error('check_user'); ?></p>
            </div>

            <div class="form-group">
                <a href="login/dang-nhap-he-thong.html" class="mb-2">Đã có tài khoản? Đăng nhập</a>
            </div>

            <div class="text-center">
                <input type="submit" name="send-login" class="btn btn-outline-primary" value="Đăng ký">
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php

get_footer();
?>