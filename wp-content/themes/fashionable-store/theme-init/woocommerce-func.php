<?php
/*
 * This file contains everything related to the WooCommerce functionality of the theme.
 *
 * @package fashionable-store/theme-init
 * @since 1.0.0
 */

/* Remove the breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/* Remove the main shop page */
add_filter( 'woocommerce_show_page_title', '__return_false' );

if ( ! function_exists( 'fashionable_store_return_main_class' ) ):
	function fashionable_store_return_main_class() {
		$prefix           = fashionable_store_get_prefix();
		$isSideabarEnable = absint( get_theme_mod( $prefix . '_eshop_layout', 1 ) );
		/*
		 * Return main columns class depending on the page being viewed.
		 */
		if ( $isSideabarEnable == 2 ) {
			return 'col-12';
		}

		if ( is_shop() ) {
			return 'col-9';
		} elseif ( is_product_category() ) {
			return 'col-9';
		} elseif ( is_product() ) {
			return 'col-12';
		} else {
			return 'col-9';
		}

	}
endif;

if ( ! function_exists( 'fashionable_store_get_title' ) ):
	function fashionable_store_get_title() {
		/*
		 * Function that returns the single item's title
		 * even if it is a tax, term, tag in a WooCommerce page.
		 */
		if ( is_shop() ) {
			return esc_html__( 'Shop', 'fashionable-store' );
		} elseif ( is_singular() ) {
			$id = get_queried_object_id();

			return esc_html( get_the_title( $id ));
		} elseif ( is_product_category() || is_product_tag() ) {
			return single_term_title();
		}
	}
endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'fashionable_store_add_to_cart_fragment' );
if ( ! function_exists( 'fashionable_store_add_to_cart_fragment' ) ):
	function fashionable_store_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
        <a id="open-minicart" href="#"
           title="<?php echo esc_attr__( 'View Cart', 'fashionable-store' ); ?>"
           class="shopping-cart-icon-link float-right"><i class="fas fa-shopping-bag"></i>
            <span class="shopping-cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </a>
		<?php
		$fragments['a#open-minicart'] = ob_get_clean();

		return $fragments;
	}
endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'fashionable_store_update_minicart' );
if ( ! function_exists( 'fashionable_store_update_minicart' ) ):
	function fashionable_store_update_minicart() {
		ob_start();
		?>
        <div id="minicart">
			<?php woocommerce_mini_cart(); ?>
        </div>
		<?php $fragments['div#minicart'] = ob_get_clean();

		return $fragments;
	}
endif;
/*
 * Remove WooCommerce default add to cart.
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11 ); // Add the button again. Sweet
/*
 * Update the cart dynamically
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'fashionable_store_cart_count', 10, 1 );
if ( ! function_exists( 'fashionable_store_cart_count' ) ):
	function fashionable_store_cart_count( $fragments ) {

		$fragments['span.shopping-cart-badge'] = '<span class="shopping-cart-badge">' . WC()->cart->get_cart_contents_count() . '</span>';

		return $fragments;

	}
endif;
/*
 * Lets create the iziToast
 * when someone uses the add to cart
 * with some AJAX
 */
if ( ! function_exists( 'fashionable_store_create_izi' ) ):
	function fashionable_store_create_izi() {
		global $product;
		$productID    = absint( $_POST['productID'] );
		$productTitle = get_the_title( $productID );
		$thumbId      = absint( get_post_thumbnail_id( $productID ) );
		$thumbSrc     = wp_get_attachment_image_src( $thumbId, 'thumbnail' );
		echo json_encode( array(
				'productTitle' => esc_html( $productTitle ),
				'thumbSrc'     => ( ! empty( $thumbSrc ) ? esc_url( $thumbSrc[0] ) : '' )
			)
		);
		exit;
	}
endif;
add_action( 'wp_ajax_fashionable_store_create_izi', 'fashionable_store_create_izi' );
add_action( 'wp_ajax_nopriv_fashionable_store_create_izi', 'fashionable_store_create_izi' );

add_filter( 'loop_shop_columns', 'fashionable_store_loop_columns' );
if ( ! function_exists( 'fashionable_store_loop_columns' ) ) {
	function fashionable_store_loop_columns() {

		$prefix  = fashionable_store_get_prefix();
		$columns = absint( get_theme_mod( $prefix . '_eshop_columns', 4 ) );

		return $columns; // 4 products per row
	}
}
/*= Single Product Functions and actions =*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ); // remove action of star rating
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 31 ); // add ratings below the add to cart

/*= Check if ajax add to cart is enabled on archives =*/
if ( ! function_exists( 'fashionable_store_check_ajax_enabled' ) ):
	function fashionable_store_check_ajax_enabled() {
		$isAjaxEnabled = get_option( 'woocommerce_enable_ajax_add_to_cart' );
		if ( esc_html( $isAjaxEnabled ) == 'yes' ) {
			return true;
		} else {
			return false;
		}
	}
endif;

/*== Cart ==*/
remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display') ;
add_action('woocommerce_after_cart_table','woocommerce_cross_sell_display')   ;
add_filter( 'woocommerce_cross_sells_columns', 'fashionable_store_change_cross_sells_columns' );
function fashionable_store_change_cross_sells_columns( $columns ) {
	return 3;
}