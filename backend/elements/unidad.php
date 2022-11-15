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

    public function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
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
        return $json;
    }

    public function change_unit()
    {
        // TODO
    }
}
