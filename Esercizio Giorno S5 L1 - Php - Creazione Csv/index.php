<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpesercizi";
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per selezionare i dati dalla tabella
$sql = "SELECT * FROM utenti";
$result = $conn->query($sql);

// Nome del file CSV da esportare
$filename = 'utenti.csv';

// Apre il file CSV in modalità scrittura
$file = fopen($filename, 'w');

// Scrive l'intestazione delle colonne nel file CSV
$header = array('ID', 'NOME', 'COGNOME', 'EMAIL');
fputcsv($file, $header, "\t"); // Imposta il delimitatore su tabulazione

// Scrive i dati dalla query nel file CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row, "\t"); // Imposta il delimitatore su tabulazione
    }
} else {
    echo "Nessun dato trovato nella tabella";
}

// Chiude la connessione e il file CSV
$conn->close();
fclose($file);

echo "Dati esportati con successo nel file CSV: $filename";
?>