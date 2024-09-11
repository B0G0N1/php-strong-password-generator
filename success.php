<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h1 class="text-success">Password Generata</h1>
                        <?php if (isset($_SESSION['password'])): ?>
                            <h2 class="display-4 text-primary"><?php echo $_SESSION['password']; ?></h2>
                        <?php else: ?>
                            <h2 class="text-danger">Nessuna password trovata.</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>