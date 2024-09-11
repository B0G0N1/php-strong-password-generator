<?php
// Funzione per generare una password casuale
function generateRandomPassword($length) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '1234567890';
    $symbols = '!&%$@#^*(){}[]';

    // Crea una stringa base di caratteri disponibili
    $characters = $alphabet . $numbers . $symbols;

    // Inizializza la password vuota
    $password = '';

    // Cicla per la lunghezza richiesta e aggiungi caratteri casuali alla password
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

// Controlla se è stata richiesta una password
if (isset($_GET['length']) && $_GET['length'] != '') {
    $password = generateRandomPassword($_GET['length']);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Password Generator</title>
</head>
<body>
    <h1>Generatore di Password Sicura</h1>

    <form action="index.php" method="GET">
        <label for="length">Inserisci lunghezza password:</label>
        <input type="number" name="length" id="length" min="6" required>
        <button type="submit">Genera Password</button>
    </form>

    <?php if (isset($password)): ?>
        <h2>Password Generata: <?php echo $password; ?></h2>
    <?php endif; ?>
</body>
</html>