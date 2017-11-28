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

```
$mail->Host = '1';
$mail->SMTPAuth = true;
$mail->Username = '2';
$mail->Password = '3';
$mail->SMTPSecure = 'tls';
$mail->Port = 4;
$mail->setFrom('5', 'Mailer');
$mail->addAddress('6', 'Joe User');
```
## 4th Stage:

Set the Database file
Go to App/Config/Database.php

```
public static $dsn ='';
public static $user ='';
public static $password ='';
public static $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
```

## 5th Stage
create post and comment table in your database

com:

```
CREATE TABLE IF NOT EXISTS `com` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`idPostCom` int(11) NOT NULL,
`authorCom` varchar(255) NOT NULL,
`dateCom` datetime NOT NULL,
`contentCom` text NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204
```

post:

```
CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`datePost` datetime NOT NULL,
`titlePost` varchar(255) NOT NULL,
`authorPost` varchar(255) NOT NULL,
`descriptionPost` text NOT NULL,
`comsNumber` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50
```
