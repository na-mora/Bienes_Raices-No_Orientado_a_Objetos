<?php 
    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>

     <main class="contenedor seccion">

        <h1>Nuestro Blog</h1>

        <section class="blog">

            <article class="entrada-blog">
               <div class="imagen">
                   <picture>
                       <source srcset="build/img/blog1.webp" type="image/webp">
                       <source srcset="build/img/blog1.jpg" type="image/jpeg">

                       <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen entrada 1">
                   </picture>
               </div>

                   <div class="texto-entrada">
                       <a href="entrada.html" class="deshabilitar">
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
                       <a href="entrada.html" class="deshabilitar">
                           <h4>Guia para decoración de tu hogar</h4>
                           <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>

                           <p>
                               Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                           </p>
                       </a>


                   </div>
               
            </article> <!--.Entrada 2-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog3.webp" type="image/webp">
                        <source srcset="build/img/blog3.jpg" type="image/jpeg">
 
                        <img loading="lazy" src="build/img/blog3.jpg" alt="Imagen entrada 3">
                    </picture>
                </div>
 
                    <div class="texto-entrada">
                        <a href="entrada.html" class="deshabilitar">
                            <h4>Guia para decoración de tu hogar</h4>
                            <p>Escrito el: <span>28/11/2021</span> por <span>Alejandro Mora</span></p>
 
                            <p>
                                Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                            </p>
                        </a>
 
 
                    </div>
                
             </article> <!--.Entrada 2-->

             <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog4.webp" type="image/webp">
                        <source srcset="build/img/blog4.jpg" type="image/jpeg">
 
                        <img loading="lazy" src="build/img/blog4.jpg" alt="Imagen entrada 4">
                    </picture>
                </div>
 
                    <div class="texto-entrada">
                        <a href="entrada.html" class="deshabilitar">
                            <h4>Guia para decoración de tu hogar</h4>
                            <p>Escrito el: <span>01/12/2021</span> por <span>Admin</span></p>
 
                            <p>
                                Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                            </p>
                        </a>
 
 
                    </div>
                
             </article> <!--.Entrada 2-->

        </section>

     </main>

     <?php
    incluirTemplate('footer',true);
?>