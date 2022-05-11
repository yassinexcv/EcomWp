<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-item blog-item-style-1'); ?>>
            <div class="columns">
                <div class="column col-6 col-md-12">
                    <?php get_template_part('template-parts/content/content-elements/featured-image'); ?>
                </div>

                <div class="column col-6 col-md-12">

                    <div class="blog-item-inner-texts">
                        <?php get_template_part('template-parts/content/content-elements/blog-item-title'); ?>
                        <?php get_template_part('template-parts/content/content-elements/meta'); ?>
                        <p><?php the_excerpt(); ?></p>

                        <a href="<?php the_permalink(); ?>" class="read-more-link is-600">
                            <?php echo apply_filters('fashionable_store_readmore_txt',
                                esc_html__('Continue Reading', 'fashionable-store')); ?> <span class="fas fa-arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div><!-- Columns -->
        </article>
    <?php endwhile; ?>

    <?php get_template_part('template-parts/content/content-elements/pagination/nav-below'); ?>
<?php endif; ?>