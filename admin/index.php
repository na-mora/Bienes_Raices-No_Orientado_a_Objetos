<?php 
    // 20) Revisamos si esta autenticado y redireccionamos
    require __DIR__.'../../includes/funciones.php';

    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /bienesRaicesPHP/bienesraices/index.php');
    }
    

    // Incluir Template
   
    incluirTemplate('header');

    //echo '<pre>';
    //var_dump($_POST);
    //echo '</pre>';

    //----------/ Base de datos /------------------------------------

    // Importar la conexion (1)
    require __DIR__.'../../includes/config/database.php';
    $db = conectarDB();

    // Escribir el QUERY (2)
    $query = 'SELECT * FROM propiedades';

    // Consultar la Base de datos (3)
    $resultadoConsulta = mysqli_query($db, $query);

    // Mostrar los resultados (html) (4)

    // Cerrar la conexión (5)

    //---------------------------------------------------------------

    // Placeholder para que no halla error si no existe el resultado
    $resultado = $_GET['resultado']??null ;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $idEliminar = $_POST['id'];
        $esEnteroIdEliminar = filter_var($idEliminar, FILTER_VALIDATE_INT);

        if($esEnteroIdEliminar){
            //Consulta para eliminar el archivo
            $queryImagen = 'SELECT imagen FROM propiedades WHERE id = '.$idEliminar;
            $resultadoImagen = mysqli_fetch_assoc( mysqli_query($db, $queryImagen));

            unlink('../imagenes/'.$resultadoImagen['imagen'].'.jpg');


            $queryEliminar = 'DELETE FROM propiedades WHERE id = '.$idEliminar;

            $resultadoEliminar = mysqli_query($db, $queryEliminar);
            if($resultado){
                header('Location: /bienesRaicesPHP/bienesraices/admin?resultado=3');
            }
        }

    }

    
?>

     <main class="contenedor seccion">

        <h1>Administrador de bienes raices</h1>

        <?php if($resultado == 1): ?>
            <p class="alerta exito"> El anuncio se ha creado correctamente</p>
            <?php elseif($resultado == 2) :?>
                <p class="alerta exito"> El anuncio ha sido actualizado correctamente</p>
            <?php elseif($resultado == 3) :?>
                <p class="alerta error"> El anuncio ha sido eliminado correctamente</p>
            <?php endif; ?>
        

        <a href="/bienesRaicesPHP/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Crear Propiedad</a>
     </main>

     <!--Mostramos las propiedades que ya existen en la base de datos (Listar) (GET)-->

     <div class = "contenedor seccion">

        <h2>Propiedades en venta actualmente</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--(4)-->
                <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id'];?> </td>
                    <td> <?php echo $propiedad['titulo'];?> </td>
                    <td><?php echo '$'.$propiedad['precio'];?></td>
                    <td><?php echo $propiedad['creado'];?></td>
                    <td class="flex">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                            
                        </form>
                        
                        <a class ="boton-amarillo-block" href="/bienesRaicesPHP/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>

                
            </tbody>
        </table>
     </div>
     

     <?php
     // (5)
    mysqli_close($db);  
     // Incluir 
    incluirTemplate('footer',true);
?>