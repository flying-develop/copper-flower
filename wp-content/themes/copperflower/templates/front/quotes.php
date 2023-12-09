<?php $quotes = get_field('quotes'); ?>
<?php if ($quotes): ?>
    <div class="front-quotes">
        <div class="wrapper quotes-wrapper">
            <div class="quotes" data-length="<?php echo count($quotes); ?>">
                <?php foreach ($quotes as $quote): ?>
                    <div class="quotes--quote">
                        <?php if ($quote['role']): ?>
                            <div class="quotes--quote__role"><?php echo $quote['role']; ?></div>
                        <?php endif; ?>
                        <?php if ($quote['name']): ?>
                            <div class="quotes--quote__name"><?php echo $quote['name']; ?></div>
                        <?php endif; ?>
                        <div class="quotes--quote__text"><?php echo nl2br($quote['quote']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
