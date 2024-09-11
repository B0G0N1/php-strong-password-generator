<?php
// Funzione per generare una password casuale con parametri
function generateRandomPassword($length, $characters, $allow_duplicates) {
    // Definisce i gruppi di caratteri disponibili
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '1234567890';
    $symbols = '!&%$@#^*(){}[]';

    // Crea la stringa base di caratteri disponibili
    $base_string = '';

    // Aggiunge lettere se selezionato
    if (in_array('L', $characters)) {
        $base_string .= $alphabet;
    }

    // Aggiunge numeri se selezionato
    if (in_array('N', $characters)) {
        $base_string .= $numbers;
    }

    // Aggiunge simboli se selezionato
    if (in_array('S', $characters)) {
        $base_string .= $symbols;
    }

    // Inizializza la password vuota
    $password = '';

    // Cicla fino a raggiungere la lunghezza desiderata
    while (strlen($password) < $length) {
        // Seleziona un indice casuale dalla stringa base
        $randomIndex = rand(0, strlen($base_string) - 1);
        $char = $base_string[$randomIndex];

        // Se non sono permessi duplicati, aggiungi il carattere solo se non è già presente
        if ($allow_duplicates || !str_contains($password, $char)) {
            $password .= $char;
        }
    }

    return $password; // Restituisce la password generata
}
?>