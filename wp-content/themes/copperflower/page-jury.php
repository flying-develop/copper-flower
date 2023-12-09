<?php
/**
 * Template Name: Жюри
 */
?>
<?php get_header(); ?>
<?php
    while ( have_posts() ) {
        the_post();
    }
?>
<div class="wrapper page-wrapper">
    <?php get_template_part( 'templates/jury/items' ); ?>
</div>

<?php get_footer(); ?>
