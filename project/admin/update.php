<?php
    require_once "authenticate.php";
            
            if(isset($_GET["username"])){
                $user = $_GET["username"];
    
                require_once 'includes/dbh.inc.php';
                require_once 'includes/functions.inc.php';

                if($row = usernameExists($connection, $user, $user)){
                    $name = $row["name"];
                    $surname = $row["surname"];
                    $tc = $row["tc"];
                    $birthday = $row["birthday"];
                    $username = $row["username"];
                    $branch = $row["branch"];
                    $resume = $row["resume"];
                    $email = $row["email"];
                    $pwd = $row["password"];
                }
            }else{
                exit();
            }

    
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="load()" style="background-color:slategrey;">

    <div class="container">
        <div class="row" style="height: 50px;"></div>
        <div class="row" style="background-color: #f2f2f2; border-style: solid; margin:50px;">
            <div class="col-sm-12">
                <h1>Kullanıcıyı Güncelle</h1>
                <table class="table">
                    <tbody>
                    <tr>
                    <form action="includes/update.inc.php?type=name" method="post">
                        <th scope="row">İsim</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username1"></input></td>
                        <td><span id="name"></span></td>
                        <td><input name="name" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                    </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=surname" method="post">
                        <th scope="row">Soyisim</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username2"></input></td>
                        <td><span id="surname"></span></td>
                        <td><input name="surname" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                    </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=tc" method="post">
                        <th scope="row">TC</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username3"></input></td>
                        <td><span id="tc"></span></td>
                        <td><input name="tc" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=birthday" method="post">
                        <th scope="row">Doğum Tarihi</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username4"></input></td>
                        <td><span id="birthday"></span></td>
                        <td><input name="birthday" type="date"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=branch" method="post">
                        <th scope="row">Spor Dalı</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username5"></input></td>
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
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username6"></input></td>
                        <td><span id="resume"></span></td>
                        <td><textarea name="resume" cols="auto" rows="3"></textarea></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=username" method="post">
                        <th scope="row">Kullanıcı Adı</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username7"></input></td>
                        <td><span id="username"></span></td>
                        <td><input name="username" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    <tr>
                    <form action="includes/update.inc.php?type=email" method="post">
                        <th scope="row">E-Posta</th>
                        <td style="width: 50px;"><input style="width:50px;" type="text" name ="username" id="username8"></input></td>
                        <td><span id="email"></span></td>
                        <td><input name="email" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    </tbody>
                </table>
                <div class="col-sm-10"></div>
                <div class="col-sm-2"><a href="panel.php" class="btn btn-danger" role="button">Panel</a></button></div>
            </div>
        </div>
    </div>
    
</body>
<script>
  function load(){
    document.getElementById("name").innerText = "<?php echo $name; ?>";
    document.getElementById("surname").innerText= "<?php echo $surname; ?>";
    document.getElementById("tc").innerText = "<?php echo $tc; ?>" ;
    document.getElementById("birthday").innerText = "<?php echo $birthday; ?>" ;
    document.getElementById("branch").innerText = "<?php echo $branch; ?>" ;
    document.getElementById("username").innerText = "<?php echo $username; ?>" ;
    document.getElementById("email").innerText =  "<?php echo $email; ?>";
    document.getElementById("username1").value = "<?php echo $user ?>";
    document.getElementById("username2").value = "<?php echo $user ?>";
    document.getElementById("username3").value = "<?php echo $user ?>";
    document.getElementById("username4").value = "<?php echo $user ?>";
    document.getElementById("username5").value = "<?php echo $user ?>";
    document.getElementById("username6").value = "<?php echo $user ?>";
    document.getElementById("username7").value = "<?php echo $user ?>";
    document.getElementById("username8").value = "<?php echo $user ?>";

  }
</script>
</html>