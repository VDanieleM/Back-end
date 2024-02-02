<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    $_SESSION['users'][] = array('username' => $username, 'password' => $password, 'email' => $email);
    $_SESSION['username'] = $username;

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '6ff964a968a49d';
        $mail->Password = '289765e831b3dd';
        $mail->Port = 2525;

        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($email, $username);
        $mail->addReplyTo('info@example.com', 'Information');

        $mail->isHTML(true);
        $mail->Subject = 'Dettagli del tuo account';
        $mail->Body = "Nome utente: {$username}<br>Password: {$password}<br>Email: {$email}";
        $mail->AltBody = "Nome utente: {$username}\nPassword: {$password}\nEmail: {$email}";

        $mail->send();
    } catch (Exception $e) {
        echo "Il messaggio non può essere inviato. Errore Mailer: {$mail->ErrorInfo}";
    }

    header('Location: login.php');
    exit;
}
?>