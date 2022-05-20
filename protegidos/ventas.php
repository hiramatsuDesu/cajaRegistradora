<?php
include("recursos.php");
$codigo =  $_POST['codProd'];
$cantidad = $_POST['cant'];

$res = $producto->consultarUnProducto($codigo);
$det = $res[0]['detalle'];
$prec = $res[0]['precioUnitario'];
$cantStock = $res[0]['cantidad'];

$subTotal = $prec*$cantidad;

date_default_timezone_set('America/Argentina/Cordoba');
$fecha = date("Y/m/d");
$hora = date('H:i:s');

$id=8;

$operacion->insertarVenta($id, $codigo,$det, $prec, $fecha, $hora, $cantidad, $subTotal);

header("Location: ../aperturaCaja.php?ok");

?>