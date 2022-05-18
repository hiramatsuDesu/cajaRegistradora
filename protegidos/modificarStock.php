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

<section>
    <div>
        <h3>Buenos días querido amigo barrial...</h3>
    </div>

    <div>
        <nav>
        <ul>
            <li><a href="stockProductos.php">Consultar Stock</a></li>
            <li><a href="#">Cargar prod</a></li>
            <li><a href=#>Eliminar prod</a></li>
            <li>Editar</li>
            <li><a href="index.php">Volver</a></li>
        </ul>
        </nav>
    </div>

    <?php
    include("recursos.php");
    $lista = $producto->consultarUnProducto($_GET['cod']);
    ?>

    <div>
        <h3>Modificar el Producto</h3>
        <form action="modificar.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $lista[0]['id_producto']; ?>">

            <label>Detalle del Producto</label><br>
            <input type="text" name="detalle" value="<?php echo $lista[0]['detalle']; ?>"><br>

            <label>Precio del producto</label><br>
            <input type="double" name="precio" value="<?php echo $lista[0]['precioUnitario']; ?>"><br>

            <label>Cantidad</label><br>
            <input type="number" name="cantidad" value="<?php echo $lista[0]['cantidad']; ?>"><br>

            <input type="submit" value="Modificar Producto">

        </form>

    </div>



</section>

<footer></footer>

</body>
</html>