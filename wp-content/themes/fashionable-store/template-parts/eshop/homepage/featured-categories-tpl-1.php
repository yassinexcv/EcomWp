<?php
/*
 * Template that enables the feature categories tiles in the frontpage.
 */
$featured = fashionable_store_featured_categories();
?>

    <!-- Test Tiles -->
<?php if ( ! empty( $featured ) && is_array( $featured ) ): ?>
    <div class="home-tiles pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
				<?php foreach ( $featured as $f ): ?>
                    <div class="column col-4 col-sm-6 col-xs-12">
						<?php
						$termInfo   = get_term_by( 'name', $f, 'product_cat' );
						$term_image = absint( get_term_meta( $termInfo->term_id, 'thumbnail_id', true ) );
						$image      = wp_get_attachment_url( $term_image ) ?>
                        <div class="singlizer"
                             style="background:url(<?php echo esc_url( $image ); ?>) no-repeat center;">
                            <p><?php echo esc_html( $termInfo->name ); ?></p>
                            <a href="<?php echo esc_url( get_term_link( $termInfo->term_id ) ); ?>"></a>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>

    </div>
<?php endif; ?>