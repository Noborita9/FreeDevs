<?php
if (
    isset($_POST["item"]) &&
    !empty($_POST["item"]) &&
    isset($_POST["query"]) &&
    !empty($_POST["query"])
) {
    load_items($_POST["item"]);
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function load_items($items)
{
    include("../conexion.php");
    if (isset($_POST["query_attr"])) {
        $stmt = $conn->prepare("SELECT * FROM " . $items . " WHERE active=true AND " . $_POST["query_attr"] . " LIKE :query ;");
    } else {
        $stmt = $conn->prepare("SELECT * FROM " . $items . " WHERE active=true AND nombre LIKE :query ;");
    }
    $stmt->bindParam(":query", $_POST["query"]);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!(json_encode($data) === false)) {
        $json = json_encode(["status" => 200, "body" => $data]);
    } else {
        $json = json_encode(["status" => 400, "error" => "There are no elements"]);
    }
    echo $json;
}
