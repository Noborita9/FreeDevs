<?php
  include("../conexion.php");
  $data = $pdo->query("SELECT * FROM eventos")->fetchAll();
?>

