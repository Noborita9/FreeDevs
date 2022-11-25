<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"])
) {
    check_existance_mobiliario();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function check_existance_mobiliario()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $conn->prepare("SELECT nombre FROM mobiliarios WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0) {
            $exists = 1;
        }
    }

    if ($exists == 0) {
        process_mobiliario();
    } else {
        echo "El producto ya existe";
    }
}

function process_mobiliario()
{
    include("../conexion.php");

    $stmt = $conn->prepare("INSERT INTO mobiliarios (nombre) VALUES(:nombre)");
    $stmt->bindParam(":nombre", $nombre);

    $nombre = $_POST["nombre"];

    $stmt->execute();
    echo "Producto agregado";
}
