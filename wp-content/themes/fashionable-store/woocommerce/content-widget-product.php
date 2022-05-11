<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<li class="fs-woo-widget">

	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

    <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
        <div class="columns center-flex">
            <div class="columm col-3">
                <div class="fs-widget-image">
		            <?php echo $product->get_image(); ?>
                </div>
            </div>
            <div class="column col-9">
                <div class="fs-widget-title">
	                <?php if ( ! empty( $show_rating ) ) : ?>
		                <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
	                <?php endif; ?>
                    <span class="product-title"><?php echo $product->get_name(); ?></span>
	                <?php echo $product->get_price_html(); ?>
                </div>
            </div>
        </div> <!-- .columns -->
    </a>




	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
