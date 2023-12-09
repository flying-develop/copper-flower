<?php if (!empty($attributes['gallery'])): ?>
    <?php $hash = md5('video' . rand(0, 999999)); ?>
    <div class="page-image">
        <?php if (count($attributes['gallery']) > 1): ?>
            <?php foreach ($attributes['gallery'] as $image): ?>
                <a class="gallery-btn" data-fancybox="gallery-popup-<?php echo $hash; ?>" href="<?php echo $image['url']; ?>">
                    <img
                        alt="<?php echo $image['alt']; ?>"
                        class="lazyload blur-up"
                        src="<?php echo wp_get_attachment_image_src($image['id'])[0]; ?>"
                        data-src="<?php echo wp_get_attachment_image_src($image['id'], 'large')[0]; ?>"
                    />
                    <span><i>Смотреть <?php echo count($attributes['gallery']); ?> фото</i></span>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <?php foreach ($attributes['gallery'] as $image): ?>
                <img
                    alt="<?php echo $image['alt']; ?>"
                    class="lazyload blur-up"
                    src="<?php echo wp_get_attachment_image_src($image['id'])[0]; ?>"
                    data-src="<?php echo wp_get_attachment_image_src($image['id'], 'large')[0]; ?>"
                />
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
