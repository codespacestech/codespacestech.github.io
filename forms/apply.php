<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendor//PHPMailer/src/Exception.php';
require 'assets/vendor/PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);

try {
    $mail->From = 'from@example.com';
    $mail->FromName = 'Website Applicant';
    $mail->addAddress('jeb.pair@codespacestech.com', 'Jeb');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional

    $mail->addAttachment('');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}