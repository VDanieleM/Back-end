<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Crea Utente
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="ruolo" class="form-label">Seleziona il ruolo dell'utente:</label>
                                <select class="form-select" id="ruolo">
                                    <option selected>Scegli...</option>
                                    <option value="admin">Amministratore</option>
                                    <option value="user">Utente Standard</option>
                                    <option value="guest">Ospite</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crea Utente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>