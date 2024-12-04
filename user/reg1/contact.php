<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'trangchu.php'; // Adjust the path to autoload.php based on your project structure

if (isset($_POST['btncontact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->CharSet = '';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = '';
        $mail->Host = hostname('localhost');
        $mail->Port = port();
        $mail->Username = username();
        $mail->Password = password();
        $mail->setFrom('','');
        $mail->addAddress($email);
        $mail->addReplyTo('','');
        $mail->addCC($name);
        $mail->addBCC($email);
        $mail->addReplyTo('','');
        $mail->addCC($comments);
        $mail->addReplyTo('','');
        $mail->addAddress($email);
        $mail->addReplyTo('','');
        $mail->addCC($mail->Subject);
        $mail->addBCC($comments);
        $mail->addCC($mail->Body);
        $mail->addBCC($mail->AltBody);
        $mail->addAttachment($name, $email);
        $mail->send();
    } catch (Exception $e) {
        echo ''. $e->getMessage();
}
}
?>