<?php
    $poster = get_field('poster');
    $video = get_field('video');
    $videoLink = get_field('video_link');
?>
<?php if ($videoLink): ?>
    <a class="movie-item" data-fancybox href="<?php echo $videoLink; ?>">
        <div class="movie-image">
            <?php if ($poster): ?>
                <img
                    alt="<?php echo $poster['alt']; ?>"
                    class="lazyload blur-up"
                    data-src="<?php echo $poster['sizes']['large']; ?>"
                    src="<?php echo $poster['sizes']['thumbnail']; ?>"
                />
            <?php endif; ?>
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="64" height="64" rx="32"/>
                <path d="M25 41V23L40 32L25 41Z"/>
            </svg>
        </div>
        <div class="movie-name"><?php echo get_the_title(); ?></div>
    </a>
<?php elseif ($video): ?>
    <div class="video-wrapper" id="video-<?php echo get_the_ID(); ?>">
        <div class="video-inner" style="padding-top: <?php echo $video['height'] / $video['width'] * 100; ?>%">
            <video
                controls
                width="<?php echo $video['width']; ?>"
                height="<?php echo $video['height']; ?>"
                src="<?php echo $video['url']; ?>"
                <?php if ($poster): ?>
                    poster="<?php echo $poster['sizes']['large']; ?>"
                <?php endif; ?>
            ></video>
        </div>
    </div>
    <a class="movie-item" data-fancybox href="#video-<?php echo get_the_ID(); ?>">
        <div class="movie-image">
            <img
                alt="<?php echo $poster['alt']; ?>"
                class="lazyload blur-up"
                data-src="<?php echo $poster['sizes']['large']; ?>"
                src="<?php echo $poster['sizes']['thumbnail']; ?>"
            />
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="64" height="64" rx="32"/>
                <path d="M25 41V23L40 32L25 41Z"/>
            </svg>
        </div>
        <div class="movie-name"><?php echo get_the_title(); ?></div>
    </a>
<?php endif; ?>
