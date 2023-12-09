<?php $movies = get_field('movies'); ?>
<?php foreach ($movies as $movieIndex => $movie): ?>
    <div class="swiper-slide">
        <div class="movie-popup" id="movie-popup-<?php echo get_the_ID() . '-' . $movieIndex; ?>">
            <div class="movie-popup-scroll">
                <?php if ($movie['view'] == 'video'): ?>
                    <?php if ($movie['video_link']): ?>
                        <div class="movie-video">
                            <a class="video-btn" data-movie-video href="<?php echo $movie['video_link']; ?>">
                                <?php if ($movie['video_poster']): ?>
                                    <img
                                            alt="<?php echo $movie['video_poster']['alt'] ?>"
                                            class="lazyload blur-up"
                                            src="<?php echo $movie['video_poster']['sizes']['thumbnail']; ?>"
                                            data-src="<?php echo $movie['video_poster']['sizes']['large']; ?>"
                                    />
                                <?php endif; ?>
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                    <rect width="64" height="64" rx="32"/>
                                    <path d="M25 41V23L40 32L25 41Z"/>
                                </svg>
                            </a>
                        </div>
                    <?php elseif ($movie['video']): ?>
                        <div class="movie-video">
                            <a class="video-btn" data-movie-video data-src="#movie-video-<?php echo get_the_ID() . '-' . $movieIndex; ?>">
                                <?php if ($movie['video_poster']): ?>
                                    <img
                                            alt="<?php echo $movie['video_poster']['alt'] ?>"
                                            class="lazyload blur-up"
                                            src="<?php echo $movie['video_poster']['sizes']['thumbnail']; ?>"
                                            data-src="<?php echo $movie['video_poster']['sizes']['large']; ?>"
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
                    <?php if ($movie['gallery'] && count($movie['gallery']) > 1): ?>
                        <div class="movie-image">
                            <?php foreach ($movie['gallery'] as $image): ?>
                                <a class="gallery-btn" data-fancybox="gallery-popup-<?php echo get_the_ID() . '-' . $movieIndex; ?>" href="<?php echo $image['url']; ?>">
                                    <img
                                            alt="<?php echo $image['alt']; ?>"
                                            class="lazyload blur-up"
                                            src="<?php echo $image['sizes']['medium']; ?>"
                                    />
                                    <span><i>Смотреть <?php echo count($movie['gallery']); ?> фото</i></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="info">
                    <div class="info-season">Сезон <?php echo get_the_title(); ?></div>
                    <div class="info-name"><?php echo $movie['title']; ?></div>
                    <?php if ($movie['text']): ?>
                        <div class="info-text"><?php echo $movie['text']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($movie['view'] == 'video' && $movie['video'] && !$movie['video_link']): ?>
            <div class="video-popup" id="movie-video-<?php echo get_the_ID() . '-' . $movieIndex; ?>">
                <div class="video-inner" style="padding-top: <?php echo $movie['video']['height'] / $movie['video']['width'] * 100; ?>%">
                    <video
                            controls
                            width="<?php echo $movie['video']['width']; ?>"
                            height="<?php echo $movie['video']['height']; ?>"
                            src="<?php echo $movie['video']['url']; ?>"
                        <?php if ($movie['video_poster']): ?>
                            poster="<?php echo $movie['video_poster']['sizes']['large']; ?>"
                        <?php endif; ?>
                    ></video>
                </div>
            </div>
        <?php endif; ?>
        <div class="movie">
            <span class="movie-popup-trigger" data-movie-popup data-src="#movie-popup-<?php echo get_the_ID() . '-' . $movieIndex; ?>"></span>
            <div class="movie-image">
                <div class="movie-image-inner">
                    <?php if ($movie['poster']): ?>
                        <img
                            alt="<?php echo $movie['poster']['alt']; ?>"
                            class="lazyload blup-up"
                            data-src="<?php echo $movie['poster']['sizes']['large']; ?>"
                            src="<?php echo $movie['poster']['sizes']['thumbnail']; ?>"
                        />
                    <?php else: ?>
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5" clip-path="url(#clip0_956_3476)">
                                <path d="M45 8.99995H19.875C19.7233 9.01587 19.57 8.9977 19.4263 8.94679C19.2826 8.89588 19.152 8.81351 19.0442 8.7057C18.9364 8.59788 18.854 8.46734 18.8031 8.32361C18.7522 8.17988 18.734 8.0266 18.75 7.87495V5.62495C18.766 5.27598 18.709 4.9275 18.5828 4.60178C18.4565 4.27605 18.2637 3.98023 18.0167 3.73321C17.7697 3.48619 17.4739 3.29339 17.1481 3.16714C16.8224 3.04089 16.4739 2.98395 16.125 2.99995H2.62495C2.27598 2.98395 1.9275 3.04089 1.60178 3.16714C1.27605 3.29339 0.98023 3.48619 0.733209 3.73321C0.486188 3.98023 0.293395 4.27605 0.16714 4.60178C0.0408858 4.9275 -0.0160549 5.27598 -4.57773e-05 5.62495V42.0937C0.00407475 42.9085 0.327148 43.6892 0.899954 44.2687C1.31109 44.6836 1.85865 44.9354 2.4412 44.9775C2.50129 44.9925 2.56301 45.0001 2.62495 45H45.375C46.995 45 48 43.4437 48 42V12C48 10.095 46.905 8.99995 45 8.99995ZM20.9625 31.6425L32.1862 25.2037L46.5 32.3025V41.9175L20.9625 31.6425ZM2.62495 4.49995H16.125C16.2766 4.48404 16.4299 4.5022 16.5736 4.55311C16.7173 4.60402 16.8479 4.6864 16.9557 4.79421C17.0635 4.90203 17.1459 5.03257 17.1968 5.1763C17.2477 5.32003 17.2659 5.47331 17.25 5.62495V7.87495C17.2339 8.22393 17.2909 8.5724 17.4171 8.89813C17.5434 9.22386 17.7362 9.51968 17.9832 9.7667C18.2302 10.0137 18.526 10.2065 18.8518 10.3328C19.1775 10.459 19.526 10.516 19.875 10.5H45C46.08 10.5 46.5 10.92 46.5 12V30.6262L32.4937 23.6812C32.3837 23.6263 32.2618 23.5993 32.1389 23.6025C32.0159 23.6058 31.8957 23.6393 31.7887 23.7L19.1887 30.93L13.0687 28.47C12.9636 28.4277 12.8503 28.4098 12.7373 28.4176C12.6243 28.4254 12.5145 28.4587 12.4162 28.515L1.49995 34.755V5.62495C1.48404 5.47331 1.5022 5.32003 1.55311 5.1763C1.60402 5.03257 1.6864 4.90203 1.79421 4.79421C1.90203 4.6864 2.03257 4.60402 2.1763 4.55311C2.32003 4.5022 2.47331 4.48404 2.62495 4.49995ZM2.7862 43.5C2.73251 43.4966 2.67865 43.4966 2.62495 43.5C2.5016 43.5004 2.37946 43.4757 2.26598 43.4273C2.1525 43.379 2.05008 43.308 1.96495 43.2187C1.67304 42.9171 1.51026 42.5135 1.5112 42.0937V36.4687H1.5487L12.8475 30L45.9187 43.305C45.7642 43.4287 45.5729 43.4973 45.375 43.5H2.7862Z" fill="#2E2E2E"/>
                                <path d="M15.2814 24.105C16.4155 24.105 17.5243 23.7686 18.4672 23.1384C19.4102 22.5082 20.1451 21.6125 20.579 20.5645C21.0129 19.5166 21.1262 18.3636 20.9047 17.2512C20.6831 16.1389 20.1367 15.1172 19.3344 14.3155C18.5322 13.5138 17.5101 12.968 16.3977 12.7472C15.2852 12.5264 14.1322 12.6404 13.0845 13.075C12.0369 13.5095 11.1417 14.245 10.5121 15.1884C9.88252 16.1318 9.54687 17.2408 9.54761 18.375C9.55058 19.8944 10.1557 21.3507 11.2305 22.4247C12.3052 23.4988 13.7619 24.103 15.2814 24.105ZM15.2814 14.1375C16.1186 14.1375 16.937 14.3857 17.6331 14.8507C18.3293 15.3158 18.8719 15.9768 19.1925 16.7502C19.513 17.5236 19.5971 18.3746 19.434 19.1958C19.271 20.017 18.8681 20.7713 18.2764 21.3636C17.6847 21.9558 16.9306 22.3594 16.1096 22.5231C15.2886 22.6869 14.4375 22.6036 13.6638 22.2838C12.8901 21.9639 12.2286 21.4218 11.7629 20.7261C11.2973 20.0303 11.0484 19.2122 11.0476 18.375C11.0486 17.2521 11.4949 16.1754 12.2885 15.381C13.0822 14.5866 14.1585 14.1394 15.2814 14.1375Z" fill="#2E2E2E"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_956_3476">
                                    <rect width="48" height="48" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    <?php endif; ?>
                </div>
                <?php if ($movie['view'] == 'gallery' && count($movie['gallery']) > 1): ?>
                    <?php foreach ($movie['gallery'] as $image): ?>
                        <a class="gallery-btn" data-fancybox="gallery-<?php echo get_the_ID() . '-' . $movieIndex; ?>" href="<?php echo $image['url']; ?>">
                            <img
                                    alt="<?php echo $image['alt']; ?>"
                                    class="lazyload blur-up"
                                    src="<?php echo $image['sizes']['medium']; ?>"
                            />
                            <span><?php echo count($movie['gallery']); ?> фото</span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($movie['view'] == 'video'): ?>
                    <?php if ($movie['video_link']): ?>
                        <a class="video-btn" data-movie-video href="<?php echo $movie['video_link']; ?>">
                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <rect width="64" height="64" rx="32"/>
                                <path d="M25 41V23L40 32L25 41Z"/>
                            </svg>
                        </a>
                    <?php elseif ($movie['video']): ?>
                        <a class="video-btn" data-movie-video data-src="#movie-video-<?php echo get_the_ID() . '-' . $movieIndex; ?>">
                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <rect width="64" height="64" rx="32"/>
                                <path d="M25 41V23L40 32L25 41Z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="movie-season">Сезон <?php echo get_the_title(); ?></div>
            <div class="movie-name"><?php echo $movie['title']; ?></div>
            <?php if ($movie['teaser']): ?>
                <div class="movie-description"><?php echo $movie['teaser']; ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
