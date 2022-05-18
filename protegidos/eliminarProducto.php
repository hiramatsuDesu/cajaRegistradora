<?php

include("recursos.php");
$producto ->eliminarProducto($_GET['cod']);

header("Location: ../stockProductos.php");

?>