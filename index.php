<?php
session_start();
include './functions.php';

// Controlla se è stata richiesta una password
if (isset($_GET['length']) && $_GET['length'] != '') {
    $characters = [];

    if (isset($_GET['letters'])) $characters[] = 'L';
    if (isset($_GET['numbers'])) $characters[] = 'N';
    if (isset($_GET['symbols'])) $characters[] = 'S';

    $allow_duplicates = isset($_GET['duplicates']);

    $password = generateRandomPassword($_GET['length'], $characters, $allow_duplicates);
    $_SESSION['password'] = $password;
    header('Location: success.php');
    exit();
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
        <div>
            <label><input type="checkbox" name="letters"> Lettere</label>
            <label><input type="checkbox" name="numbers"> Numeri</label>
            <label><input type="checkbox" name="symbols"> Simboli</label>
        </div>
        <div>
            <label><input type="checkbox" name="duplicates"> Permetti duplicati</label>
        </div>
        <button type="submit">Genera Password</button>
    </form>
</body>
</html>