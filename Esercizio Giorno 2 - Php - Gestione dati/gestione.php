<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = array(
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'message' => htmlspecialchars($_POST['message'])
    );

    $_SESSION['data'] = $data;

    header('Location: risultati.php');
    exit;
}
?>