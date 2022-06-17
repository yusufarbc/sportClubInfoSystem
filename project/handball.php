<?php 
  include_once "header.php";
  require_once "admin/includes/dbh.inc.php";
  require_once "admin/includes/functions.inc.php";
  $posts = getHandball($connection);
?>

<div class="jumbotron" style="background-image: url('images/handball.png');">
  <div class="container text-center">
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <h3>Çalışmalarımız</h3><br>
  <div class="row">
  <?php 
    while($row = mysqli_fetch_array($posts)){
      echo '  
      <div class="col-sm-3">
      <h4>'.$row["title"].'</h4>
      <img src="'.$row["image"].'" class="img-responsive" style="width:100%" alt="Image">
      <p>'.$row["content"].'</p>
      </div>';
    }
    ?>
  </div>
</div><br>
<br><br>
<?php 
  include_once "footer.php";
?>