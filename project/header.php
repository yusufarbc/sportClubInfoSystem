
<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Spor Kulübü</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .jumbotron {
      background-size: cover; 
      height: 600px; 
    }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>    
      </button>
      <a class="navbar-brand" href="index.php">SPOR KULÜBÜ</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="football.php">Futbol</a></li>
        <li><a href="basketball.php">Basketbol</a></li>
        <li><a href="volleyball.php">Voleybol</a></li>
        <li><a href="handball.php">Hentbol</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user/login.php"><span class="glyphicon glyphicon-log-in"></span> Giriş</a></li>
      </ul>
    </div>
  </div>
</nav>