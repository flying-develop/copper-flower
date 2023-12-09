<?php
    $historyItems = new WP_query([
        'post_type' => 'history',
        'orderby' => 'title',
        'order' => 'DESC',
        'posts_per_page' => 999,
        'post_status' => 'publish'
    ]);

    $history = [];
    $activeYear = 0;
    if ($historyItems->have_posts()) {
        while ($historyItems->have_posts()) {
            $historyItems->the_post();
            ob_start();
            get_template_part('templates/about/event');
            $event = ob_get_clean();
            $year = get_the_title();
            if (!isset($history[$year])) {
                $history[$year] = [];
            }
            $history[$year][] = $event;
            if (!$activeYear) {
                $activeYear = $year;
            }
        } wp_reset_postdata();
    }
?>
<?php if ($history): ?>
    <div class="about-history">
        <div class="about-history-top">
            <div class="page-title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="about-history-nav">
                <div class="wall"></div>
                <div class="about-history-items">
                    <?php foreach ($history as $year => $events): ?>
                        <div class="about-history-item">
                            <input type="radio" name="history_year" <?php echo $year == $activeYear ? 'checked' : ''; ?> value="<?php echo $year; ?>" id="history_year-<?php echo $year; ?>"/>
                            <label for="history_year-<?php echo $year; ?>"><?php echo $year; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="wall"></div>
            </div>
        </div>
         <?php foreach ($history as $year => $events): ?>
            <div class="history-events" data-active="<?php echo $year == $activeYear ? 'true' : 'false'; ?>" data-year="<?php echo $year; ?>">
                <?php foreach ($events as $event): ?>
                    <?php echo $event; ?>
                <?php endforeach; ?>
            </div>
         <?php endforeach; ?>
    </div>
<?php endif; ?>
