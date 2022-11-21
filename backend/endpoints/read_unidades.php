<?php
if (
    isset($_POST["id"]) &&
    !empty($_POST["id"])
) {
    read_unidad($_POST["id"]);
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function read_unidad($id)
{
    include("../conexion.php");
    include("../elements/unidad.php");
    $unidad = new Unidad();
    $unidad->id = $id;
    if ($unidad->id == "all") {
        $unidad->select_all();
    } else {
        $unidad->select_by_id();
    }
}
