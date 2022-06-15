<main class="contenedor seccion" >
        <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>

        <?php include 'iconos.php' ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>
        
        <?php 
            $limite = 3;
            include 'listado.php'; 
        ?>

        <div class="alinear-derecha">
            <a data-cy="todas-propiedades" href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>


    <section data-cy="imagen-contacto" class="imagen-contacto">
        <h2>Encuentra la casa de tu sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pndrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">

                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de casa</h4>
                        <p class="informacion-meta">Escrito el: <span>03/04/2022</span> por <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">

                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>03/04/2022</span> por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio de tu hogar con esta guia, parnede a combinar muebles y 
                            colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de excelente forma, muy biena atención y la casa que me
                    ofrecieron cuple con todas mis expectativas.
                </blockquote>
                <p>- Emmanuel Osnaya</p>
            </div>
        </section>
    </div>