<?php
include './UnidadClass.php';
class Ingrediente{
    public $database_table = "ingrediente";
    public $id;
    public $nombre;
    public $unidad;
    public $tacc = False;
    public $vegano = False;
    public $mani = False;
    public $lacteo = False;

    public function from_named_array($data) {
        if (!isset($data)) {
            return false;
        }
        
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->unidad = $data["unidad"];
    }

    function alter($boolean){
        if ($boolean){
            return false;
        } else {
            return true;
        }
    }

    function return_as_array(){
        return array(
            'nombre' => $this->nombre, 
            'unidad' => $this->unidad, 
            'tacc' => $this->tacc, 
            'vegano' => $this->vegano, 
            'mani' => $this->mani, 
            'lacteo' => $this->lacteo, 
        );
    }

    function change_condition($condition){
        switch ($condition) {
            case 'tacc':
                $this->tacc = $this->alter($this->tacc);
                break;

            case 'vegano':
                $this->vegano = $this->alter($this->vegano);
                break;

            case 'mani':
                $this->mani = $this->alter($this->mani);
                break;

            case 'lacteo':
                $this->lacteo = $this->alter($this->lacteo);
                break;
            default:
                return false;
                break;
        }
        return true;
    }

    function get_insert_query(){
        $query = "INSERT INTO " . 
    }
}
?>
