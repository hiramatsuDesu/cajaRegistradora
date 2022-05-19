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
        <li><a href="index.php">Inicio</a></li>
    </ul>
    </div>

    
    <div>
        <h3>Ingrese los datos del Cajero</h3>
        <form action="protegidos/altaVenta.php" method="POST">
            <label>Nro de Cajero: </label><br>
            <input type="number" name="cajNro"><br>

            <input type="submit">
            <?php
                if($_POST){
                    $id= $_POST['cajNro'];
                    include("protegidos/recursos.php");
                    $datoCajero = $caj->seleccionarUnCajero($id);
                    if($datoCajero){
                        echo "<p>Ha seleccionado al cajero: ".$datoCajero[0]['id_cajero']."</p><p>".$datoCajero[0]['nombre']." ".$datoCajero[0]['apellido']."</p>";
                    }else{
                        echo "No ha seleccionado un cajero valido";
                    }

                }
            ?>
            
        </form>
    </div>

    
</body>
</html>