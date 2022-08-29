<?php 
    $host = "localhost";
    $username = "noborita9";
    $password = "patata";
    $db_name = "db_users"

    try {
        $conn = new PDO("mysql:host=$host;db_name=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //throw $th;
    }
?>
