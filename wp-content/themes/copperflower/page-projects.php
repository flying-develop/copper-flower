<?php
/**
 * Template Name: Проекты
 */
?>
<?php get_header(); ?>
<?php
while ( have_posts() ) {
    the_post();
}
?>
<div class="wrapper page-wrapper">
    <div class="page-title">
        <h1><?php the_title(); ?></h1>
    </div>
    <?php get_template_part( 'templates/projects/items' ); ?>
</div>

<?php get_footer(); ?>
