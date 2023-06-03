<?php

    require_once 'connect.php';

    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $text = $_POST['text'];

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image']['tmp_name'];
        $imageData = addslashes(file_get_contents($tmpName));

        mysqli_query($connect, "INSERT INTO `products` (`product_id`, `product_title`, `product_info`, `product_type`, `product_price`, `product_image`) VALUES (NULL, '$title', '$text', '$type', '$price', '$imageData');");
    }

    header('Location: ../administrator.php');
    

