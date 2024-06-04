<?php
require "shared/connection.php";
require "function.php";
session_start();
// Impostazioni dei cookie per la sessione
$session_lifetime = 3600; // Durata della sessione in secondi (1 ora)
$cookie_path = "/"; // Percorso in cui il cookie è valido (tutto il sito)
$cookie_domain = ""; // Dominio del cookie (vuoto per dominio corrente)
$cookie_secure = false; // Impostare a true se il sito è in HTTPS
$cookie_httponly = true; // Il cookie è accessibile solo tramite HTTP
$cookie_name = $_SESSION['user'];




$user = selectUserId($cookie_name);
$lega = $_SESSION['lega'];
echo $_GET['id'];
$pilota = $_GET['id'];
$sql = "UPDATE Partecipazione SET CodUtente = :cod WHERE CodPilota = :pilota AND CodLega = :lega";
$sth = $dbh->prepare($sql);
$sth->bindParam(":cod", $user, PDO::PARAM_INT);
$sth->bindParam(":pilota", $pilota, PDO::PARAM_INT);
$sth->bindParam(":lega", $lega, PDO::PARAM_INT);
$sth->execute();

header("Location: lega.php"); 


?>

