<?php 
class OrdenProduccion {
    public $nombre;
    public $fecha;

    function set_name($nombre) {
        $this->nombre = $nombre;
    }

    function get_name() {
        return $this->nombre;
    }

    function set_fecha($fecha) {
        $this->fecha = $fecha;
    }

    function get_fecha() {
        return $this->fecha;
    }
}
// $neworder = new OrdenProduccion();
// $neworder->set_name("Pedro");
// echo $neworder->nombre;
?>
