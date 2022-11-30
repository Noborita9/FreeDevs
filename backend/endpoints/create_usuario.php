<?php
if (isset($_POST["nombre"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["password"]) &&
    isset($_POST["rol"]) &&
    !empty($_POST["rol"])) {
    check_user_exists();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}
function check_user_exists()
{
    include("../conexion.php");
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id;");
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if (!empty($data)) {
        update_user();
    }
    create_user();
}

function update_user()
{
    include("../conexion.php");
    $stmt = $conn->prepare("UPDATE usuarios set username = :username, passwd = :passwd rol, :rol WHERE id=:id)");
    $stmt->bindParam(":username", $_POST["nombre"]);
    $stmt->bindParam(":passwd", $_POST["password"]);
    $stmt->bindParam(":rol", $_POST["rol"]);
    $stmt->execute();
    echo 1;
}

function create_user()
{
    include("../conexion.php");
    $stmt = $conn->prepare("INSERT INTO usuarios (username, passwd, rol) VALUES (:username, :passwd, :rol)");
    $stmt->bindParam(":username", $_POST["nombre"]);
    $stmt->bindParam(":passwd", $_POST["password"]);
    $stmt->bindParam(":rol", $_POST["rol"]);
    $stmt->execute();
    echo 1;
}
