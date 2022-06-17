<?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Bütün alanları doldurunuz</p>";
            }else if($_GET["error"] == "wrongLogin"){
                echo "<p>Hatalı Giriş</p>";
            }else if($_GET["error"] == "none"){
                echo '<div class="success-data" v-else><div class="text-center d-flex flex-column"> <i class="bx bxs-badge-check"></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div></div>';
            }
        }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <style>
        body{background: #000}
        .card{border: none;height: 400px}
        .forms-inputs{position: relative}
        .forms-inputs span{position: absolute;top:-18px;left: 10px;background-color: #fff;padding: 5px 10px;font-size: 15px}
        .forms-inputs input{height: 50px;border: 2px solid #eee}
        .forms-inputs input:focus{box-shadow: none;outline: none;border: 2px solid #000}
        .btn{height: 50px}
        .success-data{display: flex;flex-direction: column}
        .bxs-badge-check{font-size: 90px}
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
                <div class="form-data" v-if="!submitted">
                <form action="includes/signin.inc.php" method="post">
                    <div class="mb-4"><h1>Admin Login</h1></div>
                    <div class="forms-inputs mb-4"> <span>Kullanıcı adı</span> <input name="username" autocomplete="off" type="text" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>Şifre</span> <input name="password" autocomplete="off" type="password" class="w-100"></div>
                    <div class="mb-3"> <button type="submit" name="submit" class="btn btn-dark w-100">Giriş yap</button> </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>