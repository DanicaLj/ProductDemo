<?php
    require 'connection.php';

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $logout = $_POST['logout'];
    $sql="SELECT * FROM users WHERE username= '$username' AND password= '$password'";
    $stmt=$pdo->query($sql);
    $user=$stmt->fetch(PDO::FETCH_ASSOC);

    if($user != null){
        if($user['role'] == 1){
            $_SESSION["isAdmin"] = 1;
        }
    }

    if($logout){
        session_destroy();
    }
?>