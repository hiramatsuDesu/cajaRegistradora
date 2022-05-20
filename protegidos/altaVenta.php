<?php
session_start();
include("recursos.php");
$nro = $_POST['cajNro'];
if($caj->seleccionarUnCajero($nro)){
    $_SESSION['cajero'] = $nro;
    header("Location: ../aperturaCaja.php#session");
}else{
    header("Location: ../aperturaCaja.php?Error_session");
}

?>

