<?php
if (isset($_POST["item"]) && !empty($_POST["item"])) {
  load_items($_POST["item"]);
} else {
  //header("Location: ../../frontend/index.html ");
  exit();
}

function load_items($items)
{
  include("../conexion.php");
  $data = $pdo->query("SELECT * FROM " . $items . ";")->fetchAll(PDO::FETCH_ASSOC);
  if (!(json_encode($data) === false)) {
    $json = json_encode(["status" => 200, "body" => $data]);
  } else {
    $json = json_encode(["status" => 400, "error" => "There are no elements"]);
  }
  echo $json;
}
