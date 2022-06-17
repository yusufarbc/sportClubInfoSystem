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
    <title>delete</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="load()" style="background-color:slategrey;">

    <div class="container">
        <div class="row" style="height: 50px;"></div>
        <div class="row" style="background-color: #f2f2f2; border-style: solid; margin:50px;">
            <div class="col-sm-12">
                <h1>Kullanıcıyı Sil</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">İsim</th>
                        <td><span id="name"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Soyisim</th>
                        <td><span id="surname"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">TC</th>
                        <td><span id="tc"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Doğum Tarihi</th>
                        <td><span id="birthday"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Spor Dalı</th>
                        <td><span id="branch"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Özgeçmiş</th>
                        <td><span id="resume"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Kullanıcı Adı</th>
                        <td><span id="username"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">E-Posta</th>
                        <td><span id="email"></span></td>
                    </tr>
                    </tbody>
                </table>
                <?php echo '<div class="col-sm-2"><a href="includes/delete.inc.php?username='.$username.'" class="btn btn-danger" role="button">Sil</a></button></div>'?>
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
    document.getElementById("resume").innerText = "<?php echo $resume; ?>" ;
    document.getElementById("username").innerText = "<?php echo $username; ?>" ;
    document.getElementById("email").innerText =  "<?php echo $email; ?>";
  }
</script>
</html>