<?php

    require_once 'connect.php';
    $id = $_POST['id'];
    mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`product_id` = '$id'");
    header('Location: ../administrator.php');