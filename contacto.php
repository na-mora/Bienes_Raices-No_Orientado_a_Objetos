<?php 
    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">

            <img loading="lazy" src="build/img/destacada3.jpg" alt="Destacada 3">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend> Información Personal</legend>

                <label for="nombre">Nombre: </label>
                <input type="text" name="" id="nombre" placeholder="Tu Nombre">

                <label for="email">E-Mail:</label>
                <input type="email" name="" id="email" placeholder="Tu E-Mail">

                <label for="telefono">Teléfono:</label>
                <input type="tel" name="" id="telefono" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea name="" id="mensaje" ></textarea>
               

            </fieldset>

            <fieldset>
                <legend> Información Sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Comprar</option>
                    <option value="Vende">Vender</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto:</label>
                <input type="number" name="" id="presupuesto" placeholder="Tu Precio o Presupuesto">
            
            </fieldset>

            <fieldset>
                <legend> Contacto</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-Mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si elegió telefono, elija la fecha y hora para ser contactado</p>

                <label for="fecha">Fecha:</label>
                <input type="date" name="" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>

     </main>

     <?php
    incluirTemplate('footer',true);
?>
