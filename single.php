<?php get_template_part('template-parts/content', 'head'); ?> <!-- <head> -->
<?php get_template_part('template-parts/content', 'header-proyectos'); ?> <!-- menú proyectos -->

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detalles del Proyecto</h2>
            <ol>
            <li><a href="<?php echo home_url(); ?>">Inicio</a></li>
            <li><a href="<?php echo home_url('portafolio'); ?>">Portafolio</a></li>
            <li><?php the_title(); ?></li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs -->   

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
			<?php if(have_posts()){ ?> <!-- muestra el contenido de la página -->
				<?php while(have_posts()){ ?>
					<?php the_post(); ?>
					<h2> <?php the_title(); ?> </h2>
					<?php the_content(); ?> 
			<!-- <div class="row gy-4">
				<div class="col-lg-8">
				<div class="portfolio-details-slider swiper">
					<div class="swiper-wrapper align-items-center">

					<div class="swiper-slide">
						<?php the_post_thumbnail() ?>
					</div>

					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/portfolio-details-2.jpg" alt="">
					</div>

					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/portfolio-details-3.jpg" alt="">
					</div>

					</div>
					<div class="swiper-pagination"></div>
				</div>
				</div>

				<div class="col-lg-4">
				<div class="portfolio-info">
					<h3>Project information</h3>
					<ul>
					<li><strong>Category</strong>: Web design</li>
					<li><strong>Client</strong>: ASU Company</li>
					<li><strong>Project date</strong>: 01 March, 2020</li>
					<li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
					</ul>
				</div>
				<div class="portfolio-description">
					<h2>This is an example of portfolio detail</h2>
					<p>
					Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
					</p>
				</div>
				</div>
			</div> -->
        </div>
    </section>
    <!-- End Portfolio Details Section -->

    <?php get_template_part('template-parts/content', 'testimonial-section'); ?>
</main>
    <?php } ?>
<?php } ?>

<?php get_footer(); ?>