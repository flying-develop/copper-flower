<?php $team = get_field('team'); ?>
<div class="about-team">
    <h5>Команда</h5>
    <div class="about-team-text"><?php echo $team['text']; ?></div>
    <?php if ($team['gallery']): ?>
        <div class="about-team-slider" data-length="<?php echo count($team['gallery']); ?>">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($team['gallery'] as $image): ?>
                        <div class="swiper-slide">
                            <div class="image">
                                <img
                                    width="<?php echo $image['sizes']['large-width']; ?>"
                                    height="<?php echo $image['sizes']['large-height']; ?>"
                                    alt="<?php echo $image['alt']; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo $image['sizes']['thumbnail']; ?>"
                                    data-src="<?php echo $image['sizes']['large']; ?>"
                                />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
            <div class="swiper-navigation">
                <div class="swiper-button-prev swiper-button">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="28" fill="white"/>
                        <path d="M30 33V23L22 28L30 33Z" fill="#F5764E"/>
                    </svg>
                </div>
                <div class="swiper-button-next swiper-button">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="28" fill="white"/>
                        <path d="M24 33V23L32 28L24 33Z" fill="#F5764E"/>
                    </svg>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>