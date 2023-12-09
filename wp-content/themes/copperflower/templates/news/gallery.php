<?php $gallery = get_field('gallery'); ?>
<div class="gallery-item">
    <div class="info">
        <div class="info-title"><?php echo get_the_title(); ?></div>
        <div class="info-plural"><?php echo count($gallery); ?> фото</div>
    </div>
    <div class="slider" data-length="<?php echo count($gallery); ?>">
        <div class="swiper-button-prev swiper-button swiper-button-disabled">
            <svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 25V15L16 20L24 25Z"/>
            </svg>
        </div>
        <div class="swiper-button-next swiper-button">
            <svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 25V15L24 20L16 25Z"/>
            </svg>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($gallery as $image): ?>
                    <div class="swiper-slide">
                        <a data-fancybox="gallery-<?php echo get_the_ID(); ?>" href="<?php echo $image['url']; ?>">
                            <img
                                alt="<?php echo $image['alt']; ?>"
                                class="lazyload blur-up"
                                src="<?php echo $image['sizes']['thumbnail']; ?>"
                                data-src="<?php echo $image['sizes']['large']; ?>"
                            />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="left-shadow"></div>
            <div class="right-shadow"></div>
        </div>
        <div class="swiper-scrollbar"></div>
    </div>
</div>