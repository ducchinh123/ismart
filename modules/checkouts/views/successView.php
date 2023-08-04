<?php
get_header();
?>

<style>
    #wrapper {
        max-width: 1024px;
        height: auto;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }

    #header {

        padding: 5px 5px;
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        background: none;

    }

    #header #logo {
        display: flex;
        width: 100%;
        display: flex;
        justify-content: center;

    }

    #header h4 {
        text-transform: uppercase;
        color: #F12A43;
        display: block;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    #wp-content {
        margin-top: 10px;


    }

    #wp-content #thanks {
        background-color: whitesmoke;
        padding: 5px 5px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    #wp-content #info {
        background-color: #7F54B3;
        padding-top: 5px;
        padding-bottom: 30px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        border-top-right-radius: 24px;

    }



    #info h4 {
        text-align: center;
        color: #FFFF;
        margin-bottom: 15px;
    }

    #info .box-info {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    #info .box-info table,
    th,
    td {
        border: 1px solid #FFFF;
    }

    #info .box-info table th,
    td {
        padding: 5px 10px;
        color: white;
    }

    #info .list_buy {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    #info .list_buy table,
    th,
    td {
        border: 1px solid #FFFF;
    }

    #info .list_buy table th,
    td {
        padding: 5px 10px;
        color: white;
    }

    table#info_prod tbody {
        background: none;
    }

    table#info_cus tbody {
        background: none;
    }

    table#info_cus thead tr th {
        text-align: center;
    }

    .btn-check {
        background-color: #F12A43;
    }

    table#info_prod img {
        border-radius: 5px;
    }

    table#info_prod tfoot span {
        border-radius: 5px;
    }


    #info {
        position: relative;
    }

    #stamp {
        position: absolute;
        top: 0;
        left: 0;
        border: 1.55px dotted #FFFFFF;
        border-radius: 3px;
    }

    #info span#newGift img {
        position: absolute;
        top: -15px;
        right: -13px;
        width: 9%;
        transform: rotate(-42deg);

    }
</style>

<?php
if (isset($is_order) && $is_order == '1') {
?>

    <div class="container mt-3">
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="https://www.easyhost.pk/images/success-icon.png" width="50" height="100" alt="">
                </div>
                <h4 class="text-center pt-2">Cảm ơn bạn đã đặt mua sản phẩm tại Ismart</h4>
            </div>

            <div id="wp-content">


                <div id="info">
                    <h4>Thông tin đơn hàng của bạn</h4>

                    <div class="container" id="info-popular">
                        <div class="row">

                            <div class="col-md-12">
                                <h6 class="text-white">#1. Thông khách hàng</h6>
                                <div class="box-info">
                                    <div class="table-responsive">
                                        <table class="table" id="info_cus">
                                            <thead>
                                                <tr>
                                                    <th>Họ tên</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Hình thức</th>
                                                    <th>Ghi chú</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $infocus_checkout['fullname']; ?></td>
                                                    <td><?php echo $infocus_checkout['email']; ?></td>
                                                    <td><?php echo $infocus_checkout['phone']; ?></td>
                                                    <td><?php echo $infocus_checkout['address']; ?></td>
                                                    <td><?php echo $infocus_checkout['paymethod']; ?></td>
                                                    <td><?php echo $infocus_checkout['note']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6 class="text-white">#2. Thông sản phẩm đặt mua</h6>
                                <div class="list_buy">
                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="info_prod">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $detail_order = json_decode($infoprod_checkout, true);
                                                $i = 0;
                                                foreach ($detail_order['buy'] as $order) {
                                                    $i++;  ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $order['name']; ?></td>
                                                        <td><img src="admin/<?php echo $order['thumb']; ?>" width="100" height="100" alt=""></td>
                                                        <td><?php echo $order['qty']; ?></td>
                                                        <td><?php echo currency($order['sub_total']); ?></td>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th>Tổng tiền: </th>
                                                    <th class="p-2"><span class="p-2 bg-success"><?php echo currency($detail_order['info_cart']['total']);  ?></span></th>
                                                </tr>

                                            </tfoot>
                                        </table>

                                    </div>

                                </div>
                                <i class="text-light">*/* Chúng tôi sẽ sớm xử lý đơn hàng của bạn. Mọi vấn đề thắc mắc xin hãy liên hệ bộ phận quản lý đơn qua số điện thoại: 0888525987</i>

                            </div>
                        </div>

                    </div>

                    <span class="p-2 text-white" id="stamp" style="background:#F12A43;">MĐH - <?php echo $code_order; ?></span>
                    <span id="newGift"><img src="public/images/new.png" alt=""></span>

                </div>

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="/" class="btn btn-danger">Về trang chủ</a>
                                <a href="https://mail.google.com/" class="btn btn-success">Kiểm tra email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

<?php
} else {
    return redirect_to('thanh-toan');
}

?>
<?php get_footer(); ?>