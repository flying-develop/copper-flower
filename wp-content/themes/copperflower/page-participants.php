<?php
/**
 * Template Name: Участникам
 */
?>
<?php get_header(); ?>
<?php
while ( have_posts() ) {
    the_post();
}
?>
<div class="participants-top">
    <div class="wrapper top-wrapper">
        <div class="page-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="participants-ways">
            <a class="participants-way participants-way-become" href="<?php echo get_permalink(103); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-big-dark.png" alt="Медный цветок" width="192" height="217"/>
                <span>Медный цветок</span>
            </a>
            <a class="participants-way participants-way-partner participants-way-festagent" target="_blank" href="https://festagent.com/ru">
                <img src="<?php echo get_template_directory_uri(); ?>/images/festagent-logo.png" alt="Festagent" width="366" height="216"/>
                <span>festagent.com</span>
            </a>
            <a class="participants-way participants-way-partner participants-way-filmfreeway" target="_blank" href="https://filmfreeway.com/">
                <img src="<?php echo get_template_directory_uri(); ?>/images/filmfreeway-logo.png" alt="FilmFreeway" width="522" height="216"/>
                <span>filmfreeway.com</span>
            </a>
        </div>
        <?php get_template_part( 'templates/participants/winners' ); ?>
    </div>
</div>
<div class="participants-bottom">
    <div class="wrapper bottom-wrapper">
        <?php get_template_part( 'templates/participants/interviews' ); ?>
        <?php
            global $post;
            $aboutPost = get_post(130);
            $post = $aboutPost;
            setup_postdata($post);
            get_template_part( 'templates/about/become' );
            wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
