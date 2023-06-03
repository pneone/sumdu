<?php
    session_start();
    require_once 'connect.php';
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password = md5($password);
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['user_id'],
            "name" => $user['name'],
            "admin" => $user['admin']
        ];
        header('Location: ../administrator.php');
    } else {
        header('Location: ../login.php');
    }