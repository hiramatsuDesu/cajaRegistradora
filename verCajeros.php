<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">

    <title>Caja registradora</title>
</head>
<body>

    <header>
    <h1>La caja registradora</h1>
    <p>Nombre del Comercio: abc</p>
    
    </header>
        
 
    <div>
    <ul>
            <li><a href="verCajeros.php">Ver Cajeros</a></li>
            <li>Eliminar Cajero</li>
            <li>Modificar datos de cajero</li>
            <li><a href="formCajero.php">Cargar Cajero</a></li>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </div>

    <div>
        <h3>Cajeros</h3>
        <?php  
            include("protegidos/recursos.php");
            $lista=$caj->seleccionarCajero();
            
        ?>

        <table border="1" width="%80">
            <tr>
                <td>N de Cajero</td>
                <td>Nombre Cajero</td>
                <td>Apellido Cajero</td>
                <td colspan="2">Administrar</td>
            </tr>

            <?php
                if($lista){
                for($i=0; $i<count($lista); $i++){
            ?>

            <tr>
                <td>
                    <?php
                        echo $lista[$i]['id_cajero'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $lista[$i]['nombre'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $lista[$i]['apellido'];
                    ?>
                </td>
                <td>
                    <a href="protegidos/modificarCajero.php?id=<?php echo $lista[$i]['id_cajero'] ?>">Modificar</a>
                </td>
                <td>
                    <a href="protegidos/eliminarCajero.php?id=<?php echo $lista[$i]['id_cajero'] ?>">Eliminar</a>
                </td>
            </tr>

            <?php
                }
            }
            ?>

        </table>
    </div>

    
</body>
</html>