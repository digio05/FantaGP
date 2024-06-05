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
$pilota = $_GET['id'];

$sql = "SELECT Costo, Monete 
FROM Squadra 
INNER JOIN partecipazione ON partecipazione.CodLega = squadra.CodLega
INNER JOIN pilota ON pilota.Numero = partecipazione.CodPilota
WHERE (squadra.CodUtente = :user AND squadra.CodLega = :lega) AND Pilota.Numero = :pilota";;
$sth = $dbh->prepare($sql);
$sth->bindParam(":user", $user, PDO::PARAM_INT);
$sth->bindParam(":lega", $lega, PDO::PARAM_INT);
$sth->bindParam(":pilota", $pilota, PDO::PARAM_INT);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

if ($result[0]["Costo"] <= $result[0]["Monete"]) {
    $sql = "UPDATE Partecipazione SET CodUtente = :cod WHERE CodPilota = :pilota AND CodLega = :lega";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":cod", $user, PDO::PARAM_INT);
    $sth->bindParam(":pilota", $pilota, PDO::PARAM_INT);
    $sth->bindParam(":lega", $lega, PDO::PARAM_INT);
    $sth->execute();

    $sql = "UPDATE Squadra
    INNER JOIN partecipazione ON partecipazione.CodLega = squadra.CodLega
    INNER JOIN pilota ON pilota.Numero = partecipazione.CodPilota
    SET	squadra.Monete = squadra.Monete - Pilota.Costo
    WHERE (squadra.CodUtente = :user AND squadra.CodLega = :lega) AND Pilota.Numero = :pilota";

    $sth = $dbh->prepare($sql);
    $sth->bindParam(":user", $user, PDO::PARAM_INT);
    $sth->bindParam(":lega", $lega, PDO::PARAM_INT);
    $sth->bindParam(":pilota", $pilota, PDO::PARAM_INT);
    $sth->execute();
    header("Location: lega.php"); 
} else {
    echo '<script>';
    echo 'alert("Monete insufficienti, comprare un altro pilota");';
    echo 'window.location.href = "lega.php";';
    echo '</script>';
    exit();
}

?>

