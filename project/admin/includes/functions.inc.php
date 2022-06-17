<?php

function emptyInputRegister($name, $surname, $tc, $branch, $birthday, $username, $email, $pwd, $pwdrepeat){
    if(empty($name) || empty($surname) || empty($tc) || empty($branch) || empty($birthday) || empty($username) || empty($email) ||empty($pwd) || empty($pwdrepeat)){
        return true;
    }else{
        return false;
    }
}

function emptyInputLogin($username, $pwd){
    if(empty($username) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}

function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        return true;
    }else{
        return false;
    }
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function pwdMatch($pwd, $pwdrepeat) {
    if($pwd != $pwdrepeat){
        return true;
    }else{
        return false;
    }
}

function usernameExists($connection, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
    }

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);

}

function createUser($connection, $name, $surname, $username, $tc, $branch, $email, $birthday, $pwd){
    $sql = "INSERT INTO users(username, name, surname, tc, branch, birthday, email, password) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($connection);
    $hash = hash("sha256",$pwd);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "something went wrong";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $name, $surname, $tc, $branch, $birthday, $email, $hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../panel.php");
    exit(); 
}

function updateUser($connection, $col, $value, $username){
    $sql = "UPDATE users SET ".$col."=? WHERE username=?";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $value, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function loginUser($connection, $username, $pwd){
    $usernameExist = usernameExists($connection, $username, $username );

    if($usernameExist == false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $hash = $usernameExist["password"];
    $hpwd = hash("sha256",$pwd);
    if(!pwdMatch($hash, $hpwd)){
        session_start();
        $_SESSION["username"] = $usernameExist["username"];
        header("location: ../user/home.php");
        exit();

    }else{
        header("location: ../login.php?error=wrongLogin");
        exit();  
    }

}

function loginadmin($connection, $rootname, $pwd){
    $sql = "SELECT * FROM admins WHERE rootname = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signin.php?error=stmtFailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $rootname);
        mysqli_stmt_execute($stmt);
    }

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        $hash = $row["password"];
        $hpwd = hash("sha256",$pwd);

        if(!pwdMatch($hash, $hpwd)){
            session_start();
            $_SESSION["rootname"] = $row["rootname"];
            header("location: ../panel.php");
            exit();
        }else{
            header("location: ../signin.php?error=wrongLogin");
            exit();  
        }
    }else{
        header("location: ../signin.php?error=wrongLogin");
        exit();
    }
    mysqli_stmt_close($stmt);
}

function deleteUser($connection, $username){
    $sql = "DELETE FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "something went wrong";
        return false;
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}


function getUsers($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM users;");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}


function getPosts($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM posts;");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}

function postExists($connection, $post) {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "i", $post);
        mysqli_stmt_execute($stmt);
    }

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);

}

function updatePost($connection, $col, $value, $post){
    $sql = "UPDATE posts SET ".$col."=? WHERE id=?";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "something went wrong";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $value, $post);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function deletePost($connection, $post){
    $sql = "DELETE FROM posts WHERE id=?";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "something went wrong";
        return false;
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $post);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function createPost($connection, $title, $image, $branch, $content){
    $sql = "INSERT INTO posts(title, image, branch, content) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "something went wrong";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $title, $image, $branch, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
    exit(); 
}


function getFootball($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM posts WHERE branch='Futbol';");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}

function getVoleyball($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM posts WHERE branch='Voleybol';");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}

function getBasketball($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM posts WHERE branch='Basketbol';");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}

function getHandball($connection) {
    $stmt = mysqli_prepare($connection,"SELECT * FROM posts WHERE branch='Hentbol';");

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;
    mysqli_stmt_close($stmt);
}