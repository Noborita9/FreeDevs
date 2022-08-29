<?php
include './IngredienteClass.php';

class FichaTecnica{
    public $nombre;
    public $ingredientes;
    public $procedimiento;

    function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    function set_ingredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }

    function set_procedimiento($procedimiento){
        $this->procedimiento = $procedimiento;
    }
    
    function get_nombre(){
        return $this->nombre;
    }
    
    function get_ingredientes(){
        return $this->ingredientes;
    }

    function get_procedimiento(){
        return $this->procedimiento;
    }
}

$ingredientes = array(array(ingrediente, cant))

?>

