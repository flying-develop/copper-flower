<?php
/**
 * Template Name: О фестивале
 */
?>
<?php get_header(); ?>
<?php
while ( have_posts() ) {
    the_post();
}
?>
<div class="about-top">
    <div class="wrapper top-wrapper">
        <?php get_template_part( 'templates/about/history' ); ?>
    </div>
</div>
<div class="about-bottom">
    <div class="wrapper bottom-wrapper">
        <?php get_template_part( 'templates/about/team' ); ?>
        <?php get_template_part( 'templates/about/become' ); ?>
    </div>
</div>

<?php get_footer(); ?>
