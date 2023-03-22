<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAutch = true;
$mail->Username = 'biancavn06@gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 456;