<?php

require_once 'config.php';


$mysqli = new mysqli($config['host'], $config['user'], $config['password']);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS `DB`")) {
    die($mysqli->connect_error);
}  // Verfico se il DB esiste e se non esiste lo crea


$mysqli->query("USE `DB"); // Se il DB esiste allora lo uso



// Crea la tabella
$sql = 'CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    age INT(3) UNSIGNED NOT NULL)';

if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}

// Modifico i dati
$sql = "UPDATE users SET name = 'Brad' WHERE id = 1";

if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
} else {
    // echo "Utente modificato";
}


// Elimino un utente
$sql = "DELETE FROM users WHERE id = 4";

if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
} else {
    // echo "Utente eliminato";
}



// Visualizzo i dati degli utenti
$sql = "SELECT * FROM users";
$result = [];
$res = $mysqli->query($sql); // Mi ritorno i dati

if ($res) {

    while ($row = $res->fetch_assoc()) {
        $result[] = $row;

    }

    print_r($result);
}

foreach ($result as $key => $value) {
    echo '<p>' . $value['id'] . '<br>' . $value['name'] . '<br>' . $value['surname'] . '<br>' . $value['email'] . '<br>' . $value['age'] . '<p>';

}

?>