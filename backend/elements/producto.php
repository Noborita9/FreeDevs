<?php
class Producto
{
    public $id;
    public $nombre;
    public $imagen; // String
    public $id_ficha_tecnica;
    public $stock;
    public $precio;
    public $unidad;

    public function from_array($data)
    {
        $this->nombre = $data["nombre"];
        $this->precio = $data["precio"];
        $this->unidad = $data["unidad"];
        $this->stock = $data["stock"];
        $this->id_ficha_tecnica = $data["id_ficha_tecnica"];
        $this->imagen = $data["imagen"];
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

    public function delete_by_id()
    {
        include("../conexion.php");
        $query = "UPDATE ingredientes SET active=false WHERE id=:id;";
        // $query = "DELETE FROM {table} WHERE id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }

    public function insert()
    {
        include("../conexion.php");
        $query = 
        "INSERT INTO productos (nombre, precio, stock, unidad, id_ficha_tecnica, imagen, active)
        VALUES (:nombre, :precio, :stock, :unidad, :id_ficha_tecnica, :imagen, true);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);
        $stmt->bindParam(":unidad", $unidad);
        $stmt->bindParam(":id_ficha_tecnica", $id_ficha_tecnica);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->execute();
        echo 1;
    }
}
