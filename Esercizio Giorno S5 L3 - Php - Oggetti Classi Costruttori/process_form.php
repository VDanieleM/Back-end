<?php

// Connessione al database (sostituisci con le tue credenziali)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpesercizi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Elaborazione dei dati del form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $colore_preferito = $_POST['colore_preferito'];
    $eta = $_POST['eta'];
    $piatto_preferito = $_POST['piatto_preferito'];

    // Inserimento dei dati nel database
    $sql = "INSERT INTO form (COLORE_PREFERITO, ETA, PIATTO_PREFERITO) VALUES ('$colore_preferito', '$eta', '$piatto_preferito')";

    if ($conn->query($sql) === TRUE) {
        echo "Dati inseriti con successo nel database.";
    } else {
        echo "Errore nell'inserimento dei dati: " . $conn->error;
    }
}

$conn->close();

?>