<?php
/*
 * Get the variables from the options
 * because this page is set up here.
 */
$prefix      = fashionable_store_get_prefix();
$sectionPage = absint( get_option( 'page_for_posts' ) );
$isEnabled   = get_theme_mod( $prefix . '_enable_blog_section', false );

if ( $isEnabled ): ?>

    <div class="fs-home-blog-wrapper pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-12">
					<?php if ( $sectionPage != 0 ): ?>
                        <h3 class="section-title"><?php echo esc_html( get_the_title( $sectionPage ) ); ?></h3>
                        <h4 class="section-subtitle"><?php echo esc_html( get_the_excerpt( $sectionPage ) ); ?></h4>
					<?php endif ?>
                </div>
            </div>
			<?php get_template_part( 'template-parts/custom-pages/homepage/blog/blog-style-1' ); ?>
        </div>
    </div>

<?php endif; ?>