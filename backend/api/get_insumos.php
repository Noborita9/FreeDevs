<?php
  include("../conexion.php");
  $data = $pdo->query("SELECT * FROM insumos")->fetchAll();
  
?>

