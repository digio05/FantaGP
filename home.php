<?php
// Avvia la sessione
session_start();
require "function.php";
require "shared/connection.php";
if(isset($_SESSION['user'])) {
    // Imposta i parametri del cookie
    $cookie_name = $_SESSION['user'];
    $cookie_value = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    $cookie_lifetime = time() + 3600; // Durata del cookie in secondi (1 ora)
    $cookie_path = "/"; // Percorso in cui il cookie è valido (tutto il sito)
    $cookie_domain = ""; // Dominio del cookie (vuoto per dominio corrente)
    $cookie_secure = false; // Impostare a true se il sito è in HTTPS
    $cookie_httponly = true; // Il cookie è accessibile solo tramite HTTP
    $sql = "SELECT Monete 
            FROM Squadra 
            WHERE CodUtente = :cookie_name AND CodLega = :lega";
    $sth = $dbh->prepare($sql);
    $idUser = selectUserId($cookie_name);
    $sth->bindParam(":cookie_name", $idUser, PDO::PARAM_STR);
    $sth->bindParam(":lega", $_SESSION["lega"], PDO::PARAM_STR);
    $sth->execute();
    $count = $sth->rowCount();
    $monete = $sth->fetch(PDO::FETCH_ASSOC);


    // Imposta il cookie
    setcookie($cookie_name, $cookie_value, $cookie_lifetime, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <style>
          tr th td{
            border: solid white 1px;
          }
        </style>
      </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
          <img class="logo" src="logo.png" width="9%">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="le_tue_leghe.php">Le tue leghe</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="creation.php">Crea o unisciti</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Classifiche
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Classifica Piloti</a></li>
                <li><a class="dropdown-item" href="#">Classifica Costruttori</a></li>
                <li><a class="dropdown-item" href="classifica.php">Classifica in tempo reale</a></li>
              </ul>
            </li>
          </ul>
          <button id="btn-message" class="button-message">
            <div class="content-avatar">
              <div class="status-user"></div>
              <div class="avatar">
                <svg class="user-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,12.5c-3.04,0-5.5,1.73-5.5,3.5s2.46,3.5,5.5,3.5,5.5-1.73,5.5-3.5-2.46-3.5-5.5-3.5Zm0-.5c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"></path></svg>
              </div>
            </div>
            <div class="notice-content">
              <?php
                if(isset($_SESSION['user'])) {
                    $username = $_SESSION['user'];
                    if (!empty($_SESSION["lega"]))  {
                      $sql = "SELECT Nome FROM Squadra WHERE CodLega = :lega AND CodUtente = :user";
                      $sth = $dbh->prepare($sql);
                      $sth->bindParam(":lega", $_SESSION["lega"], PDO::PARAM_INT);
                      $sth->bindParam(":user", $idUser, PDO::PARAM_INT);
                      $sth->execute();
                      $result = $sth->fetch(PDO::FETCH_ASSOC);
                      if ($sth->rowCount() > 0) {
                        echo '<div class="username">' . $result["Nome"] . "</div>";
                      }
                    }
                    echo '
                    <div class="user-id">@'.$username.'</div>';
                    
                } else {
                    header("Location: login.html");
                    exit();
                }
              ?>
              <div class="lable-message">
              <?php 
              if ($count > 0){
                echo 'Monete<span class="number-message">';
                echo $monete['Monete'] . "</span></div>";
              } else {
                echo $username;
                echo "</span></div>";
              }
              ?>
            </div>
          </button>
          <?php
          // Verifica se il nome utente è impostato nella sessione
          if(isset($_SESSION['user'])) {
            // Recupera il nome utente dalla sessione
            $username = $_SESSION['user'];
            // Mostra il nome utente nel bottone di disconnessione
          ?>
          <a href="logout.php"><button class="Btn"><div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div><div class="text">Logout</div></button></a>
          <?php
          } else {
            header("Location: login.html"); 
            exit();
          }
          ?>
      </div>
    </nav>
    <div class="top5-container">
      <?php
      $sql = "SELECT Luogo, Anno
              FROM Gara
              ORDER BY Data DESC
              LIMIT 5";
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $lastRace = $sth->fetchAll(PDO::FETCH_ASSOC);
      $count = $sth->rowCount();

      

      for ($i = 0; $i < $count; $i++) {
          $sql = "SELECT Classifica.Posizione, Pilota.Nome AS NomeP, Pilota.Cognome, Gara.Nome
                  FROM Pilota
                  INNER JOIN Classifica ON Classifica.CodPilota = Pilota.Numero
                  INNER JOIN Gara ON Gara.Luogo = Classifica.CodLuogo AND Gara.Anno = Classifica.CodAnno
                  WHERE Gara.Luogo = :luogo AND Gara.anno = :anno
                  ORDER BY Classifica.Posizione, Pilota.Nome, Pilota.Cognome, Gara.Nome
                  LIMIT 5";
          $sth = $dbh->prepare($sql);
          $sth->bindParam(":luogo", $lastRace[$i]["Luogo"], PDO::PARAM_STR);
          $sth->bindParam(":anno", $lastRace[$i]["Anno"], PDO::PARAM_INT);
          $sth->execute();
          $result[$i] = $sth->fetchAll(PDO::FETCH_ASSOC);
          echo '<table border="1" style="float:left; display:block; margin-right: 30px;">';
          echo '<caption>' . $result[$i][0]["Nome"] . '</caption>';
          echo '<tr><th>Posizione</th><th>Nome Pilota</th><th>Cognome Pilota</th></tr>';
          
          // Stampa i risultati in una tabella HTML
          foreach ($result[$i] as $row) {
              echo '<tr>';
              echo '<td>' . $row['Posizione'] . '</td>';
              echo '<td>' . $row['NomeP'] . '</td>';
              echo '<td>' . $row['Cognome'] . '</td>';
              echo '</tr>';
          }
          echo '</table>'; 
      }
      ?>

    </div>
    <div class="container-classifiche">
      <p>Classifica Piloti</p>
    <?php
    $sql = "SELECT  Nome AS NomeP, Cognome, Punti
            FROM Pilota
            ORDER BY Punti DESC, NomeP, Cognome";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo '<table  border="1" style="float:left; display:block; margin-right: 30px;">';
    echo '<caption>Classifica Piloti</caption>';
    echo '<tr><th>Posizione</th><th>Nome Pilota</th><th>Cognome Pilota</th><th>Punti</th></tr>';
    // Stampa i risultati in una tabella HTML
    $i = 1;
    foreach ($result as $row) {
      echo '<tr>';
      echo '<td>' . $i. '</td>';
      echo '<td>' . $row['NomeP'] . '</td>';
      echo '<td>' . $row['Cognome'] . '</td>';
      echo '<td>' . $row['Punti'] . '</td>';
      echo '</tr>';
      $i++;
    }
    echo '</table>'; 

        $sql = "SELECT  Nome AS NomeP, Cognome, FantaPunti
        FROM Pilota
        ORDER BY FantaPunti DESC, NomeP, Cognome";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo '<table border="1" style="float:left; display:block; margin-right: 30px;">';
    echo '<caption>Classifica FantaPiloti</caption>';
    echo '<tr><th>Posizione</th><th>Nome Pilota</th><th>Cognome Pilota</th><th>FantaPunti</th></tr>';

    // Stampa i risultati in una tabella HTML
    $i = 1;
    foreach ($result as $row) {
    echo '<tr>';
    echo '<td>' . $i. '</td>';
    echo '<td>' . $row['NomeP'] . '</td>';
    echo '<td>' . $row['Cognome'] . '</td>';
    echo '<td>' . $row['FantaPunti'] . '</td>';
    echo '</tr>';
    $i++;
    }
    echo '</table>'; 
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    </body>
</html>