<?php
include './UnidadClass.php';
class Ingrediente{
    public $nombre;
    public $unidad;
    public $tacc = False;
    public $vegano = False;
    public $mani = False;
    public $lacteo = False;

    function getNombre(){
        return $this->nombre;
    }
    
    function setNombre($nombre){
        $this->nombre = $nombre; 
    }

    function getUnidad(){
        return $this->unidad;
    }
    function setUnidad($unidad){
        $this->unidad = $unidad;
    }

    function getTacc(){
        return $this->tacc;
    }
    function changeTacc(){
        if ($this->tacc){
            $this->tacc = False;
        } else {
            $this->tacc = True;
        }
    }

    function getVegano(){
        return $this->vegano;
    }
    function changeVegano(){
        if ($this->vegano){
            $this->vegano = False;
        } else {
            $this->vegano = True;
        }
    }

    function getMani(){
        return $this->mani;
    }
    function changeMani(){
        if ($this->mani){
            $this->mani = False;
        } else {
            $this->mani = True;
        }
    }

    function getLacteo(){
        return $this->lacteo;
    }
    function changeLacteo(){
        if ($this->lacteo){
            $this->lacteo = False;
        } else {
            $this->lacteo = True;
        }
    }
}
?>
