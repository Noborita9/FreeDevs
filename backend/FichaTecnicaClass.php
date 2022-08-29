<?php
include './IngredienteClass.php';

class FichaTecnica{
    public $nombre;
    public $ingredientes;
    public $procedimiento;
    public $comentarios;

    function get_nombre(){
        return $this->nombre;
    }

    function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    
    function get_ingredientes(){
        return $this->ingredientes;
    }

    function set_ingredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }

    function get_procedimiento(){
        return $this->procedimiento;
    }

    function set_procedimiento($procedimiento){
        $this->procedimiento = $procedimiento;
    }

    function getComentarios(){
        return $this->comentarios;
    }

    function setComentarios(){
        $this->comentarios = comentarios;
    }
}

?>

