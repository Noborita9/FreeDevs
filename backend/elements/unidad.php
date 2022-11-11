<?php
include("../conexion.php");
class Unidad{
    public $id;
    public $nombre;

    public function from_array($data){
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function get_nombre(){
        return $this->nombre;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function insert() {
        $query = "INSERT INTO unidad (id, nombre) VALUES (:id, :nombre);";

    }
}
