<?php
/*
 * Template that enables the feature categories tiles in the frontpage.
 */
$featured = fashionable_store_featured_categories();
if ( ! empty( $featured ) && is_array( $featured ) ):
	$counter = 1;
	?>

    <div class="home-tiles pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">

                <div class="column col-12 col-md-12 col-sm-12">
                    <div class="columns">
						<?php foreach ( $featured as $f ):
							$class = fashionable_store_set_fcats_style_two_class( $counter ); ?>
                            <div class="column <?php echo esc_attr( $class ); ?> col-md-12 col-sm-12">
                                <?php $termInfo = get_term_by('name',$f,'product_cat');
                                $term_image = absint(get_term_meta($termInfo->term_id,'thumbnail_id',true));
                                $image = wp_get_attachment_url($term_image)?>
                                <div class="singlizer singlizer-style-2"
                                     style="background:url(<?php echo esc_url($image);?>) no-repeat center;">
                                    <p><?php echo esc_html($termInfo->name);?></p>
                                    <a href="<?php echo esc_url(get_term_link($termInfo->term_id));?>"></a>
                                </div>

                            </div>
							<?php $counter ++;
							if ( $counter > 6 ):$counter = 1; endif;
						endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>