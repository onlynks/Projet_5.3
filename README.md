# Projet_5.3

# Installation

## 1st Stage: 

Clone the git repository

## 2nd Stage:

Install Composer

## 3rd Stage:

* Install Twig

Go to [packagist.org](https://packagist.org/packages/twig/twig)

* Install phpmailer

Go to [packagist.org](https://packagist.org/packages/phpmailer/phpmailer)

-------------------------------------------------------------------------

Go to the file Framework/MailSender.php

Replace the following numbers by:
1. Your SMTP
2. Your email
3. Your password
4. The port of your smtp
5. Your email
6. Your email

    $mail->Host = '1';
    $mail->SMTPAuth = true;
    $mail->Username = '2';
    $mail->Password = '3';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 4;
    $mail->setFrom('5', 'Mailer');
    $mail->addAddress('6', 'Joe User');

