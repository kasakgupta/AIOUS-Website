<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kasakgupta0507@gmail.com';
        $mail->Password   = 'mnrj llcw dlty nrrx';  // Gmail App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('kasakgupta0507@gmail.com', 'Get In Touch');
        $mail->addAddress('kasak005btit24@igdtuw.ac.in', 'AIOUS Website');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h2>New Message from Website Contact Form</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$tel}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
    header("Location: Get_in_touch.php?status=success");
exit();

    } catch (Exception $e) {
        header("Location: Get_in_touch.php?status=error");
exit();
    }}
