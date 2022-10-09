<?php
if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["role"]) && !empty($_POST["role"])) {check_user_exists();}else {
  //header("Location: ../../frontend/index.html ");
  exit();
}
function check_user_exists() {
  include("../conexion.php");
  $stmt = $pdo->prepare("SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?;");
  $stmt->execute($_POST["usuario"]);
  $data = $stmt->fetchAll();
  if (!empty($data)) {
    echo "Does not exists";
    exit();
  }
  /* foreach ($data as $row) { */
  /*   if (strcmp($_POST["usuario"], $row["nombre_usuario"] == 0)){ */
  /*     echo "User Already Exists"; */
  /*     exit(); */
  /*   } */
  /* } */
  create_user();
}

function create_user() {
  include("../conexion.php");
  $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, role) VALUES (:username, :password, :role)");
  $stmt->bindParam(":username", $_POST["usuario"]);
  $stmt->bindParam(":password", $_POST["password"]);
  $stmt->bindParam(":role", $_POST["role"]);
  $stmt->execute();
}
