<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/Exception.php';
require 'path/to/PHPMailer/PHPMailer.php';
require 'path/to/PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // Địa chỉ máy chủ SMTP của bạn
    $mail->SMTPAuth = true;
    $mail->Username = 'danglinh10062001@gmail.com'; // Email của bạn
    $mail->Password = ''; // Mật khẩu email của bạn
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    try {
        // Thiết lập thông tin gửi
        $mail->setFrom($email, $name);
        $mail->addAddress('danglinh10062001@gmail.com');  // Địa chỉ email người nhận
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Gửi email
        $mail->send();

        // Gửi email thành công
        echo 'Your message has been sent. Thank you!';
    } catch (Exception $e) {
        // Lỗi gửi email
        echo 'An error occurred: ' . $mail->ErrorInfo;
    }
}