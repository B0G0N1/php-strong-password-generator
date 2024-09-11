<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
</head>
<body>
    <h1>Password Generata</h1>

    <?php if (isset($_SESSION['password'])): ?>
        <h2><?php echo $_SESSION['password']; ?></h2>
    <?php endif; ?>
</body>
</html>