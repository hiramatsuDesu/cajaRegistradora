<?php
session_start();
?>

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
   
<div id="session">
<h3>Ingrese los datos del cajero</h3>
<form action="protegidos/altaVenta.php" method="POST">
    <label>Ingrese Nro de Cajero</label><br>
    <input type="number" name="cajNro"><br>

    <input type="submit" value="Enviar">
</form>

<?php
if(isset($_SESSION['cajero'])){

?>

</div>


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
    <h3>Buscar Productos</h3>
    <form name="formulario" action="aperturaCaja.php#librerias" method="POST">
        <label>Detalle: </label><br>
        <input type="text" name="search_text" value="<?php $searchText ?>" placeholder="Buscar por detalle"><br>

        <input type="submit" value="Buscar">
    </form>
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
        <td>Cantidad Disponible</td>
        
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
</div>

<div>
<h3>Ingrese Datos del producto</h3>

<form action="protegidos/ventas.php" method="POST">
    <label>Código del producto </label><br>
    <input type="number" name="codProd"><br>

    <label>Ingrese cantidad</label><br>
    <input type="number" name="cant"><br>

    <input type="submit">

</form>


</div>




<div>
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
        <td>Fecha</td>
        <td>Hora</td>
       
        <td>Cantidad</td>
        <td>Sub Total</td>
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
                <a href="protegidos/eliminarVenta.php?cod=<?php echo $mostrar[$i]['id_producto'] ?>">
                Eliminar</a>
            </td>
            <td>
                <a href="protegidos/modificarVenta.php?id=<?php echo $mostrar[$i]['id_operacion'] ?>">
                Modificar
            </td>


        </tr>

        <?php
        }
        ?>
    </table>
    <?php
        }else if($_GET['Error_session']){
            echo "<p>Ingrese un cajero valido</p>";
        }
    ?>
</div>

<div>
    <h3>Total</h3>
    <?php
    $total=0;
    for($i=0; $i<count($mostrar); $i++){
    $total += $mostrar[$i]['precioTotal'];
    
    }echo $total;
    ?>
</div>

<div>
    <h3>Fin de la operacion</h3>
    <a href="librerias/fpdf/ticket.php" target="_blank">
    <input type="button" value="Emitir ticket">
    </a>
</div>

</section>


<footer></footer>

</body>
</html>