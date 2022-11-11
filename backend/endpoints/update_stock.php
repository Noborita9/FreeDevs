<?php
if (
  isset($_POST["id"]) &&
  !empty($_POST["id"]) &&
  isset($_POST["stock"]) &&
  !empty($_POST["stock"])
) {
  check_existance_producto();
} else {
  //header("Location: ../../frontend/index.html ");
  exit();
}

function check_existance_producto()
{
  include("../conexion.php");

  $exists = 0;
  $stmt = $pdo->prepare("SELECT * FROM productos WHERE id=:id");
  $stmt->bindParam(":id", $_POST["id"]);
  $stmt->execute();
  $data = $stmt->fetchAll();

  foreach ($data as $row) {
    if (strcmp($_POST["id"], $row["id"]) == 0 && ($row["stock"] - $_POST["stock"]) >= 0 ) {
      $exists = 1;
      $stock = ($row["stock"] - $_POST["stock"]);
    }
  }

  if ($exists == 1) {
    update_product($stock);
  } else {
    echo "El producto ya existe o no tiene tanto stock";
  }
}

function update_product($stock)
{
  include("../conexion.php");

  $stmt = $pdo->prepare("UPDATE productos SET stock=:stock WHERE id=:id");
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":stock", $stock);

  $id = $_POST["id"];

  $stmt->execute();
  echo "Stock actualizado";
}
