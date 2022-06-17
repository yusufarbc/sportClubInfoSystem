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
                <h1>İçeriği Sil</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Başlık</th>
                        <td><span id="title"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">İçerik</th>
                        <td><span id="content"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Resim</th>
                        <td><span id="image"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Spor Dalı</th>
                        <td><span id="branch"></span></td>
                    </tr>
                    </tbody>
                </table>
                <?php echo '<div class="col-sm-2"><a href="includes/remove.inc.php?id='.$post.'" class="btn btn-danger" role="button">Sil</a></button></div>'?>
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
  }
</script>
</html>