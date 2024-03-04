<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpesercizi";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Crea tabelle se non esistono
$sql = "CREATE TABLE IF NOT EXISTS Libri (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
titolo VARCHAR(30) NOT NULL,
autore VARCHAR(30) NOT NULL,
annoPubblicazione INT(4) NOT NULL,
disponibile BOOLEAN DEFAULT TRUE
)";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS DVD (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
titolo VARCHAR(30) NOT NULL,
regista VARCHAR(30) NOT NULL,
annoPubblicazione INT(4) NOT NULL,
disponibile BOOLEAN DEFAULT TRUE
)";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

// Popola le tabelle se sono vuote
$sql = "SELECT COUNT(*) AS count FROM Libri";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql = "INSERT INTO Libri (titolo, autore, annoPubblicazione) VALUES 
    ('Il nome del vento', 'Patrick Rothfuss', 2007),
    ('Harry Potter e la pietra filosofale', 'J.K. Rowling', 1997),
    ('Il Signore degli Anelli', 'J.R.R. Tolkien', 1954)";
    $conn->query($sql);
}

$sql = "SELECT COUNT(*) AS count FROM DVD";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql = "INSERT INTO DVD (titolo, regista, annoPubblicazione) VALUES 
    ('Il Signore degli Anelli', 'Peter Jackson', 2001),
    ('Harry Potter e la pietra filosofale', 'Chris Columbus', 2001),
    ('Star Wars: Episodio IV - Una nuova speranza', 'George Lucas', 1977)";
    $conn->query($sql);
}

// Gestione delle richieste POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['presta_libro'])) {
        $sql = "SELECT disponibile FROM Libri WHERE id = 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['disponibile']) {
            $sql = "UPDATE Libri SET disponibile = FALSE WHERE id = 1";
            $conn->query($sql);
        }
    } elseif (isset($_POST['restituisci_libro'])) {
        $sql = "UPDATE Libri SET disponibile = TRUE WHERE id = 1";
        $conn->query($sql);
    } elseif (isset($_POST['presta_dvd'])) {
        $sql = "SELECT disponibile FROM DVD WHERE id = 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['disponibile']) {
            $sql = "UPDATE DVD SET disponibile = FALSE WHERE id = 1";
            $conn->query($sql);
        }
    } elseif (isset($_POST['restituisci_dvd'])) {
        $sql = "UPDATE DVD SET disponibile = TRUE WHERE id = 1";
        $conn->query($sql);
    }

    // Aggiorna il numero totale di libri e DVD
    $sql = "SELECT COUNT(*) AS count FROM Libri WHERE disponibile = TRUE";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $numeroLibri = $row['count'];

    $sql = "SELECT COUNT(*) AS count FROM DVD WHERE disponibile = TRUE";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $numeroDVD = $row['count'];
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    <!-- Includi Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Biblioteca</h1>

        <!-- Form HTML per gestire le operazioni di prestito e restituzione -->
        <form method="post" class="text-center">
            <button type="submit" name="presta_libro" class="btn btn-primary">Presta Libro</button>
            <button type="submit" name="restituisci_libro" class="btn btn-success">Restituisci Libro</button>
            <button type="submit" name="presta_dvd" class="btn btn-primary">Presta DVD</button>
            <button type="submit" name="restituisci_dvd" class="btn btn-success">Restituisci DVD</button>
        </form>

        <!-- Visualizzazione del numero totale di libri e DVD -->
        <p class="text-center my-4">Numero totale di libri:
            <?php echo $numeroLibri; ?>
        </p>
        <p class="text-center my-4">Numero totale di DVD:
            <?php echo $numeroDVD; ?>
        </p>
    </div>

    <!-- Includi Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>