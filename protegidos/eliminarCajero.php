<?php
include("recursos.php");
$caj->borrarDatosCajero($_GET['id']);
header("Location: ../verCajeros.php");
?>