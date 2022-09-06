<?php
  if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["unidad"]) && (!empty($_POST["unidad"]) || strcmp($_POST["unidad"], "0")) && isset($_POST["stock"]) && !empty($_POST["stock"])) {proccess_insumo();}else {
    //header("Location: ../../frontend/index.html ");
    exit();
  }
  function proccess_insumo(){
    include("../conexion.php");
    
    $stmt = $pdo->prepare("INSERT INTO insumos (nombre, unidad, stock) VALUES(:nombre, :unidad, :stock)");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":unidad", $unidad);
    $stmt->bindParam(":stock", $stock);

    $nombre = $_POST["nombre"];
    $unidad = $_POST["unidad"];
    $stock = $_POST["stock"];

    $stmt->execute();

  }

?>
