<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"])
) {
    check_existance_ficha_tecnica();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function check_existance_ficha_tecnica()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $pdo->prepare("SELECT nombre FROM fichas_tecnicas WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0) {
            $exists = 1;
        }
    }

    if ($exists == 0) {
        process_ficha_tecnica();
    } else {
        echo "El producto ya existe";
    }
}

function process_ficha_tecnica()
{
    include("../conexion.php");

    $stmt = $pdo->prepare("INSERT INTO fichas_tecnicas (nombre) VALUES (:nombre)");
    $stmt->bindParam(":nombre", $nombre);

    $nombre = $_POST["nombre"];

    $stmt->execute();
    echo "Ficha Tecnica Agregada";
}
