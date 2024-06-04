
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
    if (empty($_POST["code"]) || empty($_POST["name"])) {
        echo '<script>';
        echo 'alert("Per favore, completa tutti i campi.");';
        echo 'window.location.href = "creation.php";';
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
        $sql = "SELECT Nome FROM Squadra WHERE Nome = :nome";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(":nome", $nome_squadra, PDO::PARAM_STR);
        $sth->execute();

        if ($sth->rowCount() == 0){
            $sql = "SELECT Id FROM Utente WHERE User = :nome";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":nome", $cookie_name, PDO::PARAM_STR);
            $sth->execute();
            $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC);

            $sql = "SELECT CodUtente FROM Squadra WHERE CodUtente = :nome AND CodLega = :code";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(":nome", $IdUser, PDO::PARAM_STR);
            $sth->bindParam(":code", $CodLega, PDO::PARAM_INT);
            $sth->execute();
            $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC);

            if ($sth->rowCount() == 0){
                $IdUser = selectUserId($cookie_name);
                $sql = "INSERT INTO `Squadra` (CodUtente, CodLega, Nome) VALUES (:user, :lega, :nameS)";
                $sth = $dbh->prepare($sql);
                $sth->bindParam(":user", $IdUser, PDO::PARAM_STR);
                $sth->bindParam(":lega", $CodLega, PDO::PARAM_INT);
                $sth->bindParam(":nameS", $nome_squadra, PDO::PARAM_STR);
                $sth->execute();
                $_SESSION["lega"] = $CodLega;
                header("Location: lega.php"); 
                exit();
            }else{
                echo '<script>';
                echo 'alert("Utente già registrato alla lega.");';
                echo 'window.location.href = "creation.php";';
                echo '</script>';
                exit();
            }
        } else {
            echo '<script>';
            echo 'alert("Nome della squadra già presente nella lega, per favore, se ne scelga un altro.");';
            echo 'window.location.href = "creation.php";';
            echo '</script>';
            exit();
        }

        
    } else {
        echo '<script>';
        echo 'alert("Lega non esistente, per favore inserire il codice corretto.");';
        echo 'window.location.href = "creation.php";';
        echo '</script>';
        exit();
    }
    
} else {
    require "shared/error.php";
}
?>

