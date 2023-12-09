<?php
    $events = get_field('events'); 
?>
<?php if ($events): ?>
    <?php foreach ($events as $eventIndex => $event): ?>
        <?php if (empty($event['type'])) continue; ?>
        <div class="history-item" data-type="<?php echo $event['type']; ?>">
            <div class="history-image">
                <div class="history-image-inner">
                    <?php if ($event['type'] == 'text'): ?>
                        <?php if ($event['image']): ?>
                            <img
                                alt="<?php echo $event['image']['alt']; ?>"
                                data-src="<?php echo $event['image']['sizes']['large']; ?>"
                                src="<?php echo $event['image']['sizes']['thumbnail']; ?>"
                                class="lazyload blur-up"
                            />
                        <?php endif; ?>
                    <?php elseif ($event['type'] == 'gallery'): ?>
                        <?php if ($event['gallery']): ?>
                            <?php if (count($event['gallery']) > 1): ?>
                                <?php foreach ($event['gallery'] as $galleryIndex => $galleryImage): ?>
                                    <a data-fancybox="history-<?php echo $eventIndex . '-' . get_the_ID(); ?>" data-src="<?php echo $galleryImage['url']; ?>">
                                        <img
                                            alt="<?php echo $galleryImage['alt']; ?>"
                                            class="lazyload blur-up"
                                            data-src="<?php echo $galleryImage['sizes']['large']; ?>"
                                            src="<?php echo $galleryImage['sizes']['thumbnail']; ?>"
                                        />
                                        <span><?php echo count($event['gallery']); ?> фото</span>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($event['gallery'] as $galleryIndex => $galleryImage): ?>
                                    <img
                                            alt="<?php echo $galleryImage['alt']; ?>"
                                            class="lazyload blur-up"
                                            data-src="<?php echo $galleryImage['sizes']['large']; ?>"
                                            src="<?php echo $galleryImage['sizes']['thumbnail']; ?>"
                                    />
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php elseif ($event['type'] == 'video'): ?>
                        <?php if ($event['video_link']): ?>
                            <a data-fancybox href="<?php echo $event['video_link']; ?>">
                                <?php if ($event['image']): ?>
                                    <img
                                        alt="<?php echo $event['image']['alt']; ?>"
                                        data-src="<?php echo $event['image']['sizes']['large']; ?>"
                                        src="<?php echo $event['image']['sizes']['thumbnail']; ?>"
                                        class="lazyload blur-up"
                                    />
                                <?php endif; ?>
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="32"/>
                                    <path d="M25 41V23L40 32L25 41Z"/>
                                </svg>
                            </a>
                        <?php elseif ($event['video']): ?>
                            <div class="video-wrapper" id="video-<?php echo $eventIndex . '-' . get_the_ID(); ?>">
                                <div class="video-inner" style="padding-top: <?php echo $event['video']['height'] / $event['video']['width'] * 100; ?>%">
                                    <video
                                        controls
                                        width="<?php echo $event['video']['width']; ?>"
                                        height="<?php echo $event['video']['height']; ?>"
                                        src="<?php echo $event['video']['url']; ?>"
                                        <?php if ($event['image']): ?>
                                            poster="<?php echo $event['image']['sizes']['large']; ?>"
                                        <?php endif; ?>
                                    ></video>
                                </div>
                            </div>
                            <a data-fancybox href="#video-<?php echo $eventIndex . '-' . get_the_ID(); ?>">
                                <?php if ($event['image']): ?>
                                    <img
                                        alt="<?php echo $event['image']['alt']; ?>"
                                        data-src="<?php echo $event['image']['sizes']['large']; ?>"
                                        src="<?php echo $event['image']['sizes']['thumbnail']; ?>"
                                        class="lazyload blur-up"
                                    />
                                <?php endif; ?>
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="32"/>
                                    <path d="M25 41V23L40 32L25 41Z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="history-content"><?php echo $event['text']; ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
