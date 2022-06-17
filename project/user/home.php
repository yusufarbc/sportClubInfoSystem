<?php 
    session_start(); 
    if ( !isset($_SESSION['username']) ) { 
        header("Location: login.php"); 
        exit(); 
    }else{
        $username = $_SESSION["username"];

        require_once "includes/dbh.inc.php";
        require_once "includes/functions.inc.php";

        $row = usernameExists($connection, $username, $username);
    }
?> 
<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Sporcu Bilgi Sistemi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body onload="load()">
  
</body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Spor Kulübü</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="home.php">Panel</a></li>
        <li><a href="profile.php">Profil</a></li>
        <li><a href="#section3">Resimler</a></li>
      </ul><br>
      <div class="col-sm-1"><a href="../index.php" class="btn btn-danger" role="button">Ana Sayfa</a></button></div>
    </div>

    <div class="col-sm-9">
      <div>
        <?php 
          echo "<h2>Hoşgeldin!&nbsp;&nbsp;".$row["name"]." ".$row["surname"]."</h2> <br> <hr> <br>";
          echo "<h3>Özgeçmiş</h3><br>".$row["resume"];
        ?>
      </div>
    </div>
  </div>
</div>
  

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>