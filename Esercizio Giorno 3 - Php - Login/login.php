<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Verifica se l'utente è presente nell'array di sessione
    $user_is_valid = false;
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $user_is_valid = true;
            break;
        }
    }

    if ($user_is_valid) {
        // L'utente è valido, reindirizza alla pagina index
        header('Location: index.php');
        exit;
    } else {
        // L'utente non è valido, aggiungi un messaggio di errore alla sessione
        $_SESSION['error_message'] = 'Le tue credenziali di login non sono valide.';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Includi Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Il tuo sito</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Registrazione</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']); ?>
                    </div>
                <?php endif; ?>
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Nome utente:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
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