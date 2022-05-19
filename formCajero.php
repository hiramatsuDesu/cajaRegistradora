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
            <li><a href="index.php">Inicio</a></li>
            
        </ul>
    </div>

    <div>
        <h3>Cajeros</h3>
        <h4>Cargar Cajero</h4>
        <h4>Datos del Cajero:</h4>
        <form action="protegidos/cargarCajero.php" method="POST">
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br>

            <label>Apellido</label><br>
            <input type="text" name="apellido"><br>

            <input type="submit" value="Cargar Datos">
        </form>
    </div>

    
</body>
</html>