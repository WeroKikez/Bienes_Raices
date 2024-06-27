
<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas Y Depas en Venta</h2>

    <?php include 'listado.php'; ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la Casa de tus Sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>

    <a href="/contacto" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Blog1">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/blog">
                    <h4>Terrraza en el Techo de tu Casa</h4>
                    <p class="informacion-meta">Escrito el: <span>07/04/2023</span> por: <span>Emiliano Enríquez</span></p>
                    <p>Consejos para contruir una terraa en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article> <!--Entrada de Blog-->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Blog2">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/blog">
                    <h4>Guia para la Decoracion de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>06/04/2023</span> por: <span>Emiliano Enríquez</span></p>
                    <p>Todos los pasos que debes seguir para decorar tu casa como tu prefieres, creando armonia y un ecosistema útil y eficiente.</p>
                </a>
            </div>
        </article> <!--Entrada de Blog-->
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                Todo fue de maravilla, muy antentos. muy contento con el servicio
            </blockquote>
            <p>- Emiliano Enríquez</p>
        </div>
    </section>
</div>
