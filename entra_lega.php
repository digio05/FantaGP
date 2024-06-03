
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
    if (empty($_POST["code"]) || empty($_POST["name"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "home.php";';
        echo '</script>';
        exit();
    }
    
    $CodLega = $_POST["code"];
    $nome_squadra = $_POST["name"];
    $sql = "SELECT Id FROM Lega WHERE Id = :code";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":code", $CodLega, PDO::PARAM_INT);
    $sth->execute();
    

    if ($sth->rowCount() != 0){
        $sql = "SELECT NomeSquadra FROM Squadra WHERE NomeSquadra = :nome";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":nome", $nome_squadra, PDO::PARAM_STR);
        $sth->execute();

        if ($sth->rowCount() == 0){
            $sql = "SELECT Id FROM Utente WHERE User = :nome";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":nome", $cookie_name, PDO::PARAM_STR);
            $sth->execute();
            $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC);

            
            $sql = "SELECT CodUtente FROM Membro WHERE CodUtente = :user";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":user", $IdUser, PDO::PARAM_INT);
            $sth->execute();

            if ($sth->rowCount() == 0){
                $sql = "INSERT INTO `Membro` (CodUtente, CodLega) VALUES (:user, :lega)";
                $sth = $dbh->prepare($sql);
                $sth->bindParam(":user", $IdUser[0]["Id"], PDO::PARAM_STR);
                $sth->bindParam(":lega", $CodLega, PDO::PARAM_INT);
                $sth->execute();

                $sql = "INSERT INTO `Squadra` (CodUtente, CodLega, NomeSquadra) VALUES (:user, :lega, :nameS)";
                $sth = $dbh->prepare($sql);
                $sth->bindParam(":user", $IdUser[0]["Id"], PDO::PARAM_STR);
                $sth->bindParam(":lega", $CodLega, PDO::PARAM_INT);
                $sth->bindParam(":nameS", $nome_squadra, PDO::PARAM_STR);
                $sth->execute();

                $_SESSION["lega"] = $CodLega;
            }else{
                echo '<script>';
                echo 'alert("Utente già registrato alla lega.");';
                echo 'window.location.href = "home.php";';
                echo '</script>';
                exit();
            }
        } else {
            echo '<script>';
            echo 'alert("Nome della squadra già presente nella lega, per favore, se ne scelga un altro.");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
            exit();
        }

        
    } else {
        echo '<script>';
        echo 'alert("Lega non esistente, per favore inserire il codice corretto.");';
        echo 'window.location.href = "home.php";';
        echo '</script>';
        exit();
    }
    
} else {
    require "shared/error.php";
}
?>

