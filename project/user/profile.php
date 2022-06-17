<?php 
    session_start(); 
    if ( !isset($_SESSION['username']) ) { 
        header("Location: login.php"); 
        exit(); 
    }else{
        $username = $_SESSION["username"];
        $username = (string) $username;

        require_once "includes/dbh.inc.php";
        require_once "includes/functions.inc.php";

        if($row = usernameExists($connection, $username, $username)){
            $name = $row["name"];
            $surname = $row["surname"];
            $tc = $row["tc"];
            $birthday = $row["birthday"];
            $username = $row["username"];
            $branch = $row["branch"];
            $resume = $row["resume"];
            $email = $row["email"];
            $pwd = $row["password"];

        }else{
          header("../login.php");
          exit();
        }
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
        <li><a href="home.php">Panel</a></li>
        <li class="active"><a href="profile.php">Profil</a></li>
        <li><a href="#section3">Resimler</a></li>
      </ul><br>
      <div class="col-sm-1"><a href="../index.php" class="btn btn-danger" role="button">Ana Sayfa</a></button></div>
    </div>

    <div class="col-sm-9">
      <div>
        <?php 
          echo "<h2>Hoşgeldin!&nbsp;&nbsp;".$row["name"]." ".$row["surname"]."</h2> <br> <hr> <br>";
        ?>
        <h2>Profil Bilgileri</h2>
          <table class="table">
            <tbody>
              <tr>
              <form action="includes/update.inc.php?type=name" method="post">
                <th scope="row">İsim</th>
                <td><span id="name"></span>
                </td>
                <td><input name="name" type="text"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
              </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=surname" method="post">
                <th scope="row">Soyisim</th>
                <td><span id="surname"></span></td>
                <td><input name="surname" type="text"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
              </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=tc" method="post">
                <th scope="row">TC</th>
                <td><span id="tc"></span></td>
                <td><input name="tc" type="text"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=birthday" method="post">
                <th scope="row">Doğum Tarihi</th>
                <td><span id="birthday"></span></td>
                <td><input name="birthday" type="date"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=branch" method="post">
                <th scope="row">Spor Dalı</th>
                <td><span id="branch"></span></td>
                <td><select name="branch">
                  <option value="football">Futbol</option>
                  <option value="basketball">Basketbol</option>
                  <option value="voleyball">Voleybol</option>
                  <option value="handball">Hentbol</option>
                </select></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=resume" method="post">
                <th scope="row">Özgeçmiş</th>
                <td><span id="resume"></span></td>
                <td><textarea name="resume" cols="auto" rows="3"></textarea></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=username" method="post">
                <th scope="row">Kullanıcı Adı</th>
                <td><span id="username"></span></td>
                <td><input name="username" type="text"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
              <tr>
              <form action="includes/update.inc.php?type=email" method="post">
                <th scope="row">E-Posta</th>
                <td><span id="email"></span></td>
                <td><input name="email" type="text"></td>
                <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                </form>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
  

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
<script>
  function load(){
    document.getElementById("name").innerHTML = "<?php echo $name; ?>";
    document.getElementById("surname").innerHTML= "<?php echo $surname; ?>";
    document.getElementById("tc").innerHTML = "<?php echo $tc; ?>" ;
    document.getElementById("birthday").innerHTML = "<?php echo $birthday; ?>" ;
    document.getElementById("branch").innerHTML = "<?php echo $branch; ?>" ;
    document.getElementById("username").innerHTML = "<?php echo $username; ?>" ;
    document.getElementById("email").innerHTML =  "<?php echo $email; ?>";
  }

</script>
</html>

