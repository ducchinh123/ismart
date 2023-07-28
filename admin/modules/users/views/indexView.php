<?php

get_header('login');

?>

<div id="wrapper">
    <form action="?mod=users&action=login" method="POST" id="form-login">
        <h1 class="form-heading">ĐĂNG NHẬP</h1>
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" class="form-input" id="username" placeholder="Tên đăng nhập" value="<?php echo set_value('username'); ?>">
        </div>
        <?php echo form_error('username'); ?>
        <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input type="password" name="password" class="form-input" id="password" placeholder="Mật khẩu">
            <div id="eyes">
                <i class="fa-solid fa-eye-slash"></i>

            </div>
        </div>
        <?php echo form_error('password'); ?>
        <input type="submit" class="form-submit" name="send-login" value="Đăng nhập">
    </form>
</div>

<?php

get_footer('login');
?>