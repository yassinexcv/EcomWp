<?php
/*
 * Get and show the testimonials
 */
$prefix            = fashionable_store_get_prefix();
$testimonialParent = absint( get_theme_mod( $prefix . '_testimonials_parent_page', '' ) );
$isEnabled         = get_theme_mod( $prefix . '_enable_testimonials_section', false );

if ( $isEnabled == true && $testimonialParent != 0 ): ?>

    <div class="fs-home-testimonials-wrapper pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-12">
					<?php if ( $testimonialParent != 0 ): ?>
                        <h3 class="section-title"><?php echo esc_html( get_the_title( $testimonialParent ) ); ?></h3>
						<?php
                        $hasExcerpt = esc_html(get_the_excerpt( $testimonialParent ));
						if ( !empty( $hasExcerpt)): ?>
                            <h4 class="section-subtitle"><?php echo esc_html( get_the_excerpt( $testimonialParent ) ); ?></h4>
						<?php endif; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
	    <?php get_template_part( 'template-parts/custom-pages/homepage/testimonials/testimonial-style-1' ); ?>
    </div>

<?php endif; ?>