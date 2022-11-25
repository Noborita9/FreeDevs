<?php
class OrdenProduccion
{
    public $id;
    public $nombre;
    public $fecha;
    public $precioTotal;
    public $productos;
    public $idEvento;

    public function from_array($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->fecha = $data["fecha"];
        $this->precioTotal = $data["precioTotal"];
        $this->productos = $data["productos"];
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
        $query = "SELECT * FROM prod_orden;";
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
        $query = "SELECT * FROM prod_orden WHERE id=:id;";
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
        $query = "UPDATE prod_orden SET active=false WHERE id=:id;";
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
            "INSERT INTO prod_orden (nombre, precio, stock, unidad, active)
        VALUES (:nombre, :precio, :stock, :unidad, true);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":unidad", $this->unidad);
        $stmt->execute();
        echo 1;
    }

    public function update($id)
    {
        include("../conexion.php");

        $stmt = $pdo->prepare("UPDATE prod_orden SET nombre=:nombre unidad=:unidad stock=:stock precio=:precio WHERE id=:id");

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":unidad", $this->unidad);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Producto actualizado";
    }
}
