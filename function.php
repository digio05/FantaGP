<?php
function selectUserId($cookie_name) {
    require "shared/connection.php";
    $sql = "SELECT Id FROM Utente WHERE User = :nome";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":nome", $cookie_name, PDO::PARAM_STR);
    $sth->execute();
    $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC); //resituzione del id dell'utente

    return $IdUser;
}

?>