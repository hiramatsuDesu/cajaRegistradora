<?php
include("recursos.php");
$producto->modificarProducto($_POST['codigo'], $_POST['detalle'], $_POST['precio'], $_POST['cantidad']);

header("Location: ../stockProductos.php");

?>