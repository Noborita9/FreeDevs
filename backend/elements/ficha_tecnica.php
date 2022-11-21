<?php
include './IngredienteClass.php';

class FichaTecnica
{
    public $nombre;
    public $ingredientes;
    public $procedimiento;
    public $comentarios;

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM fichas_tecnica;";
        $data = $conn->query($query)->fetchAll();
        if (!(json_encode($data) === false)) {
            $json = json_encode(["status" => 200, "body" => $data]);
        } else {
            $json = json_encode(["status" => 404, "error" => "There are no elements"]);
        }
        echo $json;
    }

    public function select_by_id($id)
    {
        include("../conexion.php");
        $query = "SELECT * FROM fichas_tecnica WHERE id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        if (!(json_encode($data) === false)) {
            $json = json_encode(["status" => 200, "body" => $data]);
        } else {
            $json = json_encode(["status" => 404, "error" => "There are no elements"]);
        }
        echo $json;
    }

    public function delete_by_id($id)
    {
        include("../conexion.php");
        $query = "DELETE FROM fichas_tecnica where id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }

    public function insert($nombre)
    {
        // Work on this values for each element
        include("../conexion.php");
        $query = "INSERT INTO fichas_tecnica (nombre) VALUES (:nombre);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
        /* $data = $stmt->fetchAll(); */
        /* if (!(json_encode($data) === false)) { */
        /*     $json = json_encode(["status" => 200, "body" => $data]); */
        /* } else { */
        /*     $json = json_encode(["status" => 404, "error" => "There are no elements"]); */
        /* } */
        /* echo $json; */
    }

    public function insert_ingredient()
    {
        include("../conexion.php");
        $query = "INSERT INTO ingred_por_ficha (nombre) VALUES (:nombre);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }
    public function delete_ingredient_by_id($id)
    {
        include("../conexion.php");
        $query = "DELETE FROM ingred_por_ficha where id_ingrediente=:id_ingrediente;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }
}
