<?php
    require_once "authenticate.php";

    require_once "includes/dbh.inc.php";
    require_once "includes/functions.inc.php";

    $table = getUsers($connection);
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
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    header {
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
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  </style>
</head>
<body onload="load()">
<header>
  <div class="container" >
    <div class="row">
    <h1 style="text-align: center;">Kullanıcılar</h1>
  </div>
</div>
  <div class="row">
  <div class="navbar-header">
  <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="panel.php"><b style="font-size: 18pt;">Kullanıcılar</b></a></li>
        <li><a href="posts.php"><b style="font-size: 18pt;">İçerikler</b></a></li>
      </ul>
    </div>
  </div>
    </div>
</header>

<div class="container-fluid">

    <div class="col-sm-12">
      <div>
          <table class="table">
            <thead>
              <th>id</th>
              <th>İsim</th>
              <th>Soyisim</th>
              <th>TC</th>
              <th>Doğum Tarihi</th>
              <th>Spor Dalı</th>
              <th>Kullanıcı Adı</th>
              <th>E-posta</th>
              <th>Değiştir</th>
              <th>Sil</th>
            </thead>
            <tbody>
              <?php 
                while($row = mysqli_fetch_array($table)){
                  echo "      
                  <tr> 
                  <td>".$row["userId"]."</td>
                  <td>".$row["name"]."</td>
                  <td>".$row["surname"]."</td>
                  <td>".$row["tc"]."</td>
                  <td>".$row["birthday"]."</td>
                  <td>".$row["branch"]."</td>
                  <td>".$row["username"]."</td>
                  <td>".$row["email"]."</td>;
                  <td><a href='update.php?username=".$row["username"]."' class='btn btn-primary' role='button'>Değiştir</a></td>
                  <td><a href='delete.php?username=".$row["username"]."' class='btn btn-danger' role='button'>Sil</a></td>
                  </tr>
                  ";
                }
              ?>
            <tr>
              <td colspan="8"></td> 
              <td colspan="2"><a href='create.php' class='btn btn-info' role='button'> Yeni Ekle </a></td>
            </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
  

<footer class="container-fluid">
  <div class="row">
    <div class="col-sm-11"></div>
    <div class="col-sm-1"><a href="../index.php" class="btn btn-danger" role="button">Ana Sayfa</a></button></div>
  </div>
    
  
</footer>
</body>
</body>
</html>

