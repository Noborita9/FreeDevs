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

    function insert()
    {
        $query = "INSERT INTO ingredientes (id, nombre, id_unidad, activo)";
    }
}
