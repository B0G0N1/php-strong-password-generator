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
?>