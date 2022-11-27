<?php
if (
    isset($_POST["id"]) &&
    !empty($_POST["id"]) &&
    isset($_POST["stock"]) &&
    !empty($_POST["stock"])
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
    $stmt = $conn->prepare("SELECT * FROM product_per_unity WHERE id=:id;");
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
    $data = $stmt->fetchAll();

    if (!empty($data)) {
        $exists = 1;
    }
    if (($data[0]["stock"] - $_POST["stock"]) >= 0) {
        $stock = ($data[0]["stock"] - $_POST["stock"]);
    }
    echo "stock". $stock;

    if ($exists == 1) {
        update_product($stock);
    } else {
        echo "El producto no existe o no tiene tanto stock";
    }
}

function update_product($stock)
{
    include("../conexion.php");

    $stmt = $conn->prepare("UPDATE product_per_unity SET stock=:stock WHERE id=:id and active=true;");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":stock", $stock);
    $id = $_POST["id"];

    $stmt->execute();
    echo "Stock actualizado";
}
