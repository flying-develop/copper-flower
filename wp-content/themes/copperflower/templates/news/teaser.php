<?php
    global $post;
    $thumbnail = get_post_thumbnail_id();
    $alt = $thumbnail ? get_post_meta($thumbnail, '_wp_attachment_image_alt', true) : '';
    $types = [
        'article' => 'Новость',
        'film' => 'Фильм'
    ];
    $type = get_field('type') ?? 'article';
    $video = get_field('video');
    $videoLink = get_field('video_link');
    $gallery = get_field('gallery');
    $text = get_field('text');
?>
<div class="news-popup" id="news-dialog-<?php echo get_the_ID(); ?>">
    <div class="news-popup-scroll">
        <?php if ($type == 'film'): ?>
            <?php if ($videoLink): ?>
                <div class="news-video">
                    <a class="video-btn" data-news-video href="<?php echo $videoLink; ?>">
                        <?php if ($thumbnail): ?>
                            <img
                                    alt="<?php echo $alt; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo wp_get_attachment_image_src($thumbnail)[0]; ?>"
                                    data-src="<?php echo wp_get_attachment_image_src($thumbnail, 'large')[0]; ?>"
                            />
                        <?php endif; ?>
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <rect width="64" height="64" rx="32"/>
                            <path d="M25 41V23L40 32L25 41Z"/>
                        </svg>
                    </a>
                </div>
            <?php elseif ($video): ?>
                <div class="news-video">
                    <a class="video-btn" data-news-video data-src="#news-video-<?php echo get_the_ID(); ?>">
                        <?php if ($thumbnail): ?>
                            <img
                                    alt="<?php echo $alt; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo wp_get_attachment_image_src($thumbnail)[0]; ?>"
                                    data-src="<?php echo wp_get_attachment_image_src($thumbnail, 'large')[0]; ?>"
                            />
                        <?php endif; ?>
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <rect width="64" height="64" rx="32"/>
                            <path d="M25 41V23L40 32L25 41Z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <?php if ($gallery && count($gallery) > 1): ?>
                <div class="news-image">
                    <?php foreach ($gallery as $image): ?>
                        <a class="gallery-btn" data-fancybox="gallery-popup-<?php echo get_the_ID(); ?>" href="<?php echo $image['url']; ?>">
                            <img
                                    alt="<?php echo $image['alt']; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo $image['sizes']['medium']; ?>"
                            />
                            <span><i>Смотреть <?php echo count($gallery); ?> фото</i></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($thumbnail): ?>
                <div class="news-image">
                    <img
                            alt="<?php echo $alt; ?>"
                            class="lazyload blur-up"
                            src="<?php echo wp_get_attachment_image_src($thumbnail)[0]; ?>"
                            data-src="<?php echo wp_get_attachment_image_src($thumbnail, 'large')[0]; ?>"
                    />
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="info">
            <div class="info-bundle">
                <span class="bundle"><?php echo $types[$type] ?? ''; ?></span>
                <span class="date"><?php echo get_the_date('j F H:i'); ?></span>
            </div>
            <div class="info-title"><?php echo get_the_title(); ?></div>
            <?php if ($text): ?>
                <div class="info-text"><?php echo $text; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if ($type == 'film' && !$videoLink && $video): ?>
    <div class="video-popup" id="news-video-<?php echo get_the_ID(); ?>">
        <div class="video-inner" style="padding-top: <?php echo $video['height'] / $video['width'] * 100; ?>%">
            <video
                    controls
                    width="<?php echo $video['width']; ?>"
                    height="<?php echo $video['height']; ?>"
                    src="<?php echo $video['url']; ?>"
                <?php if ($thumbnail): ?>
                    poster="<?php echo wp_get_attachment_image_src($thumbnail, 'large')[0]; ?>"
                <?php endif; ?>
            ></video>
        </div>
    </div>
<?php endif; ?>
<div class="news-item" data-type="<?php echo $type; ?>">
    <div class="news-item-inner">
        <div class="image">
            <span class="image-inner">
                <?php if ($thumbnail): ?>
                    <img
                        alt="<?php echo $alt; ?>"
                        class="lazyload blur-up"
                        src="<?php echo wp_get_attachment_image_src($thumbnail)[0]; ?>"
                        data-src="<?php echo wp_get_attachment_image_src($thumbnail, 'large')[0]; ?>"
                    />
                <?php endif; ?>
            </span>
            <?php if ($type == 'film'): ?>
                <?php if ($videoLink): ?>
                    <a class="video-btn" data-news-video href="<?php echo $videoLink; ?>">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <rect width="64" height="64" rx="32"/>
                            <path d="M25 41V23L40 32L25 41Z"/>
                        </svg>
                    </a>
                <?php elseif ($video): ?>
                    <a class="video-btn" data-news-video data-src="#news-video-<?php echo get_the_ID(); ?>">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <rect width="64" height="64" rx="32"/>
                            <path d="M25 41V23L40 32L25 41Z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <?php if ($gallery && count($gallery) > 1): ?>
                    <?php foreach ($gallery as $image): ?>
                        <a class="gallery-btn" data-fancybox="gallery-<?php echo get_the_ID(); ?>" href="<?php echo $image['url']; ?>">
                            <img
                                    alt="<?php echo $image['alt']; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo $image['sizes']['medium']; ?>"
                            />
                            <span><?php echo count($gallery); ?> фото</span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="info">
            <div class="info-bundle">
                <span class="bundle"><?php echo $types[$type] ?? ''; ?></span>
                <span class="date"><?php echo get_the_date('j F H:i'); ?></span>
            </div>
            <div class="info-title"><?php echo get_the_title(); ?></div>
            <div class="info-description"><?php echo get_the_excerpt(); ?></div>
            <button class="news-more" data-news-popup data-src="#news-dialog-<?php echo get_the_ID(); ?>"></button>
        </div>
    </div>
</div>
