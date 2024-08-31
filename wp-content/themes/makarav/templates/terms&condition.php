<?php 
/*
Template Name: terms
*/
get_header();
?>

<?php get_template_part('template-parts/banner-section'); ?>

<div class="container">
    <?php the_content(); ?>
</div>


<?php get_template_part('template-parts/footer-top'); ?>

<?php 
get_footer();
?>