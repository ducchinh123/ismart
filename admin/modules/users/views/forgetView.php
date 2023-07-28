<?php

get_header();


?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="?mod=users&controller=index&action=forget" method="POST">
            <h3 class="text-center">QUÊN MẬT KHẨU</h3>

            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo  set_value('fullname'); ?>">
                <?php echo form_error('fullname'); ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email_input'); ?>">
                <?php echo form_error('email'); ?>
            </div>


            <div class="form-group">
                <p class="text-center text-danger"><?php echo form_error('account'); ?></p>
            </div>

            <div class="text-center">
                <input type="submit" name="send-code" class="btn btn-outline-primary" value="Gửi mã">
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php

get_footer();
?>