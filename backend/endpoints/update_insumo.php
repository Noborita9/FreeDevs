<?php
if (
    isset($_POST["id"]) &&
    !empty($_POST["id"]) &&
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["stock"]) &&
    !empty($_POST["stock"]) &&
    isset($_POST["precio"]) &&
    !empty($_POST["precio"]) &&
    isset($_POST["unidad"]) &&
    (!empty($_POST["unidad"]) || strcmp($_POST["unidad"], "0"))
) {
    check_existance_insumo();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function check_existance_insumo()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $conn->prepare("SELECT nombre, unidad FROM ingredientes WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0 && strcmp($_POST["unidad"], $row["unidad"]) == 0) {
            $exists = 1;
        }
    }
    if ($exists == 0 && $_POST["update"] == true) {
        proccess_insumo();
    } else {
        echo 0;
    }
}

function update_insumo()
{
    include("../conexion.php");

    $stmt = $conn->prepare("UPDATE insumos SET nombre=:nombre unidad=:unidad stock=:stock precio=:precio WHERE id=:id");

    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":unidad", $unidad);
    $stmt->bindParam(":stock", $stock);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id", $id);

    $nombre = $_POST["nombre"];
    $unidad = $_POST["unidad"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    $id = $_POST["id"];

    $stmt->execute();
    echo "Producto actualizado";
}

function proccess_insumo()
{
    include("../elements/ingrediente.php");
    $insumo = new Ingrediente();
    $insumo->from_array($_POST);
    $insumo->insert();
}
