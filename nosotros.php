<?php 
    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1>Conoce Sobre Nosotros</h1>

        <section class="nosotros">
            <div class="nosotros-imagen">
                <picture>
                    <!--Esta bien agregado-->
                    <source srcset="build/img/nosotros.webp" type="image/webp">
    
                    <img src="build/img/nosotros.jpg" alt="Imagen Nosotros">
                </picture>
            </div>
    
            <div class="nosotros-texto">
                <p class="bold">25 Años de Experiencia</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec magna posuere, aliquet ex lacinia, lacinia ligula. Suspendisse fermentum non nunc a congue. Maecenas eget scelerisque tortor, ac malesuada ex. Nam non tortor et mi sagittis viverra. Donec id ligula eu arcu tincidunt tincidunt. Sed congue non ante ut aliquet. Etiam arcu ipsum, congue nec ex vel, dignissim mollis lectus. Cras accumsan mollis metus, vitae vehicula ipsum. Quisque feugiat luctus erat, eget rutrum arcu rutrum vitae. Fusce malesuada mi at metus malesuada commodo. Donec sit amet vehicula urna. Sed massa augue, ullamcorper in sollicitudin ut, rhoncus ornare eros. </p>
    
                <p>Duis fringilla viverra mi, eget porta odio. Suspendisse vitae mauris efficitur, fermentum dolor ut, ornare justo. Sed commodo ante a est interdum, non accumsan augue efficitur. Vestibulum at lectus tellus. Fusce hendrerit sagittis felis vitae porta. Curabitur nec lobortis augue. Curabitur posuere feugiat faucibus.</p>
            </div>
        </section>

        <section class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque quia voluptatum, iste tenetur porro est architecto nemo quod reprehenderit nesciunt maxime voluptatibus non. Asperiores quidem officia repellendus rerum? Amet, magnam.</p>
            </div>

            <div class="icono">
                <img src="./build/img/icono2.svg" alt="icono seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque quia voluptatum, iste tenetur porro est architecto nemo quod reprehenderit nesciunt maxime voluptatibus non. Asperiores quidem officia repellendus rerum? Amet, magnam.</p>
            </div>

            <div class="icono">
                <img src="./build/img/icono3.svg" alt="icono seguridad" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque quia voluptatum, iste tenetur porro est architecto nemo quod reprehenderit nesciunt maxime voluptatibus non. Asperiores quidem officia repellendus rerum? Amet, magnam.</p>
            </div>
        </section>


     </main>
     
     <?php
    incluirTemplate('footer',true);
?>