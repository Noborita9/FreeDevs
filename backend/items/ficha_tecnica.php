<?php
include './IngredienteClass.php';

class FichaTecnica{
    public $nombre;
    public $ingredientes;
    public $procedimiento;
    public $comentarios;

    function constructor($nombre, $ingredientes, $procedimiento, $comentarios){
        $this->nombre = $nombre;
        $this->ingredientes = $ingredientes;
        $this->procedimiento = $procedimiento;
        $this->comentarios = $comentarios;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    function getIngredientes(){
        return $this->ingredientes;
    }

    function setIngredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }

    function getProcedimiento(){
        return $this->procedimiento;
    }

    function setProcedimiento($procedimiento){
        $this->procedimiento = $procedimiento;
    }

    function getComentarios(){
        return $this->comentarios;
    }

    function setComentarios($comentarios){
        $this->comentarios = $comentarios;
    }
}

?>
