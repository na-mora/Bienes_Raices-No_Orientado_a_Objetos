<?php 
    require 'includes/funciones.php';
    // Autenticar el usuario

    // 0) Incluimos la base de datos
    require __DIR__.'/includes/config/database.php';
    $db = conectarDB();

     // 7) Creamos un arreglo para mostrar los errores
     $errores = [];

     // 0) Inicializamos la variables vacias
     $email = '';
     $password = '';


    // 1) Vamos a leer el POST necesitamos $_SERVE['REQUEST_METHOD] === 'POST' 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // 4) Leemos los valores del post, filtramos por filter_var(, Constante)
        
        $email = $_POST['email'];
        $esEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

       
        // 5) Verificamos si es email
        if(!$esEmail){
            // Mostramos mensaje en errores
            $errores [] = 'El Email es obligatorio o no es valido';
        }
        else{
            // 6) Filtramos el email y el password validos a la base de datos
            $email = mysqli_real_escape_string($db, $email);
            $password = mysqli_real_escape_string($db, $password);

            // 8) Validamos el password
            if(!$password){
                $errores []= 'El Password es obligatorio'; 
            }

            // 12) Si el email y el password son validos
            if(empty($errores)){
                // 13) El usuario existe?
                $queryEmail = "SELECT * FROM usuarios WHERE email = '".$email." '";
                $resultadoEmail = mysqli_query($db, $queryEmail);

                if($resultadoEmail->num_rows != 0){
                    // 14) Revisamos si el password es correcto, almacenamos en el mysqli_fetch
                    $usuario = mysqli_fetch_assoc($resultadoEmail);

                    // 15) Usamos passwordVerify(ingresado, almacenado en db) para la autenticacion
                    $auth = password_verify($password , $usuario['password']);
                    if($auth){
                        // 16) el usuarios es autenticado

                        session_start();

                        // 17) Llenar el arreglo de la session ($_SESSION), con info importante
                        $_SESSION['usuario'] = $usuario['email'];
                        $_SESSION['login']=true;

                        header('Location: /bienesRaicesPHP/bienesraices/admin/index.php');

                    }
                    else{
                        $errores[]= 'Contraseña incorrecta';
                    }
                }
                else{
                    $errores[] = 'El usuario no existe';
                }
            }
        }
    }


    // Incluir el Header
    incluirTemplate('header');
?>

     <main class="contenedor seccion contenido-centrado">

        <h1>Iniciar Sesión</h1>

        <!--10) Mostramos los errores con un foreach-->
        <?php foreach($errores as $error): ?>
            <p class="alerta error"> <?php echo $error; ?></p>
        <?php endforeach; ?>

        <!--2) Agregamos el metodo POST-->
        <form method ="POST" class="formulario" action="" novalidate>
            <fieldset>
                    <legend> Email y Password</legend>

                    <!--3) Agregamos los names-->
                    <label for="email">Email:</label>
                    <!-- 9) ponemos 'required' en el campo de texto, validacion de html-->
                    <!-- 11) Ponemos el valor almacenado en value -->
                    <input type="email" name="email" id="email" placeholder="Tu Email" value = "<?php echo $email?>">

                    <label for="password">Password:</label>
                    <!-- 9) ponemos required en el campo de texto, validacion de html-->
                    <!-- 11) Ponemos el valor almacenado en value -->
                    <input type="password" name="password" id="password" placeholder="Tu Password" value ="<?php echo $password?>" >

                    
                </fieldset>
                <input type="submit" value="Iniciar Sección" class="boton-verde">
        </form>

     </main>

     <?php
    incluirTemplate('footer',true);
?>