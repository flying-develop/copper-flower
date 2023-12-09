<?php
/**
 * Template Name: Стать участником
 */
?>
<?php get_header(); ?>
<?php
	while ( have_posts() ) {
        the_post();
    }
?>
    <div class="wrapper page-wrapper">
        <div class="success-message">
            <!--noindex-->
                <div class="success-title">Заявка отправлена!</div>
                <a class="success-link btn" href="/">
                    <span>На главную</span>
                </a>
            <!--/noindex-->
        </div>
        <div class="fail-message">
            <!--noindex-->
            <div class="fail-title">Произошел временный&nbsp;сбой!</div>
            <div class="fail-subtitle">Заявка не&nbsp;была&nbsp;отправлена, <span>попробуйте&nbsp;позднее</span></div>
            <a class="fail-link btn" href="/">
                <span>На главную</span>
            </a>
            <!--/noindex-->
        </div>
        <div class="page-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="become-partners">
            <a class="participants-way participants-way-partner participants-way-festagent" target="_blank" href="https://festagent.com/ru">
                <img src="<?php echo get_template_directory_uri(); ?>/images/festagent-logo-white.png" alt="Festagent" width="256" height="168"/>
                <span>festagent.com</span>
            </a>
            <a class="participants-way participants-way-partner participants-way-filmfreeway" target="_blank" href="https://filmfreeway.com/">
                <img src="<?php echo get_template_directory_uri(); ?>/images/filmfreeway-logo-white.png" alt="FilmFreeway" width="365" height="168"/>
                <span>filmfreeway.com</span>
            </a>
        </div>
        <div class="page-content">
            <div class="participant-form">
                <?php echo do_shortcode('[contact-form-7 id="06a7e69" title="Стать участником"]'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>