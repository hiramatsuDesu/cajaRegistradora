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
        <nav>
        <ul>
            <li><a href="../verCajeros.php">Ver cajero</a></li>
            <li><a href="../verCajeros.php">Eliminar Cajero</a></li>
            <li><a href="../index.php">Inicio</a></li>
        </ul>
        </nav>
    </div>

    <div>
        <h3>Modificar datos del Cajero</h3>
        
        <?php
            include("recursos.php");
            $listaCajeros=$caj->seleccionarUnCajero($_GET['id'])
        ?>

        <form action="cajeroModificado.php" method="POST">
            <label>Usted va a modificar al cajero Nro:</label><br>
            <input type="number" name="nroCajero" value="<?php echo $listaCajeros[0]['id_cajero']; ?>"><br>

            <label>Nombre Cajero</label><br>
            <input type="text" name="nombre" value="<?php echo $listaCajeros[0]['nombre']; ?>"><br>

            <label>Apellido Cajero</label><br>
            <input type="text" name="apellido" value="<?php echo $listaCajeros[0]['apellido']?>"><br>

            <input type="submit" value="Modificar Datos Cajero">

        </form>

    </div>

</section>

<footer></footer>

</body>
</html>