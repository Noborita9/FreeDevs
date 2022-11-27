<?php
if (
    isset($_POST["nombre"]) &&
    !empty($_POST["nombre"])
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
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id=:id");
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if (!empty($data)) {
        $exists = 1;
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
    $stmt = $conn->prepare("INSERT INTO productos (nombre,  imagen, description, comment) VALUES(:nombre, :imagen, :description, :comment) RETURNING id;");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":comment", $comment);
    $stmt->bindParam(":imagen", $imagen);
    $stmt->bindParam(":description", $description);

    $nombre = $_POST["nombre"];
    $comment = $_POST["comment"];
    $imagen = $_FILES["img_prod"]["name"];
    $description = $_POST["procedimiento"];

    $stmt->execute();
    $file_name = $_FILES["img_prod"]["name"];
    $target = "../imgs/";
    $file_target = $target . $file_name;
    $temp_file_name = $_FILES["img_prod"]["tmp_name"];

    $result = move_uploaded_file($temp_file_name, $file_target);

    $data = $stmt->fetch();
    $id = $data[0];
    // product_per_unity
    $ingredients = json_decode($_POST["ingredientes"], true);
    foreach ($ingredients as $ingred) {
        $stmt = $conn->prepare("INSERT INTO ingred_por_prod (id_producto, id_ingrediente, cantidad) VALUES(:id_producto, :id_ingrediente, :cantidad);");
        $stmt->bindParam(":id_producto", $id);
        $stmt->bindParam(":id_ingrediente", $ingred["id"]);
        $stmt->bindParam(":cantidad", $ingred["stock"]);
        $stmt->execute();
    }

    $unidades = json_decode($_POST["unidades"], true);
    var_dump($unidades);
    foreach ($unidades as $unidad) {
        $stmt = $conn->prepare("INSERT INTO product_per_unity (id_producto, precio, unidad, stock) VALUES(:id_producto, :precio, :unidad, :stock);");
        $stmt->bindParam(":id_producto", $id);
        $stmt->bindParam(":stock", $unidad["stock"]);
        $stmt->bindParam(":unidad", $unidad["unidad"]);
        $stmt->bindParam(":precio", $unidad["precio"]);
        $stmt->execute();
    }
    echo "Producto agregado";
}
