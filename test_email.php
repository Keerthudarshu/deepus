<?php
session_start();

// Include database functions
require_once 'model/connectdb.php';
require_once 'model/user.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

if (isset($_POST['test_email'])) {
    $test_email = $_POST['email'];
    
    if (empty($test_email) || !filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
        echo "<div style='color:red;'>Please enter a valid email address.</div>";
    } else {
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'keerthudarshu06@gmail.com';
            $mail->Password = 'urdz ztjn ppzf agwn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->Debugoutput = 'html';

            //Recipients
            $mail->setFrom('keerthudarshu06@gmail.com', 'Deepus Test');
            $mail->addAddress($test_email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Test Email from Deepus';
            $mail->Body = '<h2>Test Email</h2><p>This is a test email to verify SMTP configuration is working.</p>';

            $mail->send();
            echo "<div style='color:green; padding:10px; background:#e8f5e8; border:1px solid green; margin:10px 0;'>Test email sent successfully to: " . $test_email . "</div>";
            
        } catch (Exception $e) {
            echo "<div style='color:red; padding:10px; background:#fee; border:1px solid red; margin:10px 0;'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
            echo "<div style='color:red;'>Exception: " . $e->getMessage() . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Test - Deepus</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin: 15px 0; }
        input[type="email"] { padding: 10px; width: 300px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #46694F; color: white; border: none; cursor: pointer; }
        button:hover { background: #355a40; }
        .info { background: #e8f4fd; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Email Configuration Test - Deepus</h1>
    
    <div class="info">
        <strong>Purpose:</strong> This page tests the email configuration to ensure the forget password functionality can send emails properly.
    </div>
    
    <form method="post">
        <div class="form-group">
            <label for="email">Test Email Address:</label><br>
            <input type="email" name="email" id="email" placeholder="Enter your email to test" required>
        </div>
        <div class="form-group">
            <button type="submit" name="test_email">Send Test Email</button>
        </div>
    </form>
    
    <div class="info">
        <h3>Current SMTP Configuration:</h3>
        <ul>
            <li><strong>SMTP Host:</strong> smtp.gmail.com</li>
            <li><strong>Port:</strong> 587</li>
            <li><strong>Encryption:</strong> STARTTLS</li>
            <li><strong>From Email:</strong> keerthudarshu06@gmail.com</li>
        </ul>
    </div>
    
    <a href="/deepus/index?pg=forgetpass" style="display:inline-block; margin-top:20px; padding:10px; background:#f0f0f0; text-decoration:none; color:#333;">← Back to Forget Password</a>
</body>
</html>