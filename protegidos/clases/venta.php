<?php
class Venta{
    private $baseDatos;

    function __construct($base){
        $this->baseDatos=$base;
    }

    public function mostrarVenta(){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM ventas");
        return $resp;
    }

    public function mostrarVentaIndividualmente($id){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM ventas WHERE id_operacion=$id");
        return $resp;
    }

    public function insertarVenta($id_cajero, $id_producto, $detalle, $precioUnitario, $fecha, $hora, $cantidad, $precioTotal){
        $resp = $this->baseDatos->ejecutarQuery("INSERT INTO ventas VALUES(DEFAULT,  $id_cajero, $id_producto, '$detalle', $precioUnitario, '$fecha', '$hora', $cantidad, $precioTotal)");

        return $resp;
    }

    public function modificarVenta($ide_operacion, $cantidad, $precioTotal){
        $resp = $this->baseDatos->ejecutarQuery("UPDATE ventas SET cantidad='$cantidad', precioTotal='$precioTotal' WHERE id_operacion = '$ide_operacion'");

        return $resp;
    }

    public function eliminarVenta($id_producto){
        $resp = $this->baseDatos->ejecutarQuery("DELETE FROM ventas WHERE id_producto = '$id_producto'");

        return $resp;
    }
}

?>