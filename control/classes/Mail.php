<?php
require('classes/PHPMailer.php');
require('classes/SMTP.php');
require('classes/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mail {
        public static function sendMail($subject, $body, $address) 
        {
                
                $mail = new PHPMailer();
            
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Port = "587";
                $mail->Username = "test@gmail.com";
                $mail->Password = "testpass";
                $mail->Subject = "Reset Password";
                $mail->setFrom('test@gmail.com');
                $mail->isHTML(true);
                $mail->Body = $body;
                $mail->addAddress($address);
                if ( $mail->send() ) {
                  echo "Email Sent..!";
                }else{
                  echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
                }
                $mail->smtpClose();
                
        }
}
?>
