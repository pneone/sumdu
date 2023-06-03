<?php

    require_once 'connect.php';
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_pass'];
    $password = md5($password);
    mysqli_query($connect, "INSERT INTO `users` (`user_id`, `name`, `email`, `pass`, `admin`) VALUES (NULL, '$name', '$email', '$password', NULL);");
    header('Location: ../login.php');

?>
