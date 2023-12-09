<?php

$interviews = new WP_query([
    'post_type' => 'interview',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 999,
    'post_status' => 'publish'
]);

?>
<?php if ($interviews->have_posts()): ?>
    <div class="participants-interviews">
        <div class="block-title">
            <h2>Интервью участников</h2>
        </div>
        <div class="interviews-slider" data-length="<?php echo $interviews->post_count; ?>">
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
                    <?php
                        while ($interviews->have_posts()) {
                            $interviews->the_post();
                            get_template_part('templates/participants/interview');
                        } wp_reset_postdata();
                    ?>
                </div>
                <div class="left-shadow"></div>
                <div class="right-shadow"></div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
<?php endif; ?>
