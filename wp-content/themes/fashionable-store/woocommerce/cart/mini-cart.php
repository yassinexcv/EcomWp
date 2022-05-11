<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.7.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
	<?php echo '<h2>' . esc_html( 'My Shopping Cart', 'fashionable-store' ) . '</h2>'; ?>
    <ul class="woocommerce-mini-cart fashionable-store-minicart">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
                <li class="columns woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="column col-1">
						<?php
						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'fashionable-store' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key );
						?>
                    </div>


					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo $thumbnail . $product_name . '&nbsp;'; ?>
					<?php else : ?>

                            <div class="column col-2 col-xs-2">
                                <a href="<?php echo esc_url( $product_permalink ); ?>" class="minicart-image-link">
									<?php echo $thumbnail; ?>
                                </a>
                            </div>
                            <div class="column col-4 col-xs-4">
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo $product_name . '&nbsp;'; ?>
                                </a>
                            </div>
					<?php endif; ?>

					<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>

					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity column col-2 col-xs-2">' . sprintf( '&times; %s ', $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key );
					echo '<span class="price column col-3 text-right">' . $product_price . '</span>'; ?>
                </li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
    </ul>


    <p class="woocommerce-mini-cart__total total"><strong><?php _e( 'Subtotal', 'fashionable-store' ); ?>
            :</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

    <p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

<?php else : ?>

    <p class="woocommerce-mini-cart__empty-message"><?php _e( 'No products in the cart.', 'fashionable-store' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
