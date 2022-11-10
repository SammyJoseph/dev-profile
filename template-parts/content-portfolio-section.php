<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container">

    <div class="section-title">
        <h2>Portafolio</h2>
        <p>Proyectos recientes que puedes filtrar según su categoría.</p>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">Todos</li>
            <li data-filter=".filter-app">WordPress & Woo</li>
            <li data-filter=".filter-card">HTML & CSS</li>
            <li data-filter=".filter-web">Colaboraciones</li>
        </ul>
        </div>
    </div>

    <?php 
        $args = array(
            'post_type' => 'proyecto', //el nombre viene del custom post type creado en functions
            'posts_per_page' => 9 //cantidad máxima de posts a mostrar
        );
        $proyectos = new WP_Query($args);
    ?>
    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
    <?php if($proyectos->have_posts()){ ?>
        <?php while($proyectos->have_posts()){ ?>  <!-- bucle que imprime todos los posts de mi custom post type -->
            <?php $proyectos->the_post(); ?> 
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">                 
                <div class="portfolio-wrap">
                    <?php the_post_thumbnail(
                        "post-thumbnail",
                        array("class" => "img-fluid")); 
                    ?>
                    <div class="portfolio-links">
                    <a href="<?php the_post_thumbnail_url(); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php the_title(); ?>"><i class="bx bx-image-add mt-2"></i></a>
                    <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                    <a href="<?php the_permalink(); ?>" title="Detalles"><i class="bx bx-info-circle mt-2"></i></a>
                    </div>
                </div>  
            </div>
        <?php } ?>
    <?php }  ?>
    </div>

    </div>
</section><!-- End Portfolio Section -->