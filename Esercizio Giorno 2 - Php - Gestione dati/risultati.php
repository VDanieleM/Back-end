<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Risultati</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Dati inviati</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Messaggio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $_SESSION['data']['name']; ?>
                    </td>
                    <td>
                        <?php echo $_SESSION['data']['email']; ?>
                    </td>
                    <td>
                        <?php echo $_SESSION['data']['message']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>