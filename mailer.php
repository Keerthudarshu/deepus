<style>

</style>
<?php
session_start();
ob_start();

// Debug logging - Remove this after testing
error_log("Mailer.php accessed at " . date('Y-m-d H:i:s') . " with POST data: " . print_r($_POST, true));

// Include database functions from the main application
require_once 'model/connectdb.php';
require_once 'model/user.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not insid            echo
            " 
            <script> 
            document.location.href = 'index?pg=forgetpass';
            </script>
            ";nction
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
    $mail->Username   = 'keerthudarshu06@gmail.com'; // Your Gmail address
    $mail->Password   = 'urdz ztjn ppzf agwn'; // Gmail App Password (not your Gmail password)
    $mail->SMTPSecure = 'tls'; // or 'ssl'
    $mail->Port = 587; // 465 if using ssl
    $mail->SMTPDebug  = 2; // Show SMTP debug output (set to 0 to disable)
    $mail->Debugoutput = 'html';


    //Recipients
    $mail->setFrom('keerthudarshu06@gmail.com', 'Deepus' );  // Sender Email and name
    $mail->addAddress($_POST["emaildat"], $_POST["tendat"]);     //Add a recipient email   // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = 'Thank you for shopping with us!';  // email subject headings
    $mail->AddEmbeddedImage('view/layout/assets/images/Deepu's.png', 'logo', 'Deepu's.png');
    $mail->AddEmbeddedImage('upload/form-thanks.jpg', 'img', 'form-thanks.jpg');
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
            <td class="td-trong" colspan="5"></td>
            <td>Total amount</td>
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
            <td><strong>Total amount</strong></td>
            <td>'.number_format($tongtien,0,'.',',').'</td>
        </tr>';
        unset($_SESSION['giamgia']);
    }

    $account='';
    if(isset($_SESSION['username']) && $_SESSION['username'] && isset($_SESSION['password']) && $_SESSION['password']){
        $account='<tbody>
                    <td colspan="2" style="text-align:left"><strong>Username</strong> </td>
                    <td colspan="6" style="text-align:left">'.$_SESSION['username'].'</td>
                </tbody>
                <tbody>
                    <td colspan="2" style="text-align:left"><strong>Password</strong> </td>
                    <td colspan="6" style="text-align:left"> '.$_SESSION['password'].'</td>
                </tbody>';
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
        <title>Document</title>
        <style>
            .title{
                text-align: center;
                color:  #46694F;
            }
    
            .thank{
                text-align: center;
            }
            table {
                border-collapse: collapse;
                width: 100%;
                margin: 20px 0;
            }
    
            th{
                background-color: #46694F;
                color: #fff;
                text-align: center;
            }
            tr{
                text-align: center;
            }
            thead{
                text-align: center;
            }
            
            
    
            th, td {
                border: 1px solid #dddddd;
                text-align:center;
                padding: 8px;
            }
            tbody>td{
                text-align: left;

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
                    '.$account.'

                    
                    
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
deepus
            Deepus Shop <br>
            Website: https://zstyle.online/ <br>
            Địa chỉ: Tầng 12, tòa T, Công viên phần mềm Quang Trung <br>
            Email: keerthudarshu06@gmail.com <br>
            Hotline: 19006789 <br>
            </div>
    </body>
    </html>';
    unset($_SESSION['donhang']);
    unset($_SESSION['name']);
    unset($_SESSION['sdt']);
    unset($_SESSION['diachi']);
    unset($_SESSION['email']);
    $mail->Body=$text;//email message
    
    // Success sent message alert
    try {
        $mail->send();
        echo "<script>document.location.href = 'index?pg=account';</script>";
    } catch (Exception $e) {
        echo '<div style="color:red;">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }

function creatcode() {
    $code='';
    $characters = '0123456789';
    for ($i = 0; $i < 4; $i++) {
      $code .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $code;
}

if (isset($_POST["guima"])) {
    $_SESSION['erremailxn']='';
    $_SESSION['emailxn']=$_POST["emailxn"];
    if($_POST['emailxn']==''){
        $_SESSION['erremailxn']='*You have not entered an email';
    }else{
        if(!filter_var($_POST['emailxn'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['erremailxn']="*Invalid email address";
        }else{
            // Check if email EXISTS in database (not if it doesn't exist)
            $user_found = getusertoemail($_POST['emailxn']);
            if(!$user_found){
                $_SESSION['erremailxn']='*This email address is not registered';
            }
        }     
    }
    if($_SESSION['erremailxn']!=''){
        echo
            " 
            <script> 
            document.location.href = 'index.php?pg=forgetpass';
            </script>
            ";
    }else{
        $mail = new PHPMailer(true);
 
        try {
            //Server settings
            $mail->isSMTP();                              //Send using SMTP
            $mail->CharSet  = "utf-8";
            $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;             //Enable SMTP authentication
            $mail->Username   = 'keerthudarshu06@gmail.com';   //SMTP write your email
            $mail->Password   = 'urdz ztjn ppzf agwn';      //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->SMTPDebug  = 0; // Set to 2 for debugging, 0 for production
            $mail->Debugoutput = 'html';

            //Recipients
            $mail->setFrom('keerthudarshu06@gmail.com', 'Deepus' );  // Sender Email and name
            $mail->addAddress($_POST["emailxn"]);     //Add a recipient email   // reply to sender email
            $_SESSION['emailxn']=$_POST["emailxn"];
            $_SESSION['username']=getusertoemail($_SESSION['emailxn'])['user'];
        
            //Content
            $mail->isHTML(true);               //Set email format to HTML
            $mail->Subject = 'Password Reset Code - Deepus';  // email subject headings
            
            // Check if image exists before adding
            $logo_path = 'view/layout/assets/images/Deepu\'s.png';
            if(file_exists($logo_path)) {
                $mail->AddEmbeddedImage($logo_path, 'logo', 'Deepu\'s.png');
            }
            
            $_SESSION['code']=creatcode();
            // $noidung = file_get_contents("form_thank.php");
            $text= '<html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Password Reset - Deepus</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 20px;
                        background-color: #f5f5f5;
                    }
            
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: white;
                        border-radius: 10px;
                        padding: 30px;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    }
            
                    .container>img{
                        display: block;
                        margin: 0 auto 20px auto;
                        width: 150px;
                    }
            
                    p {
                        text-align: center;
                        line-height: 1.6;
                        color: #333;
                    }
            
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }

                    th{
                        background-color: #46694F;
                        color: #fff;
                        padding: 12px;
                    }
                    
            
                    th, td {
                        border: 1px solid #46694F;
                        text-align: left;
                        padding: 12px;
                    }
                    .title{
                        text-align:center;
                        font-size:24px;
                        color: #46694F; 
                        margin-bottom: 10px;
                    }

                    #code{
                        width: 120px;
                        margin: 20px auto;
                        padding: 15px 25px;
                        border: 3px solid #46694F;
                        border-radius: 8px;
                        text-align: center;
                        font-weight: bold;
                        font-size: 32px;
                        color: #46694f;
                        background-color: #f8f9fa;
                    }
                    h2{
                        text-align: center;
                        color: #46694f;
                        margin-bottom: 20px;
                    }
                    td{
                        width:50%;
                    }
                    
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        padding-top: 20px;
                        border-top: 1px solid #eee;
                        color: #666;
                        font-size: 14px;
                    }
            
                </style>
            </head>
            <body>
                
                <div class="container">
                    '.($logo_path && file_exists($logo_path) ? '<img src="cid:logo" alt="Deepus Logo">' : '<h1 style="text-align:center; color:#46694F;">Deepus</h1>').'
                    <hr style="border: 1px solid #46694F; margin: 20px 0;">
                    
                    <h2>Password Reset Request</h2>
                    <p>Hello! We received a request to reset your password. Please use the verification code below to proceed with your password reset.</p>
                    
                    <table>
                        <tbody>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>'.$_SESSION['emailxn'].'</td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>'.$_SESSION['username'].'</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <p><strong>Your verification code is:</strong></p>
                    <div id="code">
                        '.$_SESSION['code'].'
                    </div>
                    
                    <p style="color: #666; font-size: 14px;">
                        This code will expire in 10 minutes. If you did not request a password reset, please ignore this email.
                    </p>

                    <div class="footer">
                        <strong>Best regards, Deepus Team</strong><br>
                        <hr style="margin: 15px 0;">
                        <strong>Deepus Shop</strong><br>
                        Website: https://deepus.com<br>
                        Email: keerthudarshu06@gmail.com<br>
                        Hotline: 19006789
                    </div>
                </div>
            </body>
            </html>';
            $_SESSION['codedung']=$_SESSION['code'];
            unset($_SESSION['code']);
            $mail->Body=$text;//email message
            
            // Success sent message alert
            $mail->send();
            echo
            " 
            <script> 
             alert('Verification code sent successfully! Please check your email.');
             document.location.href = 'index?pg=forgetpass';
            </script>
            ";

        } catch (Exception $e) {
            $_SESSION['erremailxn'] = '*Failed to send email. Please try again later.';
            echo
            " 
            <script> 
             alert('Error sending email: " . addslashes($e->getMessage()) . "');
             document.location.href = 'index?pg=forgetpass';
            </script>
            ";
        }

    }
    
}
    
}
