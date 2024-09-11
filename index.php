<?php
session_start();
include './functions.php';

$error = '';

if (isset($_GET['length']) && $_GET['length'] != '') {
    $characters = [];

    if (isset($_GET['letters'])) $characters[] = 'L';
    if (isset($_GET['numbers'])) $characters[] = 'N';
    if (isset($_GET['symbols'])) $characters[] = 'S';

    $allow_duplicates = isset($_GET['duplicates']);

    if (empty($characters)) {
        // Se non è stato selezionato alcun tipo di carattere
        $error = 'Devi selezionare almeno un tipo di carattere (lettere, numeri o simboli).';
    } else {
        $password = generateRandomPassword($_GET['length'], $characters, $allow_duplicates);
        $_SESSION['password'] = $password;
        header('Location: success.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Generatore di Password Sicura</h1>

                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="index.php" method="GET">
                            <div class="mb-3">
                                <label for="length" class="form-label">Inserisci lunghezza password:</label>
                                <input type="number" name="length" id="length" class="form-control" min="6" placeholder="Minimo 6 caratteri" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Caratteri da includere:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="letters" id="letters">
                                    <label class="form-check-label" for="letters">Lettere</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="numbers" id="numbers">
                                    <label class="form-check-label" for="numbers">Numeri</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="symbols" id="symbols">
                                    <label class="form-check-label" for="symbols">Simboli</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="duplicates" id="duplicates">
                                    <label class="form-check-label" for="duplicates">Permetti duplicati</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Genera Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>