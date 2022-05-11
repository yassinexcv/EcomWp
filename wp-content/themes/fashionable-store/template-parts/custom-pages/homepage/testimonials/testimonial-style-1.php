<?php
$prefix            = fashionable_store_get_prefix();
$testimonialParent = absint( get_theme_mod( $prefix . '_testimonials_parent_page', '' ) );
$testimonials      = get_pages( array(
	'child_of'    => $testimonialParent,
	'sort_order'  => 'asc',
	'sort_column' => 'menu_order',
	'post_status' => 'publish'

) );
if ( $testimonials != false ):
	?>

    <div class="fs-testimonials-container pad-tb-60">
		<?php foreach ( $testimonials as $tt ):
			$testimonial_page = get_post( $tt->ID );
			?>

            <div class="fs-single-testimonial">
                <i class="fas fa-quote-left"></i>
				<?php echo wp_kses_post( $testimonial_page->post_content ); ?>
                <div class="d-flex flex-space-between">
                    <div class="testimonial-name">
                        <h5><?php echo esc_html( $testimonial_page->post_title ); ?></h5>
                    </div>
					<?php
					$testimonial_image = get_the_post_thumbnail_url( $testimonial_page->ID, 'fashionable-store-home-testimonial-image' );
					if ( $testimonial_image != false ): ?>
                        <div class="testimonial-image">
                            <img class="circle single-testimonial-image img-responsive" src="<?php echo esc_url($testimonial_image); ?>"
                                 alt="<?php echo esc_attr($testimonial_page->post_title); ?>"/>
                        </div>
					<?php endif; ?>
                </div>
            </div>

		<?php endforeach; ?>
    </div>

<?php endif; ?>