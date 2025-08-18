<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/Exception.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'keerthudarshu06@gmail.com'; // Your Gmail address
    $mail->Password   = 'urdz ztjn ppzf agwn'; // Gmail App Password (not your Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('keerthudarshu06@gmail.com', 'Keerthudarshu');
    $mail->addAddress('keerthan20020907@gmail.com', 'keerthan'); // Add a recipient

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a <b>test email</b> sent using PHPMailer!';
    $mail->AltBody = 'This is a test email sent using PHPMailer!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
