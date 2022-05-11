<section id="comments">
    <?php
    if (have_comments()) :
        global $comments_by_type;
        $comments_by_type = separate_comments($comments);
        if (!empty($comments_by_type['comment'])) :
            ?>
            <section id="comments-list" class="comments">
                <h3 class="comments-title"><?php comments_number(); ?> <?php echo esc_html__('on ','fashionable-store').'<strong>'.get_the_title().'</strong>' ?> </h3>
                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav id="comments-nav-above" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>

                <?php wp_list_comments(array(
                    'callback'=>'fashionable_store_comment',
                    'end-callback'=>'fashionable_store_comment_end'
                )); ?>

                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav id="comments-nav-below" class="comments-navigation" role="navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
            </section>
        <?php
        endif;
        if (!empty($comments_by_type['pings'])) :
            $ping_count = count($comments_by_type['pings']);
            ?>
            <section id="trackbacks-list" class="comments">
                <h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ($ping_count > 1 ? __('Trackbacks', 'fashionable-store') : __('Trackback', 'fashionable-store')); ?></h3>
                <ul>
                    <?php wp_list_comments(); ?>
                </ul>
            </section>
        <?php
        endif;
    endif;
    if (comments_open()) comment_form();
    ?>
</section>