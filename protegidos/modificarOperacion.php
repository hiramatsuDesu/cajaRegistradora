<?php
include("recursos.php");

$op = $_POST['codigoOp'];
$traerProducto = $operacion->mostrarVentaIndividualmente($op);
$cant = $_POST['cantidad'];
$precioUnidad = $traerProducto[0]['precioUnitario'];
$subTotal = $precioUnidad*$cant;

$operacion->modificarVenta($op, $cant, $subTotal);

header("Location: ../aperturaCaja.php")

?>