<?php
function selectUserId($cookie_name) {
    require "shared/connection.php";
    $sql = "SELECT Id FROM Utente WHERE User = :nome";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":nome", $cookie_name, PDO::PARAM_STR);
    $sth->execute();
    $IdUser = $sth->fetchAll(PDO::FETCH_ASSOC); //resituzione del id dell'utente

    return $IdUser[0]['Id'];
}
function selectNomeSquadra($IdLega, $idUser){
    require "shared/connection.php";
    $sql = "SELECT Nome FROM Squadra WHERE CodLega = :lega AND CodUtente = :user";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":lega", $IdLega, PDO::PARAM_INT);
    $sth->bindParam(":user", $idUser, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result["Squadra"];
}

function countNomeSquadraRow($IdLega, $idUser){ //Conta se è presente monete nella tabella squadra
    require "shared/connection.php";
    $sql = "SELECT Nome FROM Squadra WHERE CodLega = :lega AND CodUtente = :user";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":lega", $IdLega, PDO::PARAM_INT);
    $sth->bindParam(":user", $idUser, PDO::PARAM_INT);
    $sth->execute();
    return $sth->rowCount();
}

function selectIdLega($nome_lega) {
    require "shared/connection.php";
    $sql = "SELECT Id FROM lega WHERE NomeLega = :nome";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":nome", $nome_lega, PDO::PARAM_STR);
    $sth->execute();
    $IdLega = $sth->fetch(PDO::FETCH_ASSOC);//resituzione del id della lega

    return $IdLega["Id"];
}


?>