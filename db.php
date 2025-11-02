<?php
$servername = "db";
$username = "root";
$password = "eve@123";
$db_name = "web_app_db";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die('Error:' . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $db_name";

if (!mysqli_query($link, $sql)){
    echo "Error to create DB!";
}
mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $db_name);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";

if (!mysqli_query($link, $sql)){
    echo "Error to create table 'users'!";
}

mysqli_close($link);
?>