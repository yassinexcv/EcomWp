<ul class="blog-item-meta">
    <li><?php
        echo fashionable_store_post_categories(); ?>
    </li>
    <li><?php esc_html__('on', 'fashionable-store'); ?><?php echo esc_html(get_the_time(get_option('date_format'))); ?></li>
</ul>