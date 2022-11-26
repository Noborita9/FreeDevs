<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["info"]) &&
    empty($_POST["info"]) &&
    isset($_POST["fecha"]) &&
    !empty($_POST["fecha"])
) {
    check_existance_evento();
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function check_existance_evento()
{
    include("../conexion.php");

    $exists = 0;
    $stmt = $conn->prepare("SELECT nombre FROM eventos WHERE nombre=:nombre");
    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
        if (strcmp($_POST["nombre"], $row["nombre"]) == 0) {
            $exists = 1;
        }
    }

    if ($exists == 0) {
        proccess_evento();
    } else {
        echo "El producto ya existe";
    }
}

function proccess_evento()
{
    include("../elements/evento.php");
    $evento = new Evento();
    $evento->
}
