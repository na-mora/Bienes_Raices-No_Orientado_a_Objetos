<?php 
    // Importar la conexion
    require __DIR__.'/includes/config/database.php';
    $db = conectarDB();

    // Crear un email y password

    $email = 'correo@correo.com';
    $password = '123';

    // Funcion para hashear ásswords de PHP,  mejorada recientemente
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    // Query para crear el usuario (Admin)
    $query = "INSERT INTO usuarios (email, password) VALUES ('${email}' , '${passwordHash}' ); ";
    echo $query;
    // Agregarlo a la base de datos
    mysqli_query($db, $query);
?>