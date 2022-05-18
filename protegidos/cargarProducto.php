<?php

include('recursos.php');

$producto->insertarProductos($_POST[detalle], $_POST['precio'], $_POST['cantidad']);

header("Location: ../index.php?ok");

?>