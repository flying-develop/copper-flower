<?php if (!empty($attributes['video']['id']) || !empty($attributes['video_link'])): ?>
    <?php $hash = md5('video' . rand(0, 999999)); ?>
    <?php if (!empty($attributes['video']['id']) && empty($attributes['video_link'])): ?>
        <?php $video = wp_get_attachment_metadata( $attributes['video']['id'] ); ?>
        <div class="video-popup" id="page-video-<?php echo $hash; ?>">
            <div class="video-inner" style="padding-top: <?php echo $video['height'] / $video['width'] * 100; ?>%">
                <video
                    controls
                    width="<?php echo $video['width']; ?>"
                    height="<?php echo $video['height']; ?>"
                    src="<?php echo $attributes['video']['url']; ?>"
                    <?php if (!empty($attributes['poster']['id'])): ?>
                        poster="<?php echo wp_get_attachment_image_src($attributes['poster']['id'], 'large')[0]; ?>"
                    <?php endif; ?>
                ></video>
            </div>
        </div>
        <div class="page-video">
            <a class="video-btn" data-page-video data-src="#page-video-<?php echo $hash; ?>">
                <?php if (!empty($attributes['poster']['id'])): ?>
                    <img
                            alt="<?php echo $attributes['poster']['alt']; ?>"
                            class="lazyload blur-up"
                            src="<?php echo wp_get_attachment_image_src($attributes['poster']['id'])[0]; ?>"
                            data-src="<?php echo wp_get_attachment_image_src($attributes['poster']['id'], 'large')[0]; ?>"
                    />
                <?php endif; ?>
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <rect width="64" height="64" rx="32"/>
                    <path d="M25 41V23L40 32L25 41Z"/>
                </svg>
            </a>
        </div>
    <?php elseif (!empty($attributes['video_link'])): ?>
        <div class="page-video">
            <a class="video-btn" data-page-video href="<?php echo $attributes['video_link']; ?>">
                <?php if (!empty($attributes['poster']['id'])): ?>
                    <img
                            alt="<?php echo $attributes['poster']['alt']; ?>"
                            class="lazyload blur-up"
                            src="<?php echo wp_get_attachment_image_src($attributes['poster']['id'])[0]; ?>"
                            data-src="<?php echo wp_get_attachment_image_src($attributes['poster']['id'], 'large')[0]; ?>"
                    />
                <?php endif; ?>
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <rect width="64" height="64" rx="32"/>
                    <path d="M25 41V23L40 32L25 41Z"/>
                </svg>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>