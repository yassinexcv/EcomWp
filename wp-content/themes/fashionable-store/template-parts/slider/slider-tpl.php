<?php
/*
 * Slider template part
 * @package fashionable store
 * @since version 1.0.3
 */
?>
<?php
$prefix = fashionable_store_get_prefix();
$sliderPageID = absint(get_theme_mod($prefix . '_slider_parent_page', ''));
if ($sliderPageID != 0 && $sliderPageID != ''):
    $sliderArgs = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_parent' => $sliderPageID
    );
    $sliderQ = new WP_Query($sliderArgs);
    if ($sliderQ->have_posts()):
        ?>
        <div class="fs-slider-wrapper">
            <?php while ($sliderQ->have_posts()): $sliderQ->the_post();
                $postID = get_the_ID();
                $thumbnailID = absint(get_post_thumbnail_id($postID));
                if (empty($thumbnailID) || $thumbnailID == 0):
                    continue;
                else:
                    $imageSrc = wp_get_attachment_image_src($thumbnailID, 'full');
                    ?>
                    <div class="fs-slide"
                         style="background-image:url(<?php echo esc_url($imageSrc[0]);?>);
                                 background-size: cover !important;
                                 background-position: center;">
                        <div class="d-flex" style="align-items: center;justify-content: center; height: 100%;">
                            <div class="fs-slide-contents">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink();?>" class="akis-btn is-danger is-square is-600 is-uppercase"><?php echo esc_html__('Continue Reading','fashionable-store');?></a>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
<?php endif; ?>
