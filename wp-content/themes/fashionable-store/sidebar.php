<aside id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
        <div id="primary" class="widget-area">
            <?php dynamic_sidebar( 'primary-sidebar' ); ?>
        </div>
    <?php else: ?>
        <div class="add-widgets">
            <?php echo esc_html__('Please add widgets here.','fashionable-store'); ?>
        </div>
	<?php endif; ?>
</aside>