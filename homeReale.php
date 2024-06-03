<?php
// Avvia la sessione
session_start();
require "shared/connection.php";

if (!empty($_SESSION['user'])) {
    $cookie_name = $_SESSION['user'];
    $cookie_value = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    $cookie_lifetime = time() + 3600; // 1 ora
    $cookie_path = "/";
    $cookie_domain = "";
    $cookie_secure = false;
    $cookie_httponly = true;

    $sql = "SELECT NomeSquadra, Monete FROM Utente WHERE User = :cookie_name";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":cookie_name", $cookie_name, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT COUNT(CodUtente) AS 'Numero' FROM Pilota WHERE CodUtente = :cookie_name";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(":cookie_name", $cookie_name, PDO::PARAM_STR);
    $sth->execute();
    $numeroPiloti = $sth->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT Pilota.* FROM Pilota";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $piloti = $sth->fetchAll(PDO::FETCH_ASSOC);

    setcookie($cookie_name, $cookie_value, $cookie_lifetime, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);
} else {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
                  <a class="nav-link" href="#">Le tue leghe</a>
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
                    echo '
                    <div class="username">'.$result['NomeSquadra'].'</div>
                    <div class="user-id">@'.$username.'</div>';
                } else {
                    header("Location: login.html");
                    exit();
                }
              ?>
              <div class="lable-message">Monete<span class="number-message"><?php
              echo $result['Monete'] ?></span></div>
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

    <?php
    if ($numeroPiloti["Numero"] != 3) {
    ?> 
    <div>
      <p>Compra i tuoi piloti: Al momento ne hai <?php echo $numeroPiloti["Numero"] ?></p>
      <?php
        if (!empty($piloti)) {
            echo "<table><tr>";
            foreach (array_keys($piloti[0]) as $field) {
                echo "<th>" . $field . "</th>";
            }
            echo "</tr>";
            foreach ($piloti as $row) {
                echo "<tr>";
                foreach ($row as $field) {
                    echo "<td>" . $field . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Non ci sono dati dei piloti disponibili.</p>";
        }
        ?>
    </div>
    <?php
    } else {
    ?>
      <div class="login-box">
        <p>Pilota 1</p>
          <div class="dataBox">
              <input class="login-box-input" />
              <label>Password</label>
          </div>
          
          <button class="buttonNav" type="submit">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Vendi
          </button><br />
        <p>Non hai un account? <a href="signIn.html" class="a2"> Iscriviti</a></p>
      </div>
    <?php
    }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




    
  </body>
</html>
