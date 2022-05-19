<?php

include('recursos.php');

$caj->insertarCajero($_POST['nombre'], $_POST['apellido']);

header("Location: ../index.php?ok");

?>