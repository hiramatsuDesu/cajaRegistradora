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

<section>
    <div>
        <h3>Buenos días querido amigo barrial...</h3>
    </div>

    <div>
        <nav>
        <ul>
            <li><a href="#">Consultar Stock</a></li>
            <li><a href="formProductos.php">Cargar prod</a></li>
            <li><a href=#>Eliminar prod</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="index.php">Volver</a></li>
        </ul>
        </nav>
    </div>

    <div>
        <?php
            
       
            include('protegidos/recursos.php');

            $mostrarProductos = $producto -> seleccionarProductos();

           
        ?>
            <table border="1" width="%80">
            <tr>    
            <td>Codigo de Producto</td>
                <td>Detalle del producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td colspan="2">Acciones</td>
                </tr> 
                <?php
                    for($i=0; $i<count($mostrarProductos); $i++){

                ?>

                <tr>
                    <td>
                        <?php
                        echo $mostrarProductos[$i]['id_producto'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $mostrarProductos[$i]['detalle'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $mostrarProductos[$i]['precioUnitario'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $mostrarProductos[$i]['cantidad'];
                        ?>
                    </td>
                    <td>
                        <a href="protegidos/modificarStock.php?cod=<?php echo $mostrarProductos[$i]['id_producto']; ?>">Editar</a>
                        
                    </td>
                    <td>
                        <a href="protegidos/eliminarProducto.php?cod=<?php echo $mostrarProductos[$i]['id_producto']; ?>">Eliminar</a>
                        
                    </td>
                </tr>

                <?php
                }
                ?>

            </table>

    </div>
</section>

<footer></footer>

</body>
</html>