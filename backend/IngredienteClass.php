<?php
include './UnidadClass.php';
class Ingrediente{
    public $nombre;
    public $unidad;
    public $tacc = False;
    public $vegano = False;
    public $mani = False;
    public $lacteo = False;

    function get_name(){
        return $this->nombre;
    }
    
    function set_name($nombre){
        $this->nombre = $nombre; 
    }

    function get_unidad(){
        return $this->unidad;
    }
    function set_unidad($unidad){
        $this->unidad = $unidad;
    }

    function get_tacc(){
        return $this->tacc;
    }
    function change_tacc(){
        if ($this->tacc){
            $this->tacc = False;
        } else {
            $this->tacc = True;
        }
    }

    function get_vegano(){
        return $this->vegano;
    }
    function change_vegano(){
        if ($this->vegano){
            $this->vegano = False;
        } else {
            $this->vegano = True;
        }
    }

    function get_mani(){
        return $this->mani;
    }
    function change_mani(){
        if ($this->mani){
            $this->mani = False;
        } else {
            $this->mani = True;
        }
    }

    function get_lacteo(){
        return $this->lacteo;
    }
    function change_lacteo(){
        if ($this->lacteo){
            $this->lacteo = False;
        } else {
            $this->lacteo = True;
        }
    }
}
?>
