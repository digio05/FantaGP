<?php
// Avvia la sessione
session_start();

// Distruggi tutte le variabili di sessione
$_SESSION = array();

// Cancella il cookie della sessione
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Cancella definitivamente la sessione
session_destroy();

// Cancella il cookie dell'utente (se presente)
if (isset($_COOKIE['user'])) {
    setcookie('user', '', time() - 3600, '/');
}

// Reindirizza l'utente alla pagina di login
header("Location: login.html");
exit();
?>
