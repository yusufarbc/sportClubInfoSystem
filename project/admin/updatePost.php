<?php
    require_once "authenticate.php";
            
            if(isset($_GET["id"])){
                $post = $_GET["id"];
    
                require_once 'includes/dbh.inc.php';
                require_once 'includes/functions.inc.php';

                if($row = postExists($connection, $post)){
                    $title = $row["title"];
                    $content = $row["content"];
                    $image = $row["image"];
                    $branch = $row["branch"];
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
                <h1>İçeriği Güncelle</h1>
                <table class="table">
                    <tbody>
                    <tr>
                    <form action="includes/change.inc.php?type=title" method="post">
                        <th scope="row">Başlık</th>
                        <td style="width: 20px;"><input style="width: 20px;" type="text" name ="postname" id="postname1"></input></td>
                        <td><span id="title"></span></td>
                        <td><input name="title" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                    </form>
                    </tr>
                    <tr>
                    <form action="includes/change.inc.php?type=content" method="post">
                        <th scope="row">İçerik</th>
                        <td style="width: 20x;"><input style="width:20px;" type="text" name ="postname" id="postname2"></input></td>
                        <td><span id="content"></span></td>
                        <td><input name="content" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                    </form>
                    </tr>
                    <tr>
                    <form action="includes/change.inc.php?type=image" method="post">
                        <th scope="row">Resim</th>
                        <td style="width: 20px;"><input style="width: 20px;" type="text" name ="postname" id="postname3"></input></td>
                        <td><span id="image"></span></td>
                        <td><input name="image" type="text"></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    <tr>
                    <form action="includes/change.inc.php?type=branch" method="post">
                        <th scope="row">dal</th>
                        <td style="width: 20px;"><input style="width: 20px;" type="text" name ="postname" id="postname4"></input></td>
                        <td><span id="branch"></span></td>
                        <td><select name="branch">
                        <option value="Futbol">Futbol</option>
                        <option value="Basketbol">Basketbol</option>
                        <option value="Voleybol">Voleybol</option>
                        <option value="Hentbol">Hentbol</option>
                        </select></td>
                        <td><button type="submit" class="btn btn-primary ">Değiştir</button></td>
                        </form>
                    </tr>
                    </tbody>
                </table>
                <div class="col-sm-10"></div>
                <div class="col-sm-2"><a href="posts.php" class="btn btn-danger" role="button">Panel</a></button></div>
            </div>
        </div>
    </div>
    
</body>
<script>
  function load(){
    document.getElementById("title").innerText = "<?php echo $title; ?>";
    document.getElementById("content").innerText= "<?php echo $content; ?>";
    document.getElementById("image").innerText = "<?php echo $image; ?>" ;
    document.getElementById("branch").innerText = "<?php echo $branch; ?>" ;
    document.getElementById("postname1").value = "<?php echo $post ?>";
    document.getElementById("postname2").value = "<?php echo $post ?>";
    document.getElementById("postname3").value = "<?php echo $post ?>";
    document.getElementById("postname4").value = "<?php echo $post ?>";
  }
</script>
</html>