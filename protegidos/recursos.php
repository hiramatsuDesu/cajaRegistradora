<?php
    include('clases/baseDatos.php');
    include('clases/productos.php');

    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('CLAVE', '');
    define('BASE', 'practica');

    $base = new Base_Datos(HOST, USUARIO, CLAVE, BASE);
    $producto = new Producto($base);
?>