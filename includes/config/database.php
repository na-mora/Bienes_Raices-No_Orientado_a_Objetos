<?php 

// Configuracion (Conexion a la base de datos)

function conectarDB(): mysqli{
    // puerto, usuario, contrasena, nombre BBDD
    $db = mysqli_connect('localhost', 'root', 'root', 'bienes_raices');


    if(!$db){
        echo 'error: No se pudo conectar';
        exit; // Las instrucciones de abajo no se ejecutaran
    }

    return $db;
    
}




?>