<?php

    require_once 'connect.php';
    $page_title = $_POST['page_title'];
    $about_info = $_POST['about_info'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    mysqli_query($connect, "UPDATE `global_options` SET `page_title` = '$page_title', `about_info` = '$about_info', `facebook` = '$facebook', `twitter` = '$twitter', `linkedin` = '$linkedin', `instagram` = '$instagram', `youtube` = '$youtube', `phone` = '$phone', `email` = '$email' WHERE `global_options`.`options_id` = 1;");
    header('Location: ../administrator.php');