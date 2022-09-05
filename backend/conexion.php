<?php 
    $host = "localhost";
    $username = "nobora";
    $password = "mariaD8";
    $db_name = "gestornomia"

    try {
        $conn = new PDO("mysql:host=$host;db_name=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //throw $th;
    }
?>
