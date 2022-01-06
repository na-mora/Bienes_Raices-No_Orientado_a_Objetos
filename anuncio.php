
<?php 
    require 'includes/funciones.php';
    require __DIR__.'/includes/config/database.php';

    // Leer el id de la propiedad

    $idPropiedad = $_GET['id'] ;

    // Validamos el entero
    $idEsEntero = filter_var($idPropiedad, FILTER_VALIDATE_INT);
    
    if(!$idEsEntero){
        header('Location: /bienesRaicesPHP/bienesraices/index.php');
    }

    // Conectamos a la base de datos
    $db = conectarDB();

    // Creamos la consulta
    $consulta = 'SELECT * FROM propiedades WHERE id = '.$idPropiedad. ' ;';

    // Obtenemos el resultado 
    $resultado = mysqli_query($db, $consulta);
    $resultado = mysqli_fetch_assoc($resultado);
    
   
    if($resultado == NULL){
        header('Location: /bienesRaicesPHP/bienesraices/index.php');
    }
    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1><?php echo $resultado['titulo'];?></h1>

        <picture>
            <!--<source srcset="build/img/destacada.webp" type="image/webp">-->

            <img src="imagenes/<?php echo $resultado['imagen'].'.jpg';?>" alt="Imagen destacada">
        </picture>

        <p class="precio"> $<?php echo number_format($resultado['precio']); ?></p>

        <div class="contenedor-iconos">

            
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $resultado['wc'];?></p>
                </li>
    
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $resultado['estacionamiento'] ?></p>
                </li>
    
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorios">
                    <p><?php echo $resultado['habitaciones'];?></p>
                </li>
            </ul>
        </div>
       

        <p><?php echo $resultado['descripcion']; ?></p>
        
        

        <p>Creado: <?php echo $resultado['creado'];?></p>
        

     </main>
<?php
    
    incluirTemplate('footer',true);
    // Cerramos la conexion
    mysqli_close($db);
?>