<?php 
    require 'includes/funciones.php';

    
    incluirTemplate('header',true);
?>

     <main class="contenedor seccion">

        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">

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

        </div>

     </main>

     <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <!--Solo dejamos el titulo y el boton hacia ver todos los anuncios-->
        <!--Incluimos el template de anuncios-->
        
        <?php 
        incluirTemplate('anuncios',true); ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton boton-verde"> Ver todas </a>
        </div>
        
     </section>

     <section class="imagen-contacto">
         <h2>Encuentra la casa de tus sueños</h2>

         <div class="texto-contacto">
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
         </div>
         

         <a href="contacto.php" class="boton boton-amarillo">Contactanos</a>

     </section>

     <!--seccion-inferior es la clase para seleccionarlo con scss-->
     <div class="contenedor seccion seccion-inferior">
         <section class="blog">
             <h3>Nuestro Blog</h3>

             <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">

                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen entrada 1">
                    </picture>
                </div>

                    <div class="texto-entrada">
                        <a href="entrada.php" class="deshabilitar">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p>Escrito el: <span>20/10/2021</span> por <span>Alejandro Mora</span></p>

                            <p>Consejos para construir una terraza en el techo de tu casa con los mejores
                                materiales y ahorrando dinero
                            </p>
                        </a>


                    </div>
                
             </article> <!--.Entrada 1-->

             <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">

                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen entrada 2">
                    </picture>
                </div>

                    <div class="texto-entrada">
                        <a href="entrada.php" class="deshabilitar">
                            <h4>Guia para decoración de tu hogar</h4>
                            <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>

                            <p>
                                Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                            </p>
                        </a>


                    </div>
                
             </article> <!--.Entrada 2-->

         </section>

         <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class ="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Alejandro Mora</p>

            </div>
         </section>

     </div>

<?php
    incluirTemplate('footer',true);
?>

     