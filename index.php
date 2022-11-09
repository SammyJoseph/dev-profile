<?php get_header(); ?>

<?php //muestra el contenido del index al inicio del body (después del menú)
// if(have_posts()){
//     while(have_posts()){
//         the_post();
//         the_content();
//     }
// } 
?>

<?php get_template_part('template-parts/content', 'about-section'); ?>
<?php get_template_part('template-parts/content', 'facts-section'); ?>
<?php get_template_part('template-parts/content', 'skills-section'); ?>
<?php get_template_part('template-parts/content', 'resume-section'); ?>
<?php get_template_part('template-parts/content', 'portfolio-section'); ?>
<?php get_template_part('template-parts/content', 'services-section'); ?>
<?php get_template_part('template-parts/content', 'testimonial-section'); ?>
<?php get_template_part('template-parts/content', 'contact-section'); ?>

<?php get_footer(); ?>