<?php
/*
 * This is the style 1 of the blog template at the front page.
 */
$args  = array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true );
$blogQ = new WP_Query( $args );
if ( $blogQ->have_posts() ): ?>
    <div class="fs-home-blog-wrapper pad-tb-20">

        <div class="columns col-gapless">
			<?php while ( $blogQ->have_posts() ): $blogQ->the_post(); ?>
                <div class="column col-4 col-sm-12">

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'home-blog-style-1' ); ?>>
                        <div class="columns">

                            <div class="column col-12 col-md-12">
                                <div class="relative">
									<?php get_template_part( 'template-parts/content/content-elements/featured-image' ); ?>
                                    <div class="blog-item-inner-texts home-blog-contents">
										<?php get_template_part( 'template-parts/content/content-elements/blog-item-title' ); ?>
                                        <a href="<?php the_permalink(); ?>" class="read-more-link is-600">
											<?php echo apply_filters( 'fashionable_store_readmore_txt',
												esc_html__( 'Continue Reading', 'fashionable-store' ) ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div><!-- Columns -->
                    </article>
                </div>
			<?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata() ?>