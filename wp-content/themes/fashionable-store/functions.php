<?php
require_once( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/theme-init/init.php' );
if ( is_admin() ):
	require_once( get_template_directory() . '/admin/admin-pages.php' );
endif;
if ( class_exists( 'WooCommerce' ) ):
	require_once( get_template_directory() . '/theme-init/woocommerce-func.php' );
endif;

add_action( 'after_setup_theme', 'fashionable_store_setup' );
function fashionable_store_setup() {
	load_theme_textdomain( 'fashionable-store', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_editor_style( get_template_directory_uri() . '/assets/css/main-styles.css' );

	add_theme_support( 'custom-header', array(
		'flex-width'  => true,
		'flex-height' => true,
		'height'      => 750,
		'width'       => 1980,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 260,
		'flex-height' => true,
		'flex-width'  => true
	) );
	add_theme_support( 'automatic-feed-links' );
	add_image_size( 'fashionable-store-blog-list-image', 768, 517, true );
	add_image_size( 'fashionable-store-blog-single-image', 880, 530, true );
	add_image_size( 'fashionable-store-home-blog-image', 420, 420, true );
	add_image_size( 'fashionable-store-fullwidth-boxed-image', 1170, 550, true );
	add_image_size( 'fashionable-store-home-testimonial-image', 75, 75, true );
	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 850;
	}

	$fashionable_store_bg_defaults = array(
		'default-color'    => 'ffffff',
		'default-image'    => '',
		'wp-head-callback' => 'fashionable_store_background_callback',
	);
	add_theme_support( 'custom-background', $fashionable_store_bg_defaults );

	register_nav_menus(
		array(
			'main-menu'      => __( 'Main Menu', 'fashionable-store' ),
			'side-menu'      => __( 'Header Side Menu', 'fashionable-store' ),
			'copyright-menu' => __( 'Copyright Menu', 'fashionable-store' )
		)
	);
}

if ( ! function_exists( 'fashionable_store_background_callback' ) ):

	function fashionable_store_background_callback() {
		$background = set_url_scheme( get_background_image() );
		$color      = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

		if ( ! $background && ! $color ) {
			return;
		}

		$style = $color ? "background-color: #$color;" : '';

		if ( $background ) {
			$image = " background-image: url('$background');";

			$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
			if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
				$repeat = 'repeat';
			}
			$repeat = " background-repeat: $repeat;";

			$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
			if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
				$position = 'left';
			}
			$position = " background-position: top $position;";

			$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
			if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
				$attachment = 'scroll';
			}
			$attachment = " background-attachment: $attachment;";

			$style .= $image . $repeat . $position . $attachment;
		}
		?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo trim( $style ); ?>
            }
        </style>
		<?php
	}
endif;

add_action( 'wp_enqueue_scripts', 'fashionable_store_load_scripts' );
function fashionable_store_load_scripts() {

	wp_register_style( 'spectre', get_template_directory_uri() . '/assets/css/spectre-custom.css', '', '', 'all' );
	wp_register_style( 'sidr', get_template_directory_uri() . '/assets/css/sidr/stylesheets/jquery.sidr.light.css', '', '', 'all' );
	wp_register_style( 'fontAwesome5', get_template_directory_uri() . '/assets/css/fonts/fontAwesome/css/fontawesome-all.min.css', '', '', 'all' );
	wp_register_style( 'animateCSS', get_template_directory_uri() . '/assets/css/animateCSS-dist.css', '', '', 'all' );
	wp_register_style( 'fashionable-store-fonts', get_template_directory_uri() . '/assets/css/fonts/font-styles-dist.css', '', '1.0.0', 'all' );
	wp_register_style( 'izitoast', get_template_directory_uri() . '/assets/css/iziToast/iziToast.min.css', '', '1.0.0', 'all' );
	wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick/slick-dist.css', '', '1.9.0', 'all' );
	wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick/slick-theme-dist.css', '', '1.9.0', 'all' );
	wp_register_style( 'fashionable-store-main-styles', get_template_directory_uri() . '/assets/sass/main-styles.min.css', '', '2', 'all' );
	wp_register_style( 'fashionable-store-style', get_stylesheet_uri(), '', 'all' );

	wp_enqueue_style( 'spectre' );
	wp_enqueue_style( 'sidr' );
	wp_enqueue_style( 'fontAwesome5' );
	wp_enqueue_style( 'animateCSS' );
	wp_enqueue_style( 'fashionable-store-fonts' );
	wp_enqueue_style( 'izitoast' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'fashionable-store-main-styles' );
	wp_enqueue_style( 'fashionable-store-style' );


	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'fashionable-store-mainjs', get_template_directory_uri() . '/assets/js/ms.js', array( 'jquery' ), time(), true );
	wp_localize_script( 'fashionable-store-mainjs', 'fashionable_store_vars', array(
			'ajax_url'          => admin_url( 'admin-ajax.php' ),
			'added_to_cart_msg' => esc_html__( 'has been added to your cart', 'fashionable-store' ),
			'isAjaxEnabled'     => esc_html( get_option( 'woocommerce_enable_ajax_add_to_cart' ) ),
			'cartPage'          => ( fashionable_store_check_woocommerce() ? esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) : '' )
		)
	);
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function fashionable_store_admin_scripts( $hook_suffix ) {

	global $pagenow;

	if ( 'themes.php' === $pagenow || 'appearance_page_fashionable-store-hello' == $hook_suffix ) {
		wp_enqueue_style( 'fashionable-store-about-page-css', get_template_directory_uri() . '/admin/assets/css/admin-page.css','','1.1.5' );
	}

	// enqueue js files
	if ( 'appearance_page_fashionable-store-hello' == $hook_suffix ) {
		wp_enqueue_script( 'fashionable-store-about-page-js', ( get_template_directory_uri() . '/admin/assets/js/admin-page.js' ), array( 'jquery' ), '', 'true' );
	}
}
add_action('admin_enqueue_scripts','fashionable_store_admin_scripts');
add_action( 'widgets_init', 'fashionable_store_widgets_init' );
function fashionable_store_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Header sidebar', 'fashionable-store' ),
		'description'   => __( ' In this sidebar you can use widgets eg the smart widget slider etc and it will be shown in the header container. This widget\'s area visibility is controlled via the header visibility options in Customize > Fashionable Store Options > Header Options > Do you want the header image to appear to all pages / posts etc?' , 'fashionable-store' ),
		'id'            => 'header-sidebar',
		'before_widget' => '<section id="%1$s" class="widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Main sidebar', 'fashionable-store' ),
		'description'   => __( ' The main sidebar.', 'fashionable-store' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<section id="%1$s" class="widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'fashionable-store' ),
		'description'   => __( ' The shop sidebar', 'fashionable-store' ),
		'id'            => 'the-shop-sidebar',
		'before_widget' => '<section id="%1$s" class="widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Bar Sidebar 1', 'fashionable-store' ),
		'description'   => __( 'Sidebar at the top bar (left)', 'fashionable-store' ),
		'id'            => 'topbar-sidebar-1',
		'before_widget' => '<section id="%1$s" class="topbar-widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Top Bar Sidebar 2', 'fashionable-store' ),
		'description'   => __( 'Sidebar at the top bar (middle)', 'fashionable-store' ),
		'id'            => 'topbar-sidebar-2',
		'before_widget' => '<section id="%1$s" class="topbar-widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Bar Sidebar 3', 'fashionable-store' ),
		'description'   => __( 'Sidebar at the top bar (right)', 'fashionable-store' ),
		'id'            => 'topbar-sidebar-3',
		'before_widget' => '<section id="%1$s" class="topbar-widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Team Member sidebar', 'fashionable-store' ),
		'description'   => __( 'This sidebar appears only in the single team member page.', 'fashionable-store' ),
		'id'            => 'team-member-sidebar',
		'before_widget' => '<section id="%1$s" class="topbar-widget widget-container %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Footer sidebar', 'fashionable-store' ),
		'description'   => __( ' This sidebar appears in the footer. You can use the customizer to select the layout this sidebar', 'fashionable-store' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<section id="%1$s" class="col-3 col-md-6 col-xs-12 footer-widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

}

if ( ! function_exists( 'fashionable_store_comment' ) ):
	function fashionable_store_comment( $comment, $args, $depth ) {

		extract( $args, EXTR_SKIP );

		if ( 'article' == $args['style'] ) {
			$tag       = 'article';
			$add_below = 'comment';
		} else {
			$tag       = 'article';
			$add_below = 'comment';
		}

		?>
        <div class="comments-container">
            <div class="container">
                <div class="columns">
                    <<?php echo esc_html( $tag ) ?>
					<?php comment_class( empty( $args['has_children'] ) ? 'col-12' : 'parent col-12' ) ?>
                    id="comment-<?php comment_ID() ?>"
                    itemscope itemtype="http://schema.org/Comment">
                    <div class="columns">


                        <div class="column comment-meta post-meta col-sm-12" role="complementary">
                            <h2 class="comment-author">
                                <a class="comment-author-link" href="<?php comment_author_url(); ?>"
                                   itemprop="author"><?php comment_author(); ?></a>
                            </h2>
                            <time class="comment-meta-item"
                                  datetime="<?php comment_date( 'Y-m-d' ) ?>T<?php comment_time( 'H:iP' ) ?>"
                                  itemprop="datePublished"><?php comment_date( 'jS F Y' ) ?>, <a
                                        href="#comment-<?php comment_ID() ?>"
                                        itemprop="url"><?php comment_time() ?></a>
                            </time>

							<?php if ( $comment->comment_approved == '0' ) : ?>
                                <p class="comment-meta-item"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'fashionable-store' ); ?></p>
							<?php endif; ?>
                        </div>

                        <figure class="column gravatar hide-sm comments-gravatar">
							<?php echo get_avatar( $comment, 65 ); ?>
                        </figure>

                    </div>


                    <div class="comment-content post-content" itemprop="text">
						<?php comment_text() ?>
                        <div class="comment-reply">
							<?php comment_reply_link( array_merge( $args, array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							) ) ) ?>
                        </div>

						<?php edit_comment_link( '<p class="comment-meta-item">' . __( 'Edit this comment', 'fashionable-store' ) . '</p>', '', '' ); ?>
                    </div>


                </div>

            </div>
        </div>
	<?php }
endif;


if ( ! function_exists( 'fashionable_store_comment_end' ) ):
	function fashionable_store_comment_end() {
		echo '</article>';
	}
endif;

add_action( 'tgmpa_register', 'fashionable_store_register_required_plugins' );

function fashionable_store_register_required_plugins() {

	$plugins = array(
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
        array(
			'name'     => 'Contact Form by WPForms – Drag & Drop Form Builder for WordPress',
			'slug'     => 'wpforms-lite',
			'required' => false,
		),
        array(
			'name'     => 'Max Mega Menu',
			'slug'     => 'megamenu',
			'required' => false,
		),

		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
        array(
			'name'     => 'Smart Slider 3',
			'slug'     => 'smart-slider-3',
			'required' => false,
		)

	);

	$config = array(
		'id'           => 'fashionable-store',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.

		'strings' => array(
			'page_title' => __( 'Install Required Plugins', 'fashionable-store' ),
			'menu_title' => __( 'Install Plugins', 'fashionable-store' ),

			'installing' => __( 'Installing Plugin: %s', 'fashionable-store' ),

			'updating'                        => __( 'Updating Plugin: %s', 'fashionable-store' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'fashionable-store' ),
			'notice_can_install_required'     => _n_noop(

				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'fashionable-store'
			),
			'notice_can_install_recommended'  => _n_noop(

				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'fashionable-store'
			),
			'notice_ask_to_update'            => _n_noop(

				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'fashionable-store'
			),
			'notice_ask_to_update_maybe'      => _n_noop(

				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'fashionable-store'
			),
			'notice_can_activate_required'    => _n_noop(

				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'fashionable-store'
			),
			'notice_can_activate_recommended' => _n_noop(

				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'fashionable-store'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'fashionable-store'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'fashionable-store'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'fashionable-store'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'fashionable-store' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'fashionable-store' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'fashionable-store' ),

			'plugin_already_active' => __( 'No action taken. Plugin %1$s was already active.', 'fashionable-store' ),

			'plugin_needs_higher_version' => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'fashionable-store' ),

			'complete'                       => __( 'All plugins installed and activated successfully. %1$s', 'fashionable-store' ),
			'dismiss'                        => __( 'Dismiss this notice', 'fashionable-store' ),
			'notice_cannot_install_activate' => __( 'There are one or more required or recommended plugins to install, update or activate.', 'fashionable-store' ),
			'contact_admin'                  => __( 'Please contact the administrator of this site for help.', 'fashionable-store' ),

			'nag_type' => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		)

	);

	tgmpa( $plugins, $config );
}