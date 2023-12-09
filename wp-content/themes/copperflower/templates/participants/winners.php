<?php
    $winnerItems = new WP_query([
        'post_type' => 'winner',
        'orderby' => 'title',
        'order' => 'DESC',
        'posts_per_page' => 999,
        'post_status' => 'publish'
    ]);

    $winners = [];
    $activeYear = 0;
    if ($winnerItems->have_posts()) {
        while ($winnerItems->have_posts()) {
            $winnerItems->the_post();
            ob_start();
            get_template_part('templates/participants/movies');
            $movies = ob_get_clean();
            $year = get_the_title();
            if (!isset($winners[$year])) {
                $winners[$year] = [
                    'count' => 0,
                    'movies' => []
                ];
            }
            $winners[$year]['count'] += count(get_field('movies') ?? []);
            $winners[$year]['movies'][] = $movies;
            if (!$activeYear) {
                $activeYear = $year;
            }
        } wp_reset_postdata();
    }
?>
<?php if ($winners): ?>
    <div class="participants-winners">
        <div class="participants-winners-top">
            <div class="block-title">
                <h2>Победители</h2>
            </div>
            <div class="participants-winners-nav">
                <div class="wall"></div>
                <div class="participants-winners-items">
                    <?php foreach ($winners as $year => $movies): ?>
                        <div class="participants-winners-item">
                            <input type="radio" name="winners_year" <?php echo $year == $activeYear ? 'checked' : ''; ?> value="<?php echo $year; ?>" id="winners_year-<?php echo $year; ?>"/>
                            <label for="winners_year-<?php echo $year; ?>"><?php echo $year; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="wall"></div>
            </div>
        </div>
        <?php foreach ($winners as $year => $movies): ?>
            <div class="winners-movies" data-active="<?php echo $year == $activeYear ? 'true' : 'false'; ?>" data-year="<?php echo $year; ?>" data-length="<?php echo $movies['count']; ?>">
                <div class="swiper-button-prev swiper-button swiper-button-disabled">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="28" fill="white"></rect>
                        <path d="M30 33V23L22 28L30 33Z" fill="#F5764E"></path>
                    </svg>
                </div>
                <div class="swiper-button-next swiper-button">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="28" fill="white"></rect>
                        <path d="M24 33V23L32 28L24 33Z" fill="#F5764E"></path>
                    </svg>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($movies['movies'] as $movie): ?>
                            <?php echo $movie; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="left-shadow"></div>
                    <div class="right-shadow"></div>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
