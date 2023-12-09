<?php
    $logo = get_post_thumbnail_id();
    $alt = $logo ? get_post_meta($logo, '_wp_attachment_image_alt', true) : '';
    $site = get_field('site');
    $link = get_field('link');
?>
<?php if ($link): ?>
    <a class="partner-item" href="<?php echo $link; ?>" target="_blank">
        <div class="partner-item-logo">
            <?php if ($logo): ?>
                <img
                    alt="<?php echo $alt; ?>"
                    class="lazyload blur-up"
                    src="<?php echo wp_get_attachment_image_src($logo, 'large')[0]; ?>"
                />
            <?php else: ?>
                <span class="no-logo"></span>
            <?php endif; ?>
        </div>
        <div class="partner-item-name"><?php echo get_the_title(); ?></div>
        <?php if ($site): ?>
            <div class="partner-item-site"><?php echo $site; ?></div>
        <?php endif; ?>
    </a>
<?php else: ?>
    <div class="partner-item">
        <div class="partner-item-logo">
            <?php if ($logo): ?>
                <img
                    alt="<?php echo $alt; ?>"
                    class="lazyload blur-up"
                    src="<?php echo wp_get_attachment_image_src($logo, 'large')[0]; ?>"
                />
            <?php else: ?>
                <span class="no-logo"></span>
            <?php endif; ?>
        </div>
        <div class="partner-item-name"><?php echo get_the_title(); ?></div>
        <?php if ($site): ?>
            <div class="partner-item-site"><?php echo $site; ?></div>
        <?php endif; ?>
    </div>
<?php endif; ?>