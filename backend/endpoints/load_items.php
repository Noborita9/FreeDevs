<?php
if (isset($_POST["item"]) && !empty($_POST["item"])) {
    load_items($_POST["item"]);
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function load_items($items)
{
    include("../conexion.php");
    if ($_POST["searching"] == true && $_POST["market"] == 1) {
        $query = $_POST["query_string"];
        $data = $conn->query("SELECT * FROM " . $items . " JOIN product_per_unity ON productos.id=product_per_unity.id_producto WHERE productos.active=true AND " . $query . " ;")->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($_POST["market"] == 1) {
        $query = $_POST["query_string"];
        $data = $conn->query("SELECT * FROM " . $items . " JOIN product_per_unity ON productos.id=product_per_unity.id_producto WHERE productos.active=true;")->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($_POST["searching"] == true) {
        $query = $_POST["query_string"];
        $data = $conn->query("SELECT * FROM " . $items . " WHERE active=true AND ". $query . ";")->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $data = $conn->query("SELECT * FROM " . $items . " WHERE active=true;")->fetchAll(PDO::FETCH_ASSOC);
    }
    if (!(json_encode($data) === false)) {
        $json = json_encode(["status" => 200, "body" => $data]);
    } else {
        $json = json_encode(["status" => 400, "error" => "There are no elements"]);
    }
    echo $json;
}
