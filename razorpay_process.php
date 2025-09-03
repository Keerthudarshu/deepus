<?php
session_start();
require_once 'model/connectdb.php';
require_once 'model/donhang.php';
require_once 'model/cart.php';
require_once 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['razorpay_payment_id'])) {
    $payment_id = $_POST['razorpay_payment_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $products = json_decode($_POST['products'], true);

    // ---- CREATE ORDER ----
    $iduser = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : 0;
    $ma_donhang = createma_donhang();
    $ngaylap = date('Y-m-d H:i:s');
    $trangthai = 'Paid';
    $tongtien = 0;
    foreach ($products as $item) {
        $tongtien += ((int)$item['price']) * ((int)$item['quantity']);
    }
    $tendat = $name;
    $tennhan = $name;
    $emaildat = $email;
    $emailnhan = $email;
    $sdtdat = $phone;
    $sdtnhan = $phone;
    $diachidat = $address;
    $diachinhan = $address;
    $ptthanhtoan = 'Razorpay';
    $giaohangnhanh = 0;
    $id_voucher = isset($_SESSION['id_voucher']) ? $_SESSION['id_voucher'] : null;

    creatdonhang(
        $iduser, $ma_donhang, $ngaylap, $trangthai, $tongtien,
        $tendat, $tennhan, $emaildat, $emailnhan,
        $sdtdat, $sdtnhan, $diachidat, $diachinhan,
        $ptthanhtoan, $giaohangnhanh, $id_voucher
    );

    // Only add to cart database if order was successfully created
    $id_donhang = getiddonhang();
    if ($id_donhang) {
        foreach ($products as $item) {
            $id_product = isset($item['id_product']) ? (int)$item['id_product'] : 0;
            $soluong    = (int)$item['quantity'];
            $price      = (int)$item['price'];
            $thanhtien  = $price * $soluong;

            $img = isset($item['img']) ? $item['img'] : '';
            $id_size  = getidsize($item['size']);
            $id_color = getidcolor($item['color']);
            $product_design     = isset($item['product_design']) ? $item['product_design'] : '';
            $id_product_design  = isset($item['id_product_design']) ? (int)$item['id_product_design'] : 0;

            add_cart(
                $iduser, $id_donhang, $id_product, $soluong,
                $price, $thanhtien, $img, $id_size, $id_color,
                $product_design, $id_product_design
            );
        }
    }

    // ✅ Clear session cart after successful payment
    unset($_SESSION['giohang']);
    unset($_SESSION['id_voucher']);

    // ---- SEND CONFIRMATION EMAIL ----
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'keerthudarshu06@gmail.com';
        $mail->Password = 'urdz ztjn ppzf agwn'; // ⚠️ Move this to a secure config
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('keerthudarshu06@gmail.com', 'Deepus');
        $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "Order Confirmation - $ma_donhang";
    $mail->AddEmbeddedImage('view/layout/assets/images/logo.jpg', 'logo', 'logo.jpg');

        // Build HTML invoice table
        $html_donhang = '';
        $i = 1;
        foreach ($products as $item) {
            $name_p = isset($item['title']) ? $item['title'] : '';
            $size = isset($item['size']) ? $item['size'] : '';
            $color = isset($item['color']) ? $item['color'] : '';
            $price = isset($item['price']) ? (float)$item['price'] : 0;
            $soluong = isset($item['quantity']) ? (int)$item['quantity'] : 1;
            $html_donhang .= '<tr>
                <td>'.$i.'</td>
                <td>'.$name_p.'</td>
                <td>'.$size.'</td>
                <td>'.$color.'</td>
                <td>'.number_format($price,0,'.',',').'</td>
                <td>'.$soluong.'</td>
                <td>'.number_format($price*$soluong,0,'.',',').'</td>
            </tr>';
            $i++;
        }
        $total = $tongtien;
        $giamgia = isset($_SESSION['giamgia']) ? $_SESSION['giamgia'] : 0;
        if($giamgia > 0){
            $html_donhang .= '<tr>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td>Giảm giá</td>
                <td>'.number_format(($total*$giamgia/100),0,'.',',').'</td>
            </tr>';
            $html_donhang .= '<tr>
                <td class="td-trong" colspan="5"></td>
                <td>Total amount</td>
                <td>'.number_format(($total-$total*$giamgia/100),0,'.',',').'</td>
            </tr>';
        }else{
            $html_donhang .= '<tr>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td class="td-trong"></td>
                <td><strong>Total amount</strong></td>
                <td>'.number_format($total,0,'.',',').'</td>
            </tr>';
        }

        $body = '<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .title{ text-align: center; color:  #46694F; }
                .thank{ text-align: center; }
                table { border-collapse: collapse; width: 100%; margin: 20px 0; }
                th{ background-color: #46694F; color: #fff; text-align: center; }
                tr{ text-align: center; }
                thead{ text-align: center; }
                th, td { border: 1px solid #dddddd; text-align:center; padding: 8px; }
                tbody>td{ text-align: left; }
            </style>
        </head>
        <body>deepus
            <div class="container-form">
            <img src="cid:logo" alt="Deepus Logo" style="display: block; width: 150px; margin: 0 auto;">
            <hr>
            <h2 class="title">ORDER INFORMATION</h2> 
            <p class="thank">Thank you for visiting our store and placing an order here!</p>
            <table>
                <thead>
                    <tr >
                        <th  colspan="8"><p style="font-size: 16px;text-align: center"><strong>Order ID:</strong> '.htmlspecialchars($ma_donhang).' </th>
                    </tr> 
                </thead>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Date Of Establishment</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($ngaylap).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Full Name</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($name).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Email</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($email).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Phone Number</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($phone).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Address</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($address).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Status</strong></td>
                    <td colspan="6" style="text-align:left">Paid</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Transaction ID</strong></td>
                    <td colspan="6" style="text-align:left">'.htmlspecialchars($payment_id).'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Payment Method</strong></td>
                    <td colspan="6" style="text-align:left">Razorpay</td>
                </tbody>
                <thead>
                    <tr>
                      <th>STT</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  '.$html_donhang.'
                </tbody>
            </table>
            We look forward to seeing you soon.<br>
            Best regards, <strong>Deepus</strong>
            <hr>
            <div class="icon">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-shopify"></i>
            </div>
deepus
            Deepus Shop <br>
            Website: https://zstyle.online/ <br>
            Địa chỉ: Tầng 12, tòa T, Công viên phần mềm Quang Trung <br>
            Email: keerthudarshu06@gmail.com <br>
            Hotline: 19006789 <br>
            </div>
        </body>
        </html>';
        $mail->Body = $body;

        $mail->send();
    } catch (Exception $e) {
        // You can log error to file
    }

    echo "success";
    exit;
}
?>
