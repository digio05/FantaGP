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


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name_lega"]) || empty($_POST["name_squad"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "creation.php";';
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

        $IdUser = selectUserId($cookie_name);

        $IdLega = selectIdLega($nome_lega);

        $sql = "INSERT INTO `Squadra` (CodUtente, CodLega, Nome) VALUES (:user, :lega, :nameS)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":user", $IdUser, PDO::PARAM_STR);
        $sth->bindParam(":lega", $IdLega, PDO::PARAM_INT);
        $sth->bindParam(":nameS", $nome_squadra, PDO::PARAM_STR);
        $sth->execute();

        $sql = "SELECT Numero FROM Pilota";
        $std = $dbh->prepare($sql);
        $std->execute();
        $piloti = $std->fetchAll(PDO::FETCH_ASSOC);

        
        for ($i = 0; $i < $std->rowCount(); $i++) {
            $sql = "INSERT INTO Partecipazione (CodLega, CodPilota) VALUES (:lega, :num)";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":lega", $IdLega, PDO::PARAM_INT);
            $sth->bindParam(":num", $piloti[$i]["Numero"], PDO::PARAM_INT);
            $sth->execute();
        }
        $_SESSION["lega"] = $IdLega; //creazione della squadra e salvataggio in sessione dell' ID
        header("Location: lega.php"); 
        exit();
    } else {
        echo 'alert("Nome della lega già presente, per favore inseritene uno nuovo");';
        header("Location: creation.php");
    }
    
} else {
    require "shared/error.php";
}

?>



