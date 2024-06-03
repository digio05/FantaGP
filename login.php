<?php
require "shared/log.php";
require "shared/connection.php";

// Impostazioni dei cookie per la sessione
$session_lifetime = 3600; // Durata della sessione in secondi (1 ora)
$cookie_path = "/"; // Percorso in cui il cookie è valido (tutto il sito)
$cookie_domain = ""; // Dominio del cookie (vuoto per dominio corrente)
$cookie_secure = false; // Impostare a true se il sito è in HTTPS
$cookie_httponly = true; // Il cookie è accessibile solo tramite HTTP

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["user"]) || empty($_POST["password"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "signIn.html";';
        echo '</script>';
        exit();
    }

    $sql = "SELECT * FROM Utente WHERE User = :user AND Password = :password";
    $sth = $dbh->prepare($sql);
    
    $user = $_POST["user"];
    $password = $_POST["password"];

    $sth->bindParam(":user", $user, PDO::PARAM_STR);
    $sth->bindParam(":password", $password, PDO::PARAM_STR);

    $sth->execute();

    $num_rows = $sth->rowCount();

    if ($num_rows == 1) {
        // Avvia la sessione
        session_start();

        // Imposta i dati della sessione
        $_SESSION['user'] = $user;

        // Imposta il cookie della sessione
        setcookie(session_name(), session_id(), time() + $session_lifetime, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);

        // Reindirizza l'utente alla pagina home
        header("Location: home.php");
        exit();
    } else {
        echo '<script>';
        echo 'alert("Credenziali errate");';
        echo 'window.location.href = "login.html";';
        echo '</script>';
        exit();
    }

} else {
    require "shared/error.php";
}
?>
