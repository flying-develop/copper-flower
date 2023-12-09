<?php
/**
 * Template Name: Медиа
 */
?>
<?php get_header(); ?>
<?php
    while ( have_posts() ) {
        the_post();
    }
    global $post;
    if ($post->ID == 109) {
        //Новости
        get_template_part( 'templates/media/news' );
    }
    if ($post->ID == 115) {
        //Фотогалерея
        get_template_part( 'templates/media/gallery' );
    }
    if ($post->ID == 117) {
        //Фотогалерея
        get_template_part( 'templates/media/movie' );
    }
?>
<?php get_footer(); ?>