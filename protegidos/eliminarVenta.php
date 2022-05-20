<?php
include("recursos.php");
$operacion->eliminarVenta($_GET['cod']);

header("Location: ../aperturaCaja.php");

?>