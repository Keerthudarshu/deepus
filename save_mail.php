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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $products = json_decode($_POST['products'], true);

    // Store order in DB
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
    creatdonhang($iduser,$ma_donhang,$ngaylap,$trangthai,$tongtien,$tendat,$tennhan,$emaildat,$emailnhan,$sdtdat,$sdtnhan,$diachidat,$diachinhan,$ptthanhtoan,$giaohangnhanh,$id_voucher);
    $id_donhang = getiddonhang();
    // Add products to cart table
    foreach ($products as $item) {
        $id_product = 0; // If you have product IDs, use them here
        $soluong = (int)$item['quantity'];
        $price = (int)$item['price'];
        $thanhtien = $price * $soluong;
        $img = '';
        $id_size = getidsize($item['size']);
        $id_color = getidcolor($item['color']);
        $product_design = '';
        $id_product_design = 0;
        add_cart($iduser, $id_donhang, $id_product, $soluong, $price, $thanhtien, $img, $id_size, $id_color, $product_design, $id_product_design);
    }

    // Send Email (Online Transaction)
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->CharSet  = "utf-8";
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'keerthudarshu06@gmail.com';
    $mail->Password   = 'urdz ztjn ppzf agwn';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPDebug  = 0;
    $mail->Debugoutput = 'html';
    $mail->setFrom('keerthudarshu06@gmail.com', 'Deepus' );
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = "Order Confirmation - $ma_donhang (Online Payment)";
    $body = "<h2>Thank you for your online payment, $name!</h2>"
        . "<p><b>Payment ID:</b> $payment_id</p>"
        . "<p><b>Payment Method:</b> Razorpay</p>"
        . "<p><b>Address:</b> $address</p>"
        . "<h3>Order Summary:</h3><ul>";
    foreach ($products as $item) {
        $body .= "<li>{$item['title']} - {$item['color']} - {$item['size']} | Qty: {$item['quantity']} | Price: ₹{$item['price']}</li>";
    }
    $body .= "</ul>";
    $mail->Body = $body;
    try {
        $mail->send();
    } catch (Exception $e) {
        // Optionally log error
    }
    echo "success";
    exit;
}
?>
