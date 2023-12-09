<?php if (!empty($attributes['slides'])): ?>
    <div class="front-slider" data-length="<?php echo count($attributes['slides']); ?>">
        <div class="swiper-wrapper">
            <?php foreach ($attributes['slides'] as $index => $slide): ?>
                <div class="swiper-slide">
                    <div class="picture">
                        <?php if ($slide['img']): ?>
                            <?php if ($slide['img_mobile']): ?>
                                <?php echo generateImage($slide['img_mobile'], '(max-width: 1023.98px) 200vw, 140vw', $index > 0, 'mobile-img'); ?>
                            <?php endif; ?>
                            <?php echo generateImage($slide['img'], '(max-width: 1023.98px) 200vw, 140vw', $index > 0); ?>
                        <?php endif; ?>
                    </div>
                    <div class="wrapper slide-wrapper">
                        <?php if ($slide['title'] || $slide['link']): ?>
                            <div class="slide-content">
                                <?php if ($slide['title']): ?>
                                    <div class="slide-content--text">
                                        <div class="slide-content--text__title"><?php echo nl2br($slide['title']); ?></div>
                                        <?php if ($slide['description']): ?>
                                            <div class="slide-content--text__description"><?php echo nl2br($slide['description']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($slide['link']): ?>
                                    <a href="<?php echo $slide['link']; ?>" class="btn">
                                        <span><?php echo $slide['link_text'] ?? 'Подробнее'; ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-scrollbar"></div>
        <div class="wrapper swiper-navigation-wrapper">
            <div class="swiper-navigation">
                <div class="swiper-button-prev swiper-button">
                    <svg width="40" height="40" viewBox="0 0 40 40"xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 25V15L16 20L24 25Z"/>
                    </svg>
                </div>
                <div class="swiper-button-next swiper-button">
                    <svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 25V15L24 20L16 25Z"/>
                    </svg>
                </div>
                <div class="autoplay-progress">
                    <svg viewBox="0 0 40 40">
                        <circle cx="20" cy="20" r="19"></circle>
                    </svg>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>