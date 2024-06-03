<?php
require "shared/connection.php";

// Impostazioni dei cookie per la sessione
$session_lifetime = 3600; // Durata della sessione in secondi (1 ora)
$cookie_path = "/"; // Percorso in cui il cookie è valido (tutto il sito)
$cookie_domain = ""; // Dominio del cookie (vuoto per dominio corrente)
$cookie_secure = false; // Impostare a true se il sito è in HTTPS
$cookie_httponly = true; // Il cookie è accessibile solo tramite HTTP

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["nome"]) || empty($_POST["cognome"]) || empty($_POST["user"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "signIn.html";';
        echo '</script>';
        exit();
    }

    $sql = "SELECT user";
    $sql = "INSERT INTO `Utente` (`Nome`, `Cognome`, `User`, `Email`, `Password`) VALUES (:nome, :cognome, :user, :email, :password)";
    $sth = $dbh->prepare($sql);
    //Aggiungere query di controllo che l'user non esista già nel db


    $name = $_POST["nome"];
    $surname = $_POST["cognome"];
    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sth->bindParam(":nome", $name, PDO::PARAM_STR);
    $sth->bindParam(":cognome", $surname, PDO::PARAM_STR);
    $sth->bindParam(":user", $user, PDO::PARAM_STR);
    $sth->bindParam(":email", $email, PDO::PARAM_STR);
    $sth->bindParam(":password", $password, PDO::PARAM_STR);
    

    $sth->execute();

    if ($sth->rowCount() > 0) {
        session_start();
        $_SESSION['user'] = $user;
        setcookie(session_name(), session_id(), time() + $session_lifetime, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);
        header("Location: home.php");
        exit();
    } else {
        header("Location: signIn.html");
        exit();
    }
} else {
    require "shared/error.php";
}
?>
