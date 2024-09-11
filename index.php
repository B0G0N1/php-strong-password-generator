<?php
session_start();
include './functions.php'; // Include la logica per generare la password

$error = ''; // Inizializza una variabile per gestire eventuali errori

// Controlla se è stato inserito un valore per la lunghezza della password
if (isset($_GET['length']) && $_GET['length'] != '') {
    $characters = []; // Array per memorizzare i tipi di caratteri selezionati

    // Controlla quali tipi di carattere sono stati selezionati e li aggiunge all'array
    if (isset($_GET['letters'])) $characters[] = 'L';
    if (isset($_GET['numbers'])) $characters[] = 'N';
    if (isset($_GET['symbols'])) $characters[] = 'S';

    // Controlla se è stata selezionata l'opzione per permettere duplicati
    $allow_duplicates = isset($_GET['duplicates']);

    // Verifica se non è stato selezionato alcun tipo di carattere
    if (empty($characters)) {
        // Messaggio di errore se non è stato selezionato nessun tipo di carattere
        $error = 'Devi selezionare almeno un tipo di carattere (lettere, numeri o simboli).';
    } else {
        // Genera la password con i parametri forniti
        $password = generateRandomPassword($_GET['length'], $characters, $allow_duplicates);
        $_SESSION['password'] = $password; // Memorizza la password nella sessione
        header('Location: success.php'); // Effettua il redirect alla pagina di successo
        exit(); // Evita che il codice successivo venga eseguito dopo il redirect
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <!-- Importa il CSS di Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Generatore di Password Sicura</h1>

                        <!-- Mostra l'errore se esiste -->
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Form per l'invio dei dati -->
                        <form action="index.php" method="GET">
                            <div class="mb-3">
                                <label for="length" class="form-label">Inserisci lunghezza password:</label>
                                <input type="number" name="length" id="length" class="form-control" min="6" placeholder="Minimo 6 caratteri" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Caratteri da includere:</label>
                                <!-- Checkbox per la selezione del tipo di caratteri -->
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
                                <!-- Checkbox per permettere duplicati -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="duplicates" id="duplicates">
                                    <label class="form-check-label" for="duplicates">Permetti duplicati</label>
                                </div>
                            </div>
                            <!-- Pulsante di invio -->
                            <button type="submit" class="btn btn-primary w-100">Genera Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>