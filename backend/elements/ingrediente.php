<?php
class Ingrediente
{
    public $database_table = "ingrediente";
    public $id;
    public $nombre;
    public $id_unidad;

    public function from_named_array($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->id_unidad = $data["id_unidad"];
    }

    function return_as_array()
    {
        return array(
            'nombre' => $this->nombre,
            'id_unidad' => $this->id_unidad,
            'id' => $this->id,
        );
    }

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM ingredientes;";
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
        $query = "SELECT * FROM ingredientes WHERE id=:id;";
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
        $query = "DELETE FROM ingredientes where id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }

    public function insert($nombre)
    {
        include("../conexion.php");
        $query = "INSERT INTO ingredientes (nombre) VALUES (:nombre);";
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
}
