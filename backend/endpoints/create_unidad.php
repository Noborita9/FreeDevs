<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"])
) {
    check_existance_unidad();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function check_existance_unidad()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $conn->prepare("SELECT nombre FROM unidades WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0 && strcmp($_POST["unidad"], $row["unidad"]) == 0) {
            $exists = 1;
        }
    }
    if ($exists == 0 && $_POST["update"] == true) {
        create_unidad();
    }
}

function create_unidad()
{
    include("../conexion.php");
    include("../elements/unidad.php");
    try {
        $unidad = new Unidad();
        $unidad->from_array($_POST);
        $unidad->insert();
        echo 1;
    } catch (\Throwable $th) {
        //throw $th;
    }
}
