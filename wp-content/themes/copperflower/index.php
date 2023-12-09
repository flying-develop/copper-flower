<?php get_header(); ?>
<?php
	while ( have_posts() ) {
		the_post();
	} 
?>
<div class="wrapper page-wrapper">
    <?php if (is_singular( 'project' )): ?>
        <?php $tag = get_field('tag'); ?>
        <div class="project-top">
            <?php if ($tag): ?>
                <span class="tag"><?php echo $tag; ?></span>
            <?php endif; ?>
            <span class="date"><?php echo get_the_date('j F H:i'); ?></span>
        </div>
    <?php endif; ?>
	<div class="page-title">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="page-content"><?php the_content(); ?></div>
</div>

<?php get_footer(); ?>