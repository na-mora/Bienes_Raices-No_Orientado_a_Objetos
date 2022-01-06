<?php 

    require __DIR__.'/../../includes/config/database.php';
    require __DIR__.'/../../includes/funciones.php';

    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /bienesRaicesPHP/bienesraices/index.php');
    }
    

    $db = conectarDB();

    // Consultar para tener todos los vendedores
    $consultaVendedores = 'SELECT * FROM vendedores ';
    $resultadoVendedores = mysqli_query($db, $consultaVendedores);

    // Arreglo con mensajes de error

    $mensajes =[];
    incluirTemplate('header');

    // Leemos las

    //Inicializamos las variables vacias
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $parqueaderos = '';
    // Id del vendedor
    $vendedor = '';

    // Almacenar que dia fue creada la propiedad
    $creado = date('Y/m/d');


    if($_SERVER['REQUEST_METHOD']=== 'POST'){


        // Sanitizar los valores de entrada FILTER_SANITIZE_NUMBER_INT = HOLA1 -> 1,
        // FILTER_SANITIZE_STRING = hola1 = hola
         
        //$resultado = filter_var($numero, FILTER_SANITIZE_STRING);

        // Validar los numeros (tipos de datos)
        //$resultado = filter_var($numero, FILTER_VALIDATE_INT);

        // Sanitizamos los datos
        $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $parqueaderos = mysqli_real_escape_string($db, $_POST['parqueaderos']);
        $vendedor = mysqli_real_escape_string($db, $_POST['vendedor']);

        // Asignamos files a una variables, la imagen que fue cargada
        $imagen = $_FILES['imagen'];

        // Validaciones
        if($titulo === ''){
            $mensajes[] = "Debes añadir un titulo";
        }
        if($precio === ''){
            $mensajes[] = "Debes añadir un precio";
        }
        if($descripcion === ''){
            $mensajes[] = "Debes añadir una descripcion";
        }
        if($habitaciones === ''){
            $mensajes[] = "Debes añadir el numero de habitaciones";
        }
        if($wc === ''){
            $mensajes[] = "Debes añadir el numero de baños";
        }
        if($parqueaderos === ''){
            $mensajes[] = "Debes añadir el numero de parqueaderos";
        }
        if($vendedor === ''){
            $mensajes[] = "Debes asignar al vendedor";
        }
        // Validaciones para las imagenes

        // Exista la imagen
        if(!$imagen['name'] || $imagen['error']){
            $mensajes[] = "La imagen es obligatoria";
        }
        // Validar por tamano (2MB maximo)
        $medida = 2000*1000;
        if($imagen['size']> $medida){
            $mensajes[] = "La imagen es muy pesada";
        }

        // Mostramos en pantalla 


       
        // Hacemos las validaciones

        if(empty($mensajes)){

            /* Subida de archivos (imagenes)*/
            
            //Crear la carpeta en la ruta
            $carpetaImagenes = '../../imagenes';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // Generar un nombre unico (random)
            $nombreImagen = md5( uniqid( rand(), true ));

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes."/".$nombreImagen.".jpg");
            


            $query = "INSERT INTO propiedades (titulo, precio, imagen ,descripcion, habitaciones, wc, estacionamiento, creado,vendedorId) VALUES";
            $final = $query." ('".$titulo."', '".$precio."','$nombreImagen' ,'$descripcion', '$habitaciones', '$wc', '$parqueaderos', '$creado' ,'$vendedor' );";

            //echo $final;

            // Insertar en la BBDD
            $resultado = mysqli_query($db, $final);

            if($resultado){
                // Redireccionar cuando ya se ha creado la propiedad
    
                // eL QUERY STRING url que tiene unos parametros
                header('Location: /bienesRaicesPHP/bienesraices/admin?resultado=1');
            }
        }
        
        
        

       // if($resultado){
            //echo 'Insertado Correctamente';
        //}
        //else{
            //echo 'no se pudo agregar';
       // }

    }
    

?>

     <main class="contenedor seccion">

        <h1>Crear </h1>

        <?php foreach($mensajes as $error): ?>

        <div class="alerta error">
            <?php  echo $error; ?>
        </div>
        <?php  endforeach; ?>

        <!--MULTIPART/form-data para las imagenes, subir imagenes con la super global $_FILES-->
        <form class="formulario" method="POST" action="/bienesRaicesPHP/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">

            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <!--Colocamos el valor a guardar en php, para no tener que llenar los campos otra vez-->
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de la propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" ><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="habitaciones">Número de habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones; ?>" placeholder="Ej: 3, 4" min="1" max="9">

                <label for="wc">Número de baños</label>
                <input type="number" id="wc" name="wc" value="<?php echo $wc; ?>" placeholder="Ej: 3, 4" min="1" max="9">

                <label for="parqueaderos">Número de parqueaderos</label>
                <input type="number" id="parqueaderos" name="parqueaderos" value="<?php echo $parqueaderos; ?>" placeholder="Ej: 3, 4" min="0" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="">
                    <option value="" default>-- Seleccione --</option>
                    <?php foreach ($resultadoVendedores as $v): ?>
                        <option <?php echo $vendedor === $v["id"]? 'selected': ''; ?> value="<?php echo $v["id"]; ?>"><?php echo $v["nombre"].' '.$v["apellido"] ; ?></option>

                    <?php endforeach; ?>

                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

        <a href="/bienesRaicesPHP/bienesraices/admin" class="boton boton-amarillo">Inicio</a>

     </main>

    <?php incluirTemplate('footer',true); ?>