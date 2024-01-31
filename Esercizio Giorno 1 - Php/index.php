<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $giorno = date("l"); // Restituisce il nome del giorno
    $mese = date("F"); // Restituisce il nome del mese
    $giornonumero = date("d"); // Restituisce il giorno del mese e l'anno
    $anno = date("Y");

    // Traduci i nomi dei giorni e dei mesi in italiano
    $giorni = array('Monday' => 'Lunedì', 'Tuesday' => 'Martedì', 'Wednesday' => 'Mercoledì', 'Thursday' => 'Giovedì', 'Friday' => 'Venerdì', 'Saturday' => 'Sabato', 'Sunday' => 'Domenica');
    $mesi = array('January' => 'Gennaio', 'February' => 'Febbraio', 'March' => 'Marzo', 'April' => 'Aprile', 'May' => 'Maggio', 'June' => 'Giugno', 'July' => 'Luglio', 'August' => 'Agosto', 'September' => 'Settembre', 'October' => 'Ottobre', 'November' => 'Novembre', 'December' => 'Dicembre');

    $giorno_it = $giorni[$giorno];
    $mese_it = $mesi[$mese];

    echo "
    <div class='container pt-5'>
    <p class='text-center pt-5 fs-3 fw-bold'>Oggi è $giorno_it $giornonumero $mese_it $anno , buona giornata!</p>
    </div>
    ";
    ?>

    <?php
    $serieA = array(
        "Juventus" => array("Buffon", "Chiellini", "Ronaldo"),
        "Inter" => array("Handanovic", "Skriniar", "Lukaku"),
        "Milan" => array("Donnarumma", "Romagnoli", "Ibrahimovic")
    );

    echo "<h1 class='text-center pt-5'>Squadre</h1>";
    echo '<table class="table">';
    foreach ($serieA as $squadra => $giocatori) {
        echo "<thead><tr><th colspan='2'>$squadra</th></tr></thead>";
        echo "<tbody><tr><td>Formazione</td><td>";
        foreach ($giocatori as $giocatore) {
            echo "$giocatore<br>";
        }
        echo "</td></tr></tbody>";
    }
    echo '</table>';
    ?>


    <?php
    $serieA = array(
        "Partita 1" => array(
            "Juventus" => array("Buffon", "Chiellini", "Ronaldo"),
            "Inter" => array("Handanovic", "Skriniar", "Lukaku")
        ),
        "Partita 2" => array(
            "Milan" => array("Donnarumma", "Romagnoli", "Ibrahimovic"),
            "Napoli" => array("Ospina", "Koulibaly", "Insigne")
        )
    );

    echo "<h1 class='text-center pt-5'>Partite</h1>";
    echo '<table class="table">';
    foreach ($serieA as $partita => $squadre) {
        echo "<thead><tr><th colspan='2'>$partita</th></tr></thead>";
        foreach ($squadre as $squadra => $giocatori) {
            echo "<tbody><tr><td>$squadra</td><td>";
            foreach ($giocatori as $giocatore) {
                echo "$giocatore<br>";
            }
            echo "</td></tr></tbody>";
        }
    }
    echo '</table>';
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>