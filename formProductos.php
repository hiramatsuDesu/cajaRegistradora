<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <li><a href="stockProductos.php">Consultar Stock</a></li>
            <li><a href="#">Cargar prod</a></li>
            <li><a href=#>Eliminar prod</a></li>
            <li>Editar</li>
            <li><a href="index.php">Volver</a></li>
        </ul>
        </nav>
    </div>

    <div>
        <h3>Cargar Productos: </h3>
        <form action="protegidos/cargarProducto.php" method="POST">
            <label>Detalle: </label><br>
            <input type="text" maxlength="100" name="detalle"><br>

            <label>Precio: </label><br>
            <input type="double" name="precio"><br>

            <label>Cantidad de Unidades: </label><br>
            <input type="number" name="cantidad"><br>

            <input type="submit" value="Enviar">
        </form>
    </div>


    
    <div>
        <?php
            if(isset($_GET['ok'])){
                echo "<p>Producto cargado correctamente</p>";
            }
       
            include('protegidos/recursos.php');

            $mostrarProductos = $producto -> seleccionarProductos();

           
        ?>
            <table border="1" width="%80">
            <tr>    
            <td>Codigo de Producto</td>
                <td>Detalle del producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
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