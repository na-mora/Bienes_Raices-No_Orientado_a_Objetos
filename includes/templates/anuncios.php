<?php 
    // 1) Importar la conexion
    require __DIR__.'/../config/database.php';

    $db = conectarDB();

    // 2) Consultar la base de datos

    $query = '';
    if($inicio === true){
        $query = 'SELECT * FROM propiedades LIMIT 3';
    }
    else{
        $query = 'SELECT * FROM propiedades';
    }

    // 3) Obtener el resultado 

    $resultado = mysqli_query($db, $query);

    // 4) Mostrar el resultado


?>



<div class="contenedor-anuncios">

<!--Este anuncio se va a iterar 3 veces para dejar los tres primeros anuncios-->

<?php while($propiedad = mysqli_fetch_assoc($resultado)):?>

    <div class="anuncio">
        <picture>
            <!--<source srcset="imagenes/" type="image/webp">-->
            <!--<source srcset="build/img/anuncio3.jpg" type="image/jpeg">-->

            <?php $ruta = '/bienesRaicesPHP/bienesraices/imagenes/'.$propiedad['imagen'].'.jpg' ; ?>

            <img loading= "lazy" src="<?php echo $ruta ;?>"  alt="Imagen anuncio">
        </picture>

        <div class="contenido-anuncio">

            <h3><?php echo $propiedad['titulo'];?></h3>

            <p> <?php echo $propiedad['descripcion']; ?> </p>
            <p class="precio"> $<?php echo number_format($propiedad['precio']);?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?> </p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorios">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>
            <a href= "anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div>
    </div><!--./anuncio-->
    <?php endwhile; 
        // Cerramos la conexion
        mysqli_close($db);
    ?>
</div> <!--./contenedor-anuncios-->


