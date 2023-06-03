<?php
$connect = mysqli_connect('localhost', 'root', '', 'pestore' );

if (!$connect) {
    die('Помилка підключення до бази даних!');
}