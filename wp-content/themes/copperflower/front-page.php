<?php get_header(); ?>
<?php
	while ( have_posts() ) {
		the_post();
	} 
?>
<div class="front-top">
	<?php the_content(); ?>
</div>
<div class="front-bottom">
    <?php get_template_part( 'templates/front/news' ); ?>
    <?php get_template_part( 'templates/front/factoids' ); ?>
    <?php get_template_part( 'templates/front/quotes' ); ?>
</div>
<?php get_footer(); ?>