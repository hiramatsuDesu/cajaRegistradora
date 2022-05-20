<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo.css">
   
    <title>Caja registradora</title>
</head>
<body>
    
<header>
    <h1>La caja registradora</h1>
    <p>Nombre del Comercio: abc</p>
    
</header>

<div>
    <a href="../aperturaCaja.php">Volver</a>
</div>

<div>
    <?php
    include("recursos.php");
    $traerProducto = $operacion->mostrarVentaIndividualmente($_GET['id']);

    $importeUnitario=$traerProducto[0]['precioUnitario'];

    ?>

    <form action="modificarOperacion.php" method="POST">
        <input type="hidden" name="codigoOp" value="<?php echo $traerProducto[0]['id_operacion']; ?>">

        <label>Cantidad</label><br>
        <input type="number" name="cantidad" value="<?php $traerProducto[0]['cantidad']; ?>"></br>

        <label>Precio Unitario: </label><br>
        <input type="double" name="precio" value="<?php echo $traerProducto[0]['precioUnitario'];  ?>" disabled></br>

        <label>Detalle: </label><br>
        <input type="text" name="detalle" value="<?php echo $traerProducto[0]['detalle']; ?>" disabled><br>

        <input type="submit">

    </form>
</div>

</body>
</html>