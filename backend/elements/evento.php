<?php
class Evento
{
    public $id;
    public $nombre;
    public $tipo;
    public $servicio;
    public $fecha;
    public $ubicacion;
    public $linkUbicacion;
    public $cantidadPersonas;
    public $contacto;
    public $encargados;
    public $personal;
    public $mobiliario;
    public $planoLugar;
    public $menu;

    public function from_array($data)
    {
        $this->nombre = $data["nombre"];
        $this->precio = $data["precio"];
        $this->unidad = $data["unidad"];
        $this->stock = $data["stock"];
    }

    function return_as_array()
    {
        // Todo this function if its necessary 
        return array(
            'nombre' => $this->nombre,
            'id_unidad' => $this->id_unidad,
            'id' => $this->id,
        );
    }

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM eventos;";
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
        $query = "SELECT * FROM eventos WHERE id=:id;";
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
        $query = "UPDATE eventos SET active=false WHERE id=:id;";
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
            "INSERT INTO eventos (nombre, precio, stock, unidad, active)
        VALUES (:nombre, :precio, :stock, :unidad, true);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);
        $stmt->bindParam(":unidad", $unidad);
        $stmt->execute();
        echo 1;
    }

    public function update($id)
    {
        include("../conexion.php");

        $stmt = $pdo->prepare("UPDATE eventos SET nombre=:nombre unidad=:unidad stock=:stock precio=:precio WHERE id=:id");

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":unidad", $this->unidad);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Producto actualizado";
    }
}
