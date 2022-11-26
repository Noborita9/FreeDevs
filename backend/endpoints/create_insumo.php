<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["stock"]) &&
    !empty($_POST["stock"]) &&
    isset($_POST["precio"]) &&
    !empty($_POST["precio"]) &&
    (!empty($_POST["unidad"]) || strcmp($_POST["unidad"], "0"))
) {
    check_existance_insumo();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}
$units = array(
    "Kg" => 1,
    "Gr" => 2,
    "L" => 3,
    "Ml" => 4,
    "Unidad" => 5,
    "Entera" => 6,
    "Media" => 7,
    "Cuarto" => 8,
);

function check_existance_insumo()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $conn->prepare("SELECT * FROM insumos WHERE id=:id;");
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if (!empty($data)) {
        $exists = 1;
    }

    foreach ($data as $row) {
        if ($row["unidad"] != $units[$_POST["unidad"]]) {
            $update_unidad = true;
        }
    }

    if (isset($_POST["id"]) && $exists == 1) {
        update_insumo($update_unidad, $data[0]["unidad"]);
    } elseif ($exists == 0) {
        proccess_insumo();
    } else {
        echo 0;
    }
}

function update_insumo($update_unidad, $old_unit)
{
    include("../elements/ingrediente.php");
    $insumo = new Ingrediente();
    $insumo->from_array($_POST);
    $insumo->id = $_POST["id"];
    $insumo->update($update_unidad, $old_unit);
}

function proccess_insumo()
{
    include("../elements/ingrediente.php");
    $insumo = new Ingrediente();
    $insumo->from_array($_POST);
    $insumo->insert();
}
