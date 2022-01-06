<?php 
    // Codigo para cerrar session
    

    if(!isset($_SESSION)){
        // Para no iniciar session dos veces
        session_start();
    }


    $auth = $_SESSION['login']?? NULL;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Hoja de estilos CSS-->
    <link rel="stylesheet" href="/bienesRaicesPHP/bienesraices/build/css/app.css">

    <title>Bienes Raices</title>
</head>
<body>

     <header class="header <?php echo $inicio? 'inicio': '';  ?>">
            <div class="contenedor contenido-header">

                <div class ="barra">
                    
                    <a href="/bienesRaicesPHP/bienesraices/index.php">
                        <!--Formato svg es muy ligero-->
                        <img src="/bienesRaicesPHP/bienesraices/src/img/logo.svg" height ="64" alt="Logotipo de Bienes Raices">
                    </a>

                    <div class="mobile-menu">
                        <img src="/bienesRaicesPHP/bienesraices/build/img/barras.svg" height ="55" alt="Menu Responsive">
                    </div>

                    <div class="derecha">
                        <img class="dark-mode-boton" src="/bienesRaicesPHP/bienesraices/build/img/dark-mode.svg"  alt="Dark Mode">
                        <nav class ="navegacion">
                            <a href="/bienesRaicesPHP/bienesraices/nosotros.php">Nosotros</a>
                            <a href="/bienesRaicesPHP/bienesraices/anuncios.php">Anuncios</a>
                            <a href="/bienesRaicesPHP/bienesraices/blog.php">Blog</a>
                            <a href="/bienesRaicesPHP/bienesraices/contacto.php">Contacto</a>
                            <?php if($auth):?>
                                <a href="/bienesRaicesPHP/bienesraices/cerrar-sesion.php">Cerrar Sesión</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                    
                    
                </div> <!--./barra-->

                <?php 
                    if($inicio){
                        echo '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>';
                    }
                
                ?>
                <!--<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>-->
            </div>
     </header>