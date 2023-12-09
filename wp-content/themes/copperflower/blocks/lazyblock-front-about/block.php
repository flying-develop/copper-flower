<?php if (!empty($attributes['facts'])): ?>
    <div class="front-about">
        <div class="wrapper front-about-wrapper">
            <h2>О фестивале</h2>
            <div class="about-facts">
                <?php foreach ($attributes['facts'] as $fact): ?>
                    <div class="about-facts--fact">
                        <div class="about-facts--icon">
                            <?php if ($fact['icon']): ?>
                                <img src="<?php echo $fact['icon']['url']; ?>" alt="<?php echo $fact['icon']['alt']; ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="about-facts--text">
                            <div class="about-facts--title"><?php echo $fact['title']; ?></div>
                            <?php if ($fact['description']): ?>
                                <div class="about-facts--description"><?php echo $fact['description']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="about-btn">
                <a href="<?php echo get_permalink(130); ?>" class="btn btn--border">
                    <span>Узнать больше</span>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
