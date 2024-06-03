<?php
require "shared/connection.php";
session_start();
// Impostazioni dei cookie per la sessione
$session_lifetime = 3600; // Durata della sessione in secondi (1 ora)
$cookie_path = "/"; // Percorso in cui il cookie è valido (tutto il sito)
$cookie_domain = ""; // Dominio del cookie (vuoto per dominio corrente)
$cookie_secure = false; // Impostare a true se il sito è in HTTPS
$cookie_httponly = true; // Il cookie è accessibile solo tramite HTTP
$cookie_name = $_SESSION['user'];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name_lega"]) || empty($_POST["name_squad"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "home.html";';
        echo '</script>';
        exit();
    }
    $nome_lega = $_POST["name_lega"];
    $nome_squadra = $_POST["name_squad"];
    $sql = "SELECT COUNT(NomeLega) AS Conto FROM Lega WHERE NomeLega = :nameL";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":nameL", $nome_lega, PDO::PARAM_STR);
    $sth->execute();
    
    if ($sth->rowCount() != 0){
        $sql = "INSERT INTO `Lega` (`NomeLega`) VALUES (:nome)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":nome", $nome_lega, PDO::PARAM_STR);
        $sth->execute(); //creazione della lega 

        $sql = "SELECT Id FROM Utente WHERE User = :nome";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":nome", $cookie_name, PDO::PARAM_STR);
        $sth->execute();
        $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC); //resituzione del id dell'utente

        $sql = "SELECT Id FROM lega WHERE NomeLega = :nome";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":nome", $nome_lega, PDO::PARAM_STR);
        $sth->execute();
        $IdLega = $sth->fetchAll(PDO::FETCH_ASSOC);//resituzione del id della lega

        $sql = "INSERT INTO `Squadra` (CodUtente, CodLega, Nome) VALUES (:user, :lega, :nameS)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":user", $IdUser[0]["Id"], PDO::PARAM_STR);
        $sth->bindParam(":lega", $IdLega[0]["Id"], PDO::PARAM_INT);
        $sth->bindParam(":nameS", $nome_squadra, PDO::PARAM_STR);
        $sth->execute();
        $_SESSION["lega"] = $IdLega[0]["Id"]; //creazione della squadra e salvataggio in sessione dell' ID
        header("Location: home.php"); 
        exit();
    } else {
        echo 'alert("Nome della lega già presente, per favore inseritene uno nuovo");';
        header("Location: home.php");
    }
    
} else {
    require "shared/error.php";
}

?>
