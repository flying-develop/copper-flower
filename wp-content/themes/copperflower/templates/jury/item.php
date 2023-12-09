<?php
    $members = get_field('members');
?>
<?php if ($members): ?>
    <?php foreach ($members as $memberIndex => $member): ?>
        <div class="jury-member">
            <div class="member-popup" id="member-popup-<?php echo get_the_ID() . '-' . $memberIndex; ?>">
                <div class="member-popup-scroll">
                    <?php if ($member['view'] == 'video'): ?>
                        <?php if ($member['video_link']): ?>
                            <div class="member-video">
                                <a class="video-btn" data-member-video href="<?php echo $member['video_link']; ?>">
                                    <?php if ($member['poster']): ?>
                                        <img
                                                alt="<?php echo $member['poster']['alt'] ?>"
                                                class="lazyload blur-up"
                                                src="<?php echo $member['poster']['sizes']['thumbnail']; ?>"
                                                data-src="<?php echo $member['poster']['sizes']['large']; ?>"
                                        />
                                    <?php endif; ?>
                                    <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                        <rect width="64" height="64" rx="32"/>
                                        <path d="M25 41V23L40 32L25 41Z"/>
                                    </svg>
                                </a>
                            </div>
                        <?php elseif ($member['video']): ?>
                            <div class="member-video">
                                <a class="video-btn" data-member-video data-src="#member-video-<?php echo get_the_ID() . '-' . $memberIndex; ?>">
                                    <?php if ($member['poster']): ?>
                                        <img
                                                alt="<?php echo $member['poster']['alt'] ?>"
                                                class="lazyload blur-up"
                                                src="<?php echo $member['poster']['sizes']['thumbnail']; ?>"
                                                data-src="<?php echo $member['poster']['sizes']['large']; ?>"
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
                        <?php if ($member['gallery'] && count($member['gallery']) > 1): ?>
                            <div class="member-image">
                                <?php foreach ($member['gallery'] as $image): ?>
                                    <a class="gallery-btn" data-fancybox="gallery-popup-<?php echo get_the_ID() . '-' . $memberIndex; ?>" href="<?php echo $image['url']; ?>">
                                        <img
                                                alt="<?php echo $image['alt']; ?>"
                                                class="lazyload blur-up"
                                                src="<?php echo $image['sizes']['medium']; ?>"
                                        />
                                        <span><i>Смотреть <?php echo count($member['gallery']); ?> фото</i></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="info">
                        <div class="info-name"><?php echo $member['name']; ?></div>
                        <?php if ($member['amplua']): ?>
                            <div class="info-amplua"><?php echo $member['amplua']; ?></div>
                        <?php endif; ?>
                        <?php if ($member['text']): ?>
                            <div class="info-text"><?php echo $member['text']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($member['view'] == 'video' && $member['video'] && !$member['video_link']): ?>
                <div class="video-popup" id="member-video-<?php echo get_the_ID() . '-' . $memberIndex; ?>">
                    <div class="video-inner" style="padding-top: <?php echo $member['video']['height'] / $member['video']['width'] * 100; ?>%">
                        <video
                                controls
                                width="<?php echo $member['video']['width']; ?>"
                                height="<?php echo $member['video']['height']; ?>"
                                src="<?php echo $member['video']['url']; ?>"
                            <?php if ($member['poster']): ?>
                                poster="<?php echo $member['poster']['sizes']['large']; ?>"
                            <?php endif; ?>
                        ></video>
                    </div>
                </div>
            <?php endif; ?>
            <span class="member-popup-trigger" data-member-popup data-src="#member-popup-<?php echo get_the_ID() . '-' . $memberIndex; ?>"></span>
            <div class="jury-member-photo">
                <div class="jury-member-photo-inner">
                    <?php if ($member['photo']): ?>
                        <img
                            alt="<?php echo $member['photo']['alt'] ?>"
                            class="lazyload blur-up"
                            src="<?php echo $member['photo']['sizes']['thumbnail']; ?>"
                            data-src="<?php echo $member['photo']['sizes']['large']; ?>"
                        />
                    <?php endif; ?>
                    <?php if ($member['view'] == 'gallery' && count($member['gallery']) > 1): ?>
                        <?php foreach ($member['gallery'] as $image): ?>
                            <a class="gallery-btn" data-fancybox="gallery-<?php echo get_the_ID() . '-' . $memberIndex; ?>" href="<?php echo $image['url']; ?>">
                                <img
                                        alt="<?php echo $image['alt']; ?>"
                                        class="lazyload blur-up"
                                        src="<?php echo $image['sizes']['medium']; ?>"
                                />
                                <span><?php echo count($member['gallery']); ?> фото</span>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($member['view'] == 'video'): ?>
                        <?php if ($member['video_link']): ?>
                            <a class="video-btn" data-member-video href="<?php echo $member['video_link']; ?>">
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                    <rect width="64" height="64" rx="32"/>
                                    <path d="M25 41V23L40 32L25 41Z"/>
                                </svg>
                            </a>
                        <?php elseif ($member['video']): ?>
                            <a class="video-btn" data-member-video data-src="#member-video-<?php echo get_the_ID() . '-' . $memberIndex; ?>">
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                    <rect width="64" height="64" rx="32"/>
                                    <path d="M25 41V23L40 32L25 41Z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="jury-member-name"><?php echo $member['name']; ?></div>
            <?php if ($member['amplua']): ?>
                <div class="jury-member-amplua"><?php echo $member['amplua']; ?></div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
