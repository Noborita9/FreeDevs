<?php
class Usuario
{

    public $username;
    public $password;
    public $role;

    public function from_array($data)
    {
        try {
            $this->username = $data["username"];
            $this->password = $data["password"];
            $this->role = $data["role"];
        } catch (Throwable $th) {
        }
    }

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM usuarios;";
        $data = $conn->query($query)->fetchAll();
        if (!(json_encode($data) === false)) {
            $json = json_encode(["status" => 200, "body" => $data]);
        } else {
            $json = json_encode(["status" => 404, "error" => "There are no elements"]);
        }
        echo $json;
    }

    public function select_by_id()
    {
        include("../conexion.php");
        $query = "SELECT * FROM unidades WHERE id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $query = "DELETE FROM unidades where id=:id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        // Change to check if its ok
        echo 1;
    }

    public function insert()
    {
        include("../conexion.php");
        $query = "INSERT INTO unidades (nombre) VALUES (:nombre);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
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
