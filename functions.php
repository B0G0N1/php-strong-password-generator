<?php
// Funzione per generare una password casuale con parametri
function generateRandomPassword($length, $characters, $allow_duplicates) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '1234567890';
    $symbols = '!&%$@#^*(){}[]';

    // Crea la stringa base di caratteri disponibili
    $base_string = '';

    if (in_array('L', $characters)) {
        $base_string .= $alphabet;
    }
    if (in_array('N', $characters)) {
        $base_string .= $numbers;
    }
    if (in_array('S', $characters)) {
        $base_string .= $symbols;
    }

    // Inizializza la password vuota
    $password = '';

    // Cicla per la lunghezza richiesta e aggiungi caratteri casuali alla password
    while (strlen($password) < $length) {
        $randomIndex = rand(0, strlen($base_string) - 1);
        $char = $base_string[$randomIndex];

        if ($allow_duplicates || !str_contains($password, $char)) {
            $password .= $char;
        }
    }

    return $password;
}
?>