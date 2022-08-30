<?php
class Unidad{
    public $unidad;

    function constructor($unidad){
      $this->setUnidad($unidad)
    }

    function getUnidad(){
        return $this->unidad;
    }

    function setUnidad($unidad){
        $enum = array(
            "kg" => "kilogramo",
            "gr" => "gramo",
            "mg" => "miligramo",
            "lt" => "litro",
            "ml" => "mililitro",
        );

        if (array_key_exists($unidad, $enum)) {
            $this->unidad = $enum[$unidad];
            return True; } 
    }

}
?>
