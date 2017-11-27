<?php

namespace Framework;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailSender
{
    
    public static function send($mailContent)
    {
       $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'nicogar12@gmail.com';                 // SMTP username
            $mail->Password = 'Mrsmaima12';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('nicogar12@gmail.com', 'Mailer');
            $mail->addAddress('nicogar12@gmail.com', 'Joe User');     // Add a recipient
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Formumlaire de contact Blog';
            
            $body = '<h2>' . $mailContent['name'] . '</h2>
            <h4>' . $mailContent['mail'] . '</h4>
            <p>' . $mailContent['message'] .'</p>';
            
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            return $message = 'Le message a bien été envoyé';
            
        } catch (Exception $e) {
            return 'Le message n\'a pas pu être envoyé';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        }
}
