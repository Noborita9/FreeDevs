<?php
if (
  isset($_POST["nombre"]) &&
  !empty($_POST["nombre"]) &&
  isset($_POST["id_evento"]) &&
  !empty($_POST["id_evento"])
) {
  check_existance_evento();
} else {
  //header("Location: ../../frontend/index.html ");
  exit();
}

function check_existance_evento()
{
  include("../conexion.php");

  $exists = 0;
  $stmt = $pdo->prepare("SELECT nombre FROM eventos WHERE nombre=:nombre");
  $stmt->bindParam(":nombre", $_POST["nombre"]);
  $stmt->execute();
  $data = $stmt->fetchAll();

  foreach ($data as $row) {
    if (strcmp($_POST["nombre"], $row["nombre"]) == 0) {
      $exists = 1;
    }
  }

  if ($exists == 0) {
    remove_evento();
  } else {
    echo "El producto ya existe";
  }
}

function remove_evento()
{
  include("../conexion.php");

  $stmt = $pdo->prepare("INSERT INTO eventos (nombre, unidad, stock, precio) VALUES(:nombre, :unidad, :stock, :precio)");
  $stmt->bindParam(":nombre", $nombre);
  $stmt->bindParam(":unidad", $unidad);
  $stmt->bindParam(":stock", $stock);
  $stmt->bindParam(":precio", $precio);

  $nombre = $_POST["nombre"];
  $unidad = $_POST["unidad"];
  $stock = $_POST["stock"];
  $precio = $_POST["precio"];

  $stmt->execute();
  echo "Producto agregado";
}
