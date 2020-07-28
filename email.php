<?php

include "plugin/phpmailer/PHPMailer.php";
include "plugin/phpmailer/Exception.php";
include "plugin/phpmailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$input = $_POST;

$subject = ($input['type'] == 'inquiry' ? 'Inquiry' : 'Feedback');
$message = $input['message'];
$from_email = $input['email'];
$from_name = $input['name'];

//check if the email address is invalid $secure_check
$secure_check = sanitize_my_email($from_email);
if ($secure_check == false) {
    echo "Invalid input";
} else { //send email 
    send_mail($subject, $message, $from_email, $from_name);
}

function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function send_mail($subject, $message, $from_email, $from_name){
    $mail = new PHPMailer(true);
    $sender_email = 'feedback@fikomup.com';
    $sender_name = 'Inquiry/Feedback';
    $to_email = 'inquiry@fikomup.com';
    $to_name = 'Inquiry/Feedback';

    try {
        //Server settings
        $mail->SMTPDebug    = SMTP::DEBUG_OFF;               // Enable verbose debug output
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host         = 'srv92.niagahoster.com';          // Set the SMTP server to send through
        $mail->Username     = 'feedback@fikomup.com';           // SMTP username
        $mail->Password     = 'bidang03';                       // SMTP password
        $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port         = 587;                              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPAuth     = true;                             // authentication enabled

        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($to_email, $to_name);       // Add a recipient
        // $mail->addCC('cc@example.com');                          //Add CC

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;

        $from_message = "$from_email ($from_name) telah mengirimkan pesan <br><br>";
        $from_message .= $message;
        $mail->Body    = $from_message;
        $mail->AltBody = $from_message;

        $mail->send();
        echo "sent";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>