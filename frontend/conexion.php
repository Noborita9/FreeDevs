<?php 

$host = "127.0.0.1";
$username = "nobora";
$password = "coolpass123";
$db_name = "gestornomia";
$charset = 'utf8mb4';

try {
  $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset;port=$port";
  $conn = new \PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  echo "Conection FAILED " . $e->getMessage();
}
