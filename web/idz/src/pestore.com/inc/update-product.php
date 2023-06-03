<?php

    require_once 'connect.php';
    $id = $_POST['id'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $text = $_POST['text'];
    $query = "UPDATE `products` SET `product_title` = '$title', `product_info` = '$text', `product_type` = '$type', `product_price` = '$price' WHERE `products`.`product_id` = '$id'";
    $result = mysqli_query($connect, $query);
    header('Location: ../administrator.php');