<?php
session_start();
ob_start();

// Debug logging - Remove this after testing
error_log("Forget Password Mailer accessed at " . date('Y-m-d H:i:s') . " with POST data: " . print_r($_POST, true));

// Include database functions from the main application
require_once '../model/connectdb.php';
require_once '../model/user.php';

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require '../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/PHPMailer-master/src/SMTP.php';

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
            // Check if email EXISTS in database
            $user_found = getusertoemail($_POST['emailxn']);
            if(!$user_found){
                $_SESSION['erremailxn']='*This email address is not registered';
            }
        }     
    }
    
    if($_SESSION['erremailxn']!=''){
        echo " 
        <script> 
        document.location.href = '../index.php?pg=forgetpass';
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
            $logo_path = '../view/layout/assets/images/Deepus.png';
            if(file_exists($logo_path)) {
                $mail->AddEmbeddedImage($logo_path, 'logo', 'Deepus.png');
            }
            
            $_SESSION['code']=creatcode();
            
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
            echo " 
            <script> 
             alert('Verification code sent successfully! Please check your email.');
             document.location.href = '../index.php?pg=forgetpass';
            </script>
            ";

        } catch (Exception $e) {
            $_SESSION['erremailxn'] = '*Failed to send email. Please try again later.';
            echo " 
            <script> 
             alert('Error sending email: " . addslashes($e->getMessage()) . "');
             document.location.href = '../index.php?pg=forgetpass';
            </script>
            ";
        }
    }
}
?>
