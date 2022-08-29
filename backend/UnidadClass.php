<?php
class Unidad{
    public $unidad;

    function get_unidad(){
        return $this->unidad;
    }

    function set_unidad($unidad){
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

    function transformer($ac_unit, $new_unit, $diff, $dir){
        $posible = $this->set_unidad($new_unit);
        if ($posible){
            $mul = 1000;
            for ($i=1; $i <= $diff; $i++) { 
                $mul = $mul * 1000;
                echo $mul."\n";
            }
            if ($dir == "DOWN"){
                $mul = $mul * -1;
            }
            echo $mul;
            return function ($number){return $number * $mul;};
        }
        else{
            return "FAIL";
        }
    }
}

$cantida = 1.2;
$unidad = new Unidad();
$unidad->set_unidad("kg");
$mult = $unidad->transformer("kg", "mg", 2, "DOWN");
echo $mult($cantida)
?>
