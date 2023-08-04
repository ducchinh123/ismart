<?php

function construct()
{

    load_model('index');
}

function indexAction()
{


    $data = [];

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }
    if (isset($_POST['btn-pay'])) {


        global $fullname, $email, $phone, $address, $payMethod, $errors;
        $errors = [];

        if (empty($_POST['fullname'])) {

            $errors['fullname'] = 'Không được bỏ trống họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }

        if (empty($_POST['email'])) {

            $errors['email'] = 'Không được bỏ trống email';
        } elseif (!is_email($_POST['email'])) {
            $errors['email'] = 'Email của bạn chưa đúng định dạng';
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['address'])) {

            $errors['address'] = 'Không được bỏ trống địa chỉ giao hàng';
        } else {
            $address = $_POST['address'];
        }


        if (empty($_POST['phone'])) {

            $errors['phone'] = 'Không được bỏ trống số điện thoại liên hệ';
        } elseif (!is_phone($_POST['phone'])) {
            $errors['phone'] = 'Số điện thoại của bạn chưa đúng định dạng';
        } else {
            $phone = $_POST['phone'];
        }

        if (empty($_POST['payment-method'])) {
            $errors['pay-method'] = 'Bạn cần lựa chọn phương thức thanh toán';
        } else {
            $payMethod = $_POST['payment-method'];

            if ($payMethod == 'direct-payment') {
                $pay = 'Thanh toán tại cửa hàng';
            } else {
                $pay = 'Thanh toán tại nhà';
            }
        }

        $note = $_POST['note'];


        if (empty($errors)) {

            $data = [
                'is_order' => true,
                'fullname' => $fullname,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'note' => $_POST['note'],
                'detail_order' => json_encode($_SESSION['cart']['buy']),
                'paymethod' => $payMethod,
                'st_order' => 'Chờ duyệt',
                'status' => 'Công khai',
                'num_order' => $_SESSION['cart']['info_cart']['num_order'],
                'total' => $_SESSION['cart']['info_cart']['total'],
                'code_order' => '#ISM' . time(),
                'create_at' => date('d-m-Y', time())

            ];



            $code_order = $data['code_order'];
            $create_at = date('H:i:s') . " | " . $data['create_at'];
            $st_order = $data['st_order'];
            $total = currency($_SESSION['cart']['info_cart']['total']);


            $content = "
            <table class='Bs nH iY bAt' cellpadding='0' role='presentation'><tr class='aTN'><td class='Bu'><div class='Bt' style='width: 1536px;'></div><div class='nH a98 iY'><div class='nH V8djrc byY' jsaction='JcCCed:.CLIENT'><div class='hj' jsaction='JIbuQc:.CLIENT'><div class='ade'><span class='hk J-J5-Ji' style='display: none;'><div id=':44' class='T-I J-J5-Ji T-I-JN L3' role='button' tabindex='0' data-tooltip='Thu gọn tất cả' aria-label='Thu gọn tất cả' style='user-select: none;'><span class='SD'><img class='gq T-I-J3' src='images/cleardot.gif' alt='Thu gọn tất cả'> </span></div></span><span class='hk J-J5-Ji' style='display: none;'><div id=':5a' class='T-I J-J5-Ji T-I-JN L3' role='button' tabindex='0' data-tooltip='Mở rộng tất cả' aria-label='Mở rộng tất cả' style='user-select: none;'><span class='SD'><img class='gx T-I-J3' src='images/cleardot.gif' alt='Mở rộng tất cả'> </span></div></span><span class='hk J-J5-Ji'><div id=':1w' class='T-I J-J5-Ji T-I-JN L3' role='button' tabindex='0' jslog='170698; u014N:cOuCgd,Kr2w4b;' aria-disabled='false' aria-label='In tất cả' data-tooltip='In tất cả' style='user-select: none;'><span class='SD'><img class='g1 T-I-J3' src='images/cleardot.gif' alt='In tất cả'> </span></div></span><span class='hk J-J5-Ji'><div id=':2n' class='T-I J-J5-Ji T-I-JN L3' role='button' tabindex='0' jslog='170693; u014N:cOuCgd,Kr2w4b;' aria-disabled='false' aria-label='Trong cửa sổ mới' data-tooltip='Trong cửa sổ mới' style='user-select: none;'><span class='SD'><img class='gZ T-I-J3' src='images/cleardot.gif' alt='Trong cửa sổ mới'> </span></div></span></div></div><div class='nH'><div jscontroller='anoPNd' jsaction='click:WB9jdf(uwgaE),V3JrLd(hTKvwd); keydown:EE1fDd(uwgaE),Luq7he(hTKvwd); focus:xfMayf(r4nke);' data-num-unread-messages='1' data-num-visible-messages='1'><div class='ha'><h2 jsname='r4nke' class='hP' tabindex='-1' data-thread-perm-id='thread-f:1773001162527223488' data-legacy-thread-id='189af729deca2ec0'>[ISMART_SHOP] Thông báo đặt hàng thành công</h2><span jsname='SjW3R' class='J-J5-Ji'><div class='ahR'><span data-is-tooltip-wrapper='true'><div jsname='uwgaE' class='hN' role='button' tabindex='0' name='^i' aria-label='Tìm kiếm tất cả thư có nhãn Hộp thư đến' style='--cv-colored-label-bg-color: #ddd; --cv-colored-label-text-color: #666' jscontroller='VmEkN' jsaction='click:h5M12e;clickmod:h5M12e; pointerdown:FEiYhc; pointerup:mF5Elf; pointerenter:EX0mI; pointerleave:vpvbp; pointercancel:xyn4sd; contextmenu:xexox; focus:h06R8;mlnRJb:fLiPzd;' data-tooltip-id='EZCsidc94' data-tooltip-classes='wYeeg'>Hộp thư đến</div><div class='anh-ql-ani' id='EZCsidc94' role='tooltip' aria-hidden='true'>Tìm kiếm tất cả thư có nhãn Hộp thư đến</div></span><span class='wYeeg' data-is-tooltip-wrapper='true'><div jsname='hTKvwd' class='hO' role='button' tabindex='0' name='^i' aria-label='Xóa nhãn Hộp thư đến khỏi cuộc trò chuyện này' data='Hộp%20thư%20đến' style='--cv-colored-label-bg-color: #ddd; --cv-colored-label-text-color: #666' jscontroller='VmEkN' jsaction='click:h5M12e;clickmod:h5M12e; pointerdown:FEiYhc; pointerup:mF5Elf; pointerenter:EX0mI; pointerleave:vpvbp; pointercancel:xyn4sd; contextmenu:xexox; focus:h06R8;mlnRJb:fLiPzd;' data-tooltip-id='uWodYcc95' data-tooltip-classes='wYeeg'></div><div class='anh-ql-ani' id='uWodYcc95' role='tooltip' aria-hidden='true'>Xóa nhãn Hộp thư đến khỏi cuộc trò chuyện này</div></span></div></span></div><div class='dJ'></div></div></div></div><div class='nH aHU'><div class='nH hx'><div class='nH'><div tabindex='-1' role='menu' class='b7 J-M' aria-haspopup='true' jslog='181413; u014N:xr6bB' style='user-select: none; display: none;'></div></div><div class='nH'></div><div class='nH' jslog='20686; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d' role='list'><div class='h7 ie nH oy8Mbf' role='listitem' aria-expanded='true' tabindex='-1'><div class='Bk'><div class='G3 G2'><div><div id=':sq'><div class='adn ads' style='display:' data-message-id='#msg-f:1773001162527223488' data-legacy-message-id='189af729deca2ec0'><div class='aju'><div class='aCi'><div class='aFg' style='display: none;'></div><img id='undefined' name='undefined' src='//ssl.gstatic.com/ui/v1/icons/mail/profile_mask2.png' class='ajn ajo' style='background-color: #cccccc' jid='nxt160602@gmail.com' data-hovercard-id='nxt160602@gmail.com' data-name='Ismart Shop' aria-hidden='true'></div></div><div class='gs'><div class='gE iv gt'><table cellpadding='0' class='cf gJ'><tbody><tr class='acZ'><td class='gF gK'><table cellpadding='0' class='cf ix'><tbody><tr><td class='c2'><h3 class='iw'><span translate='no' class='qu' role='gridcell' tabindex='-1'><span email='nxt160602@gmail.com' name='Ismart Shop' data-hovercard-id='nxt160602@gmail.com' class='gD'><span>Ismart Shop</span></span> <span class='cfXrwd'></span><span class='go'><span aria-hidden='true'>&lt;</span>nxt160602@gmail.com<span aria-hidden='true'>&gt;</span></span> </span></h3></td></tr></tbody></table></td><td class='gH bAk'><div class='gK'><span></span><span id=':5x' class='g3' title='11:54 1 thg 8, 2023' alt='11:54 1 thg 8, 2023' role='gridcell' tabindex='-1'>11:54 (0 phút trước)</span><div class='zd bi4' aria-label='Không gắn dấu sao' tabindex='0' role='checkbox' aria-checked='false' style='outline:0' jslog='20511; u014N:cOuCgd,Kr2w4b; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxbXV0.' data-tooltip='Không gắn dấu sao'><span class='T-KT'><img class='f T-KT-JX' src='images/cleardot.gif' alt=''></span></div></div></td><td class='gH'></td><td class='gH acX bAm' rowspan='2'><div class='T-I J-J5-Ji T-I-Js-IF aaq T-I-ax7 L3' role='button' tabindex='0' jslog='21576; u014N:cOuCgd,Kr2w4b; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxbXSxudWxsLDEsMF0.' data-tooltip='Trả lời' aria-label='Trả lời' style='user-select: none;'><img class='hB T-I-J3 ' role='button' src='images/cleardot.gif' alt=''></div><div id=':uh' class='T-I J-J5-Ji T-I-Js-Gs aap T-I-awG T-I-ax7 L3' role='button' tabindex='0' aria-expanded='false' aria-haspopup='true' data-tooltip='Khác' aria-label='Khác' style='user-select: none;'><img class='hA T-I-J3' role='menu' src='images/cleardot.gif' alt=''></div></td></tr><tr class='acZ xD'><td colspan='3'><table cellpadding='0' class='cf adz'><tbody><tr><td class='ady'><div class='iw ajw'><span translate='no' class='hb'>đến <span email='chinhdd.ph28756@gmail.com' name='tôi' data-hovercard-id='chinhdd.ph28756@gmail.com' class='g2'>tôi</span> </span></div><div id=':tq' aria-haspopup='true' class='ajy' role='button' tabindex='0' data-tooltip='Hiển thị chi tiết' aria-label='Hiển thị chi tiết'><img class='ajz' src='images/cleardot.gif' alt=''></div></td></tr></tbody></table></td></tr></tbody></table></div><div id=':tp'><div class='qQVYZb'></div><div class='utdU2e'></div><div class='lQs8Hd' jsaction='SN3rtf:rcuQ6b' jscontroller='i3Ohde'></div><div class='btm'></div></div><div class=''><div class='aHl'></div><div id=':tr' tabindex='-1'></div><div id=':tn' class='ii gt' jslog='20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxbXV0.'><div id=':to' class='a3s aiL '><div style='margin:0;padding:0;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#444;line-height:18px'><div class='adM'>
    </div><div class='adM'>
    </div><div class='adM'>
    </div><div style='width:1170px;height:auto;padding:15px;margin:0px auto;background-color:#f2f2f2'><div class='adM'>
        </div><div class='adM'>
        </div><div class='adM'>
        </div><div><div class='adM'>
            </div><div class='adM'>
            </div><div class='adM'>
            </div><div><div class='adM'>
                </div><div class='adM'>
                </div><div class='adM'>
                </div><h1 style='font-size:19px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0'>Chào
                    $fullname. Đơn <span>hàng</span> của bạn đã <span>đặt</span>
                    <span>thành</span> <span>công</span>!
                </h1>
                <p style='margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#444;line-height:18px;font-weight:normal'>
                    Chúng tôi đang chuẩn bị <span>hàng</span> để bàn giao cho đơn vị vận chuyển</p>
                <h3 style='font-size:15px;font-weight:bold;color:#004cffd9;text-transform:uppercase;margin:12px 0 0 0;border-bottom:1px solid #ddd'>
                    MÃ ĐƠN <span>HÀNG</span>: $code_order<b></b> <br>
                    <span>NGÀY <span>ĐẶT</span>: $create_at </span>
                </h3>
            </div>
            <div>


                <table style='margin:20px 0px;width:100%;border-collapse:collapse;border-spacing:2px;background:#f5f5f5;display:table;box-sizing:border-box;border:0;border-color:grey'>
                    <thead style='background:#F12A43'>
                        <tr>
                            <th style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:20px'>
                                <strong>Tên khách <span>hàng</span></strong>
                            </th>
                            <th style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:20px'>
                                <strong>Email</strong>
                            </th>
                            <th style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:20px'>
                                <strong>SĐT</strong>
                            </th>
                            <th style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:20px'>
                                <strong>Địa chỉ giao <span>hàng</span></strong>
                            </th>
                            <th style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:20px'>
                                <strong>Trạng thái đơn <span>hàng</span></strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style='border-bottom:1px solid #e1dcdc;font-size:14px;margin-top:10px;line-height:30px'>
                            <td style='padding:3px 9px'><strong>$fullname</strong></td>
                            <td style='padding:3px 9px'><strong><a href='mailto:$email' target='_blank'>$email</a></strong></td>
                            <td style='padding:3px 9px'><strong>$phone</strong></td>
                            <td style='padding:3px 9px'><strong>$address</strong></td>
                            <td style='padding:3px 9px'><strong><span style='color:#00890099'><span>$st_order</span></span></strong></td>
                        </tr>
                    </tbody>
                </table>
                                    <table style='margin:20px 0px;width:100%;border-collapse:collapse;border-spacing:2px;background:#f5f5f5;display:table;box-sizing:border-box;border:0;border-color:grey'>
                        <thead style='background:#F12A43'>
                            <tr>
                                <td style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong>Ảnh</strong>
                                </td>
                                <td style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong>Tên sản phẩm</strong>
                                </td>
                                <td style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong>Giá</strong>
                                </td>
                                <td style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong>Số lượng</strong>
                                </td>
                                <td style='text-align:left;padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong><span>Thành</span> tiền</strong>
                                </td>
                            </tr>
                        </thead>
                        <tbody>";
            $i = 0;
            foreach ($_SESSION['cart']['buy'] as $item) {
                $i++;
                $img = $item['thumb'];
                $name = $item['name'];
                $price = currency($item['price']);
                $num_order = $item['qty'];
                $sub_total = currency($item['sub_total']);




                $content .= "<tr style='border-bottom:1px solid #e1dcdc'>
                                    <td style='padding:4px'><img style='display:block;width:55px;height:70px;object-fit:cover' src='admin/$img' class='CToWUd' data-bit='iit'>
                                        <div dir='ltr' style='opacity:0.01'>
                                            <div id='m_2253879705974836948:260' title='Tải xuống' role='button' aria-label='Tải xuống tệp đính kèm '>
                                                <div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style='padding:3px 9px;vertical-align:middle'>
                                        <strong>$name</strong></td>
                                    <td style='padding:3px 9px;vertical-align:middle'><strong>$price</strong></td>
                                    <td style='padding:3px 9px;vertical-align:middle'><strong>$num_order</strong></td>
                                    <td style='padding:3px 9px;vertical-align:middle'><strong>$sub_total</strong></td>
                                </tr>";
            }

            $content .= "<tr style='height:12px;line-height:26px;font-size:14px; background: #F12A43;'>
                                <td colspan='4' style='text-align:left;padding:6px 9px;margin-top:30px;color:rgb(255,255,255);text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:14px'>
                                    <strong>Tổng đơn <span>hàng</span>: </strong>
                                </td>
                                <td colspan='1' style='text-align:left;padding:6px 9px;color:rgb(255,255,255)'>
                                    <strong>$total</strong>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                                <div>
                    <p>Quý khách vui lòng giữ lại hóa đơn, hộp sản phẩm và phiếu bảo hành (nếu có) để đổi trả <span>hàng</span> hoặc bảo hành khi cần thiết.</p>
                    <p>Liên hệ Hotline <strong style='color:#099202'>0374.993.702</strong> (8-21h cả T7,CN).</p>
            
                    <div style='height:auto'>
                        <p>
                            Quý khách nhận được email này vì đã dùng email này <span>đặt</span> <span>hàng</span> tại cửa <span>hàng</span> trực tuyến I8mart.
                            <br><br>
                            Nếu không phải quý khách <span>đặt</span> <span>hàng</span>
                            vui lòng liên hệ số điện thoại 0888525597 để hủy đơn <span>hàng</span>
                        </p>
                    </div>
                    <p><strong>ISmart cảm ơn quý khách đã <span>đặt</span> <span>hàng</span>, chúng tôi sẽ không ngừng nổ lực để phục vụ quý khách tốt
                    hơn!</strong></p><div class='yj6qo'></div><div class='adL'>
                </div></div><div class='adL'>
              
            </div></div><div class='adL'>
        </div></div><div class='adL'>
    </div></div><div class='adL'>
</div></div><div class='adL'>


</div></div></div><div id=':uj' class='ii gt' style='display:none'><div id=':uk' class='a3s aiL '></div></div><div class='hi'></div></div></div><div class='ajx'></div></div><div class='gA gt acV'><div class='gB xu' jslog='184332; u014N:xr6bB;'><table id=':sy' cellpadding='0' role='presentation' class='cf gz ac0'><tbody><tr><td><div class='cKWzSc mD' idlink='' tabindex='0' role='button' jslog='21576; u014N:cOuCgd,Kr2w4b;'><img class='mL' src='images/cleardot.gif' alt=''> <span class='mG'>Trả lời</span></div></td><td></td><td><div class='XymfBd mD' idlink='' tabindex='0' role='button' jslog='21578; u014N:cOuCgd,Kr2w4b;'><img class='mI' src='images/cleardot.gif' alt=''> <span class='mG'>Chuyển tiếp</span></div></td><td></td><td class='io'><div class='adA'></div></td></tr></tbody></table><div class='ip iq'><div id=':tm'><table class='cf wS' role='presentation'><tbody><tr><td class='amq'><img id=':1k_97' name=':1k' src='https://lh3.googleusercontent.com/a/AAcHTtdUI56YbWSUIGkJDiYW_e6A2hqflOn0Jhw1TA1LZZe-=s40-p-mo' jid='chinhdd.ph28756@gmail.com' data-hovercard-id='chinhdd.ph28756@gmail.com' class='ajn bofPge'></td><td class='amr'><div class='nr wR'><div class='amn'><span id=':1s' role='link' tabindex='0' class='ams bkH' jslog='21576; u014N:cOuCgd,Kr2w4b; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxbXSxudWxsLDEsMF0.'>Trả lời</span><span id=':29' role='link' tabindex='0' class='ams bkG' jslog='21578; u014N:cOuCgd,Kr2w4b; 1:WyIjdGhyZWFkLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3MzAwMTE2MjUyNzIyMzQ4OCIsbnVsbCxbXSxudWxsLDEsMF0.'>Chuyển tiếp</span></div></div><input type='text' class='amp'></td></tr></tbody></table></div></div></div></div></div></div></div></div></div></div><div class='nH'></div><div class='nH'></div></div></div><div class='nH'><div class='l2' style='padding-bottom: 0px;'></div></div></div></td></tr></table>";

            if (send_email($email, $fullname, '[Ismart] Thư xác nhận đặt hàng thành công', $content)) {
                addOrder($data);
                $_SESSION['checkout']['info_customer'] = [

                    'fullname' => $fullname,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address,
                    'paymethod' => $payMethod == 'direct-payment' ? 'Thanh toán tại cửa hàng' : 'Thanh toán tại nhà',
                    'note' => $_POST['note']
                ];


                $_SESSION['checkout']['info_product'] = json_encode($_SESSION['cart']);


                $checkout['infocus_checkout'] = $_SESSION['checkout']['info_customer'];
                $checkout['infoprod_checkout'] = $_SESSION['checkout']['info_product'];
                $checkout['code_order'] = '#ISM' . time();
                $checkout['is_order'] = true;
                unset($_SESSION['cart']);

                return load_view('success', $checkout);
            }
        }
    }




    load_view('index', $data);
}


function payNowAction()
{

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id = $_GET['id'];
        $info_prod = get_info_prod($id);
        $url = 'san-pham/' . $info_prod['slug'] . '.' . $info_prod['id'] . '.' . $info_prod['id_cate_prod'] . '.html';
        // Kiểm tra xem đã có sản phẩm này trong giỏ hàng hay chưa?
        /*
        1. Nếu có thì cập nhật số lượng,...
        2. Không có thì thêm vào
    */

        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        } else {
            $qty = 1;
        }

        // Tiến hành thêm

        $_SESSION['cart']['buy'][$id] = [
            'id'  => $info_prod['id'],
            'code' => $info_prod['code'],
            'price' => $info_prod['price_new'],
            'thumb' => $info_prod['main_img'],
            'name' => $info_prod['name'],
            'qty' => $qty,
            'sub_total' => $info_prod['price_new'] * $qty,
            'url' => $url

        ];

        // gọi info_cart để cập nhật sau mỗi lần thêm
        info_cart();
    }

    // Phục vụ cho việc hiển thị các trang

    $list_page = get_list_page();

    if (!empty($list_page)) {

        $data['list_page'] = $list_page;
    }

    load_view('index');
}



function info_cart()
{

    $num_order = 0;
    $total = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) {

        foreach ($_SESSION['cart']['buy'] as $cart) {

            $num_order += $cart['qty'];
            $total += $cart['sub_total'];
        }
    }

    $_SESSION['cart']['info_cart'] = [
        'num_order' => $num_order,
        'total' => $total
    ];
}


function successAction()
{

    load_view('success');
}
