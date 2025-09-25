<style>

</style>
<?php
 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 ob_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["sendmail"]) && isset($_SESSION['giohang'])) {
    
 
    $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->CharSet  = "utf-8";
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'keerthudarshu06@gmail.com';   //SMTP write your email
    $mail->Password   = 'urdz ztjn ppzf agwn';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom('keerthudarshu06@gmail.com', 'deepus' );  // Sender Email and name
    $mail->addAddress($_POST["emaildat"], $_POST["tendat"]);     //Add a recipient email   // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = 'Thank you for shopping with us!';  // email subject headings
    $mail->AddEmbeddedImage("view/layout/assets/images/Deepu's.png", 'logo', "Deepu's.png");
    $i=0;
    $tongtien=0;
    $html_donhang='';
    foreach ($_SESSION['giohang'] as $item) {
        $i++;
        extract($item);
        $html_donhang.='<tr>
        <td>'.$i.'</td>
        <td>'.$name.'</td>
        <td>'.$size.'</td>
        <td>'.$color.'</td>
        <td>'.number_format($price,0,'.',',').'</td>
        <td>'.$soluong.'</td>
        <td>'.number_format($price*$soluong,0,'.',',').'</td>
    </tr>';
        $tongtien+=$price*$soluong;
    }
    if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
        $giamgia=$_SESSION['giamgia'];
        $html_donhang.='<tr>
        <td class="td-trong"></td>
        <td class="td-trong"></td>
        <td class="td-trong"></td>
        <td class="td-trong"></td>
        <td class="td-trong"></td>
        <td>Giảm giá</td>
        <td>'.number_format(($tongtien*$giamgia/100),0,'.',',').'</td>
    </tr>';
        $html_donhang.='<tr>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td>Tổng tiền</td>
            <td>'.number_format(($tongtien-$tongtien*$giamgia/100),0,'.',',').'</td>
        </tr>';
        unset($_SESSION['giamgia']);
    }else{
        $html_donhang.='<tr>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td class="td-trong"></td>
            <td>Tổng tiền</td>
            <td>'.number_format($tongtien,0,'.',',').'</td>
        </tr>';
        unset($_SESSION['giamgia']);
    }
    unset($_SESSION['id_voucher']);
    unset($_SESSION['giamgia']);
    unset($_SESSION['btngiamgia']);
    unset($_SESSION['magiamgia']);
    unset($_SESSION['giohang']);

    // $noidung = file_get_contents("form_thank.php");
    $text= '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/945522403a.js" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
    
            .container {
                max-width: 600px;
                margin: 0 auto;
            }
    
            .container>img{
                display: block;
                margin: 0 auto;
                color: black;
            }
    
            p {
                margin-bottom: 20px;
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }

            th{
                background-color: #46694F;
                color: #fff;
            }
            
    
            th, td {
                border: 1px solid #dddddd;
                text-align: center;
                padding: 8px;
            }
            .title{
                text-align:center;
                font-size:18px;
                color: #46694F; 
            }
            .td-trong{
                border:none;
            }

            .icon{
                margin: 10px 0;
                text-align: center;
            }

            .icon>i{
                padding: 3px;
                color: #46694F;
            }
    
        </style>
    </head>
    <body>deepus
        <div class="container-form">
        <img src="cid:logo" alt="ZStyle Logo" style="display: block; width: 150px; margin: 0 auto;">
        <hr>
        <h2 class="title">ORDER INFORMATION</h2> 
        <p class="thank">Thank you for visiting our store and placing an order here!</p>

                <table>
                    <thead>
                        <tr >
                            <th  colspan="8"><p style="font-size: 16px;text-align: center"><strong>Order ID:</strong> '.$_SESSION['donhang']['ma_donhang'].' </th>
                        </tr> 
                        
                    </thead>
                    
                    <tbody>
                        <td colspan="2" style="text-align:left"><strong>Date Of Establishment</strong></td>
                        <td colspan="6" style="text-align:left">'.$_SESSION['ngaylap'].'</td>
                      
                    </tbody>
                    <tbody>
                        <td colspan="2" style="text-align:left"><strong>Full Name</strong></td>
                        <td colspan="6" style="text-align:left">'.$_SESSION['name'].'</td>
                      
                    </tbody>
                    <tbody>
                        <td colspan="2" style="text-align:left"><strong>Email</strong></td>
                        <td colspan="6" style="text-align:left">'.$_SESSION['email'].'</td>
                    </tbody>
                    <tbody>
                        <td colspan="2" style="text-align:left"><strong>Phone Number</strong></td>
                        <td colspan="6" style="text-align:left">'.$_SESSION['sdt'].'</td>
                    </tbody>
                    <tbody>
                        <td colspan="2" style="text-align:left"><strong>Address</strong></td>
                        <td colspan="6" style="text-align:left">'.$_SESSION['diachi'].'</td>
                    </tbody>
                    '.(isset($account) ? $account : '').'

                    
                    
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
                We look forward to seeing you soon.
            <br>

            Best regards, <strong>Deepus</strong>
            <hr>

            <div class="icon">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-shopify"></i>
            </div>

            Deepus Shop <br>
            Website: https://zstyle.online/ <br>
            Địa chỉ: Tầng 12, tòa T, Công viên phần mềm Quang Trung <br>
            Email: keerthudarshu06@gmail.com <br>
            Hotline: 19006789 <br>
            </div>
    </body>
    </html>';
    $mail->Body=$text;//email message
    
    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     document.location.href = 'index.php?pg=account';
    </script>
    ";
} 
