<?php
    require_once "authenticate.php";

    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Bütün alanları doldurunuz</p>";
        }else if($_GET["error"] == "invalidUsername"){
            echo "<p>Geçersiz kullanıcı adı</p>";
        }else if($_GET["error"] == "invalidEmail"){
            echo "<p>Geçersiz E-posta adresi</p>";
        }else if($_GET["error"] == "passwordsMatch"){
            echo "<p>Parolalar eşleşmedi</p>";
        }else if($_GET["error"] == "usernameExists"){
            echo "<p>Kullanıcı adı kullanımda</p>";
        }else if($_GET["error"] == "stmtFailed"){
            echo "<p>Birşeyler ters gitti</p>";
        }else if($_GET["error"] == "none"){
            echo '<div class="success-data" v-else><div class="text-center d-flex flex-column"> <i class="bx bxs-badge-check"></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div></div>';
        }
    }

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
        body{background: #000}
        .card{border: none;height: auto}
        .forms-inputs{position: relative}
        .forms-inputs span{position: absolute;top:-18px;left: 10px;background-color: #fff;padding: 5px 10px;font-size: 15px}
        .forms-inputs input{height: 50px;border: 2px solid #eee}
        .forms-inputs select{height: 50px;border: 2px solid #eee}
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
            <form action="includes/create.inc.php" method="post">
                    <div class="forms-inputs mb-4"> <span>İsim</span> <input name="name" autocomplete="on" type="text" class="w-100"> </div>
                    <div class="forms-inputs mb-4"> <span>Soyisim</span> <input name="surname" autocomplete="on" type="text" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>TC Kimlik No</span> <input name="id" autocomplete="off" type="text" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>Doğum Tarihi</span> <input name="birthday" autocomplete="off" type="date" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>Spor dalı</span> <select name="branch" autocomplete="off" type="date" class="w-100">
                        <option value="Futbol">Futbol</option>
                        <option value="Basketbol">Basketbol</option>
                        <option value="Voleybol">Voleybol</option>
                        <option value="Hentbol">Hentbol</option>
                    </select></div>
                    <div class="forms-inputs mb-4"> <span>Kullanıcı adı</span> <input name="username" autocomplete="off" type="text" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>E-posta</span> <input name="email" autocomplete="off" type="text" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>Şifre</span> <input name="password" autocomplete="off" type="password" class="w-100"></div>
                    <div class="forms-inputs mb-4"> <span>Şifre tekrar</span> <input name="passwordrepeat" autocomplete="off" type="password" class="w-100"></div>
                    <div class="mb-4"> <button type="submit" name="submit" class="btn btn-dark w-100">Kişi Ekle</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
