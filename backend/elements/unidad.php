<?php
class Unidad
{
    // The default unit will be milliliter or grams
    public $id;
    public $nombre;

    public function from_array($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
    }

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM unidades;";
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
        $query = "SELECT * FROM unidades WHERE id=:id;";
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
        $query = "DELETE FROM unidades where id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }

    public function insert($nombre)
    {
        include("../conexion.php");
        $query = "INSERT INTO unidades (nombre) VALUES (:nombre);";
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

    public function change_unit()
    {
        // TODO
    }
}
