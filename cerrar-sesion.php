<?php 
    require 'includes/funciones.php';

    // Magia negra para cerra la sessión
    session_start();
    $_SESSION = [];
    
    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1>Se ha cerrado la sesión correctamente</h1>

     </main>

     <?php
    incluirTemplate('footer',true);
?>