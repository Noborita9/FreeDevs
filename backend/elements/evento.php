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
    public $moviliario;
    public $planoLugar;
    public $menu;

    public function select_all()
    {
        include("../conexion.php");
        $query = "SELECT * FROM eventos;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        // Look for executing and reading result
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
        return $json;
        // Look for executing and reading result
    }
}
