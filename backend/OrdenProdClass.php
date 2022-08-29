<?php 
class OrdenProduccion {
    public $idOrdenProd;
    public $nombre;
    public $fecha;
    public $precioTotal;
    public $productos;
    public $idEvento;

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function getIdOrdenProd() {
        return $this->idOrdenProd;
    }

    function setIdOrdenProd($idOrdenProd) {
        $this->idOrdenProd = $idOrdenProd;
    }

    function getPrecioTotal() {
        return $this->precioTotal;
    }

    function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }

    function getProductos() {
        return $this->productos;
    }

    function setProductos($productos) {
        $this->productos = $productos;
    }

}
// $neworder = new OrdenProduccion();
// $neworder->set_name("Pedro");
// echo $neworder->nombre;
?>
