<?php
    $photo = get_post_thumbnail_id();
    $alt = $photo ? get_post_meta($photo, '_wp_attachment_image_alt', true) : '';
    $tag = get_field('tag');
    $description = get_the_excerpt();
?>
<a href="<?php echo get_permalink(); ?>" class="project-item">
    <div class="project-item-photo">
        <?php if ($photo): ?>
            <img
                alt="<?php echo $alt; ?>"
                class="lazyload blur-up"
                src="<?php echo wp_get_attachment_image_src($photo)[0]; ?>"
                data-src="<?php echo wp_get_attachment_image_src($photo, 'large')[0]; ?>"
            />
        <?php endif; ?>
    </div>
    <div class="project-item-info">
        <?php if ($tag): ?>
            <span class="tag"><?php echo $tag; ?></span>
        <?php endif; ?>
        <span class="date"><?php echo get_the_date('j F H:i'); ?></span>
    </div>
    <div class="project-item-name"><?php echo get_the_title(); ?></div>
    <?php if ($description): ?>
        <div class="project-item-description"><?php echo $description; ?></div>
    <?php endif; ?>
</a>
