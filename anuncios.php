
<?php 
    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1>Casas y Departamentos en Venta</h1>

        <?php incluirTemplate('anuncios', false); ?>

     </main>
     
     <?php
    incluirTemplate('footer',true);
?>