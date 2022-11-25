<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["precio"]) &&
    empty($_POST["precio"]) &&
    isset($_POST["imagen"]) &&
    empty($_POST["imagen"]) &&
    isset($_POST["unidad"]) &&
    empty($_POST["unidad"]) &&
    isset($_POST["id_ficha_tecnica"]) &&
    !empty($_POST["id_ficha_tecnica"])
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
    $stmt = $conn->prepare("SELECT nombre FROM productos WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0) {
            $exists = 1;
        }
    }

    if ($exists == 0) {
        proccess_product();
    } else {
        echo "El producto ya existe";
    }
}

function proccess_product()
{
    include("../conexion.php");

    $stmt = $conn->prepare("INSERT INTO productos (nombre, unidad, precio, imagen, id_ficha_tecnica) VALUES(:nombre, :unidad, :precio, :imagen, :id_ficha_tecnica)");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":unidad", $unidad);
    $stmt->bindParam(":imagen", $imagen);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id_ficha_tecnica", $id_ficha_tecnica);

    $nombre = $_POST["nombre"];
    $unidad = $_POST["unidad"];
    $imagen = $_POST["imagen"];
    $precio = $_POST["precio"];
    $id_ficha_tecnica = $_POST["id_ficha_tecnica"];

    $stmt->execute();
    echo "Producto agregado";
}
