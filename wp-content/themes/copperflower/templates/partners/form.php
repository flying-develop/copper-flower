<button class="btn become-sponsor" data-src="#become-sponsor-form">
    <span>Стать спонсором</span>
</button>
<div id="become-sponsor-form" class="become-sponsor-form">
    <div class="become-sponsor-form-scroll">
        <div class="success-message">
            <!--noindex-->
            <div class="success-title">Заявка отправлена!</div>
            <div class="success-link btn">
                <span>Хорошо</span>
            </div>
            <!--/noindex-->
        </div>
        <div class="fail-message">
            <!--noindex-->
            <div class="fail-title">Произошел временный&nbsp;сбой!</div>
            <div class="fail-subtitle">Заявка не&nbsp;была&nbsp;отправлена, <span>попробуйте&nbsp;позднее</span></div>
            <div class="fail-link btn">
                <span>Хорошо</span>
            </div>
            <!--/noindex-->
        </div>
        <?php echo do_shortcode('[contact-form-7 id="35f4783" title="Стать спонсором"]'); ?>
    </div>
</div>