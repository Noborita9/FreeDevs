<?php
class Ingrediente
{
    public $id;
    public $nombre;
    public $precio;
    public $unidad;
    public $stock;

    public function transformer()
    {
        if ($this->unidad == "Kg" || $this->unidad == "L") {
            $this->stock = $this->stock * 1000;
        }
    }

    public function weight_changer($new_unit)
    {
        echo "new unit ". $new_unit;
        echo "this unit ". $this->unidad;
        if ($new_unit == 2 && $this->unidad == "Kg") {
            $this->stock = $this->stock / 1000;
        } elseif ($new_unit == 1 && $this->unidad == "Gr") {
            $this->stock = $this->stock * 1000;
        } elseif ($new_unit == 4 && $this->unidad == "L") {
            $this->stock = $this->stock / 1000;
        } elseif ($new_unit == 3 && $this->unidad == "Ml") {
            $this->stock = $this->stock * 1000;
        }
    }

    public function from_array($data)
    {
        $this->nombre = $data["nombre"];
        $this->precio = $data["precio"];
        $this->unidad = $data["unidad"];
        $this->stock = $data["stock"];
        $this->transformer();
    }

    function return_as_array()
    {
        return array(
            'nombre' => $this->nombre,
            'id_unidad' => $this->id_unidad,
            'id' => $this->id,
        );
    }

    public $units = array(
        "Kg" => 1,
        "Gr" => 2,
        "L" => 3,
        "Ml" => 4,
        "Unidad" => 5,
        "Entera" => 6,
        "Media" => 7,
        "Cuarto" => 8,
    );

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM insumos;";
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
        $query = "SELECT * FROM insumos WHERE id=:id;";
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
        $query = "UPDATE insumos SET active=0 WHERE id=:id;";
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
            "INSERT INTO insumos (nombre, precio, stock, unidad)
        VALUES (:nombre, :precio, :stock, :unidad);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":unidad", $this->units[$this->unidad]);
        $stmt->execute();
        echo 1;
    }

    public function update($update_stock, $old_unit)
    {
        include("../conexion.php");
        if ($update_stock) {
            $this->weight_changer($old_unit);
        }
        $stmt = $conn->prepare("UPDATE insumos SET nombre=:nombre, unidad=:unidad, stock=:stock, precio=:precio WHERE id=:id");
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":unidad", $this->units[$this->unidad]);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        echo "Producto actualizado";
    }
}
