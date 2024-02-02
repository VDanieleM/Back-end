<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['username'])) {
    // L'utente non è loggato, reindirizza al login
    header('Location: login.php');
    exit;
}

// Controlla se l'utente ha fatto clic sul pulsante di logout
if (isset($_POST['logout'])) {
    // Termina la sessione dell'utente
    session_destroy();
    // Reindirizza l'utente alla pagina di login
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!-- Includi Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Il tuo sito</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Ciao,
                        <?php echo $_SESSION['username']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <input type="submit" name="logout" value="Logout" class="btn btn-link nav-link"
                            style="display:inline;cursor:pointer;">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title">Account registrati</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome utente</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['users'] as $user): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlspecialchars($user['username']); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($user['email']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Includi Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>