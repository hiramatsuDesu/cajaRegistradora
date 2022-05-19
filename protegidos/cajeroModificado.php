<?php
include("recursos.php");

$caj->modificarDatosCajero($_POST['nroCajero'], $_POST['nombre'], $_POST['apellido']);

header("Location: ../verCajeros.php");
?>