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
    <?php

        
        date_default_timezone_set('America/Argentina/Cordoba');
        $fecha = date("d/m/Y");
        $hora = date('H:i:s');
        echo "<p>Fecha: ".$fecha."</p>";
        echo "<p>Hora: ".$hora."</p>";
    ?>

</div>

<div>
    <?php
    include("librerias/pagination_class.php");
    include("protegidos/conexion.php");
    ?>
    <script languaje="JavaScript">
        function pagination(page){
            window.location="aperturaCaja.php?search_text="+document.formulario.search_text.value+"&starting="+page+"#librerias";
        }
    </script>

    <?php
    $qry="SELECT * FROM productos";

    if(isset($_POST['search_text'])){
        $searchText=$_POST['search_text'];
        $qry .= " WHERE id_producto LIKE'%$searchText%' OR detalle LIKE '%$searchText%'";
    }else{
        $searchText = '';
    }

    if(isset($_GET['starting']) && !isset($_POST['submit'])){
        $starting = $_GET['starting'];
    }else{
        $starting = 0;
    }

    $recpage=5;
    $obj= new Pagination_class($qry, $bd, $starting, $recpage);
    $result = $obj->result;
    ?>

    <table border="1" width="%80">
    <caption>Productos</caption>
    <tr>
        <td>Codigo Producto</td>
        <td>Detalle</td>
        <td>Precio</td>
        <td>Cantidad</td>
        <td colspan = "2">Acciones</td>
    </tr>
    <?php
    if(mysqli_num_rows($result)!=0){
        $counter=$starting + 1;
        while($prod=mysqli_fetch_array($result)){
    
    ?>

    <tr>
        <td>
            <?php
                echo $prod['id_producto'];
            ?>
        </td>
        <td>
            <?php
                echo $prod['detalle'];
            ?>
        </td>
        <td>
            <?php
                echo $prod['precioUnitario'];
            ?>
        </td>
        <td>
            <?php
                echo $prod['cantidad'];
            ?>
        </td>
        <td>
            <a href="protegidos/altaVenta.php?id=<?php echo $prod['id_producto']; ?>">Agregar</a>
        </td>

    </tr>

    <?php
     $counter ++;
        }
    ?>
    <tr>
        <td align="center" colspan="6">
            <?php
                echo $obj->anchors;
            ?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="6">
            <?php
                echo $obj->total;
            ?>
        </td>
    </tr>
        <?php
            }else{
                echo "No Data Found";
            }
        ?>

    </table>



    </br>



    <?php
        include("protegidos/recursos.php");
        $mostrar = $operacion->mostrarVenta();
    ?>

    <table border="1" width="40%">
    <caption>Carrito de Compras</caption>
    <tr>
        <td>Codigo Operacion</td>
        <td>Nro Cajero</td>
        <td>Codigo de Producto</td>
        <td>Detalle de producto</td>
        <td>Precio Unitario</td>
        <td>Cantidad</td>
        <td>Total</td>
        <td colspan = "2">Acciones</td>
    </tr>
        <?php
        for($i=0; $i<count($mostrar); $i++){
        ?>

        <tr>
            <td>
                <?php
                echo $mostrar[$i]['id_operacion'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['id_cajero'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['id_producto'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['detalle'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['precioUnitario'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['fecha'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['hora'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['cantidad'];
                ?>
            </td>
            <td>
                <?php
                echo $mostrar[$i]['precioTotal'];
                ?>
            </td>
            <td>
                Eliminar
            </td>
            <td>
                Modificar
            </td>


        </tr>

        <?php
        }
        ?>
    </table>





</div>


<div>
    <h3>Buscar Productos</h3>
    <form name="formulario" action="aperturaCaja.php#librerias" method="POST">
        <label>Codigo de Producto: </label><br>
        <input type="number" name="search_text" value="<?php  $searchText; ?>" placheholder="Buscar por código"><br>

        <label>Detalle: </label><br>
        <input type="text" name="search_text" value="<?php $searchText ?>" placeholder="Buscar por detalle"><br>

        <input type="submit" value="Buscar">
    </form>
</div>

</section>

<footer></footer>

</body>
</html>