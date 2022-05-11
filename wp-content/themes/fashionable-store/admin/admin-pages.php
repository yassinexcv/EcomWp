<?php
/*
* About page in the admin Area.
* @package Fashionable Store
* @since version 1.1.5
*/

function fashionable_store_theme_var_boot() {
	$theme_info = array();

	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	$theme_info['version'] = $theme_version;
	$theme_info['name']    = $theme_name;
	$theme_info['slug']    = $theme_slug;

	return $theme_info;
}

function fashionable_store_set_promo_div() {
	$promo              = array();
	$promo['heading']   = esc_html__( 'PRO VERSION? DON\'T THINK SO..', 'fashionable-store' );
	$promo['content']   = esc_html__( 'Fashionable store has *PRO* features and gets updated very often.
    So there is no need at all for a "Pro" version of this theme. We only get better based on your feedback. Please rate us. ', 'fashionable-store' );
	$promo['link_text'] = esc_html__( 'Rate our Theme', 'fashionable-store' );
	$promo['link_url']  = esc_url( 'https://wordpress.org/support/theme/fashionable-store/reviews/' );

	return $promo;
}

function fashionable_store_register_tabs() {
	$tabs            = array();
	$getting_started = array(
		'tab_key'  => 'getting_started',
		'tab_name' => esc_html__( 'Getting Started', 'fashionable-store' )
	);
	$documentation   = array(
		'tab_key'  => 'documentation',
		'tab_name' => esc_html__( 'Documentation / Support', 'fashionable-store' )
	);
	$more_info      = array(
		'tab_key'  => 'more_info',
		'tab_name' => esc_html__( 'Extra Info', 'fashionable-store' )
	);

	$tabs[] = $getting_started;
	$tabs[] = $documentation;
	$tabs[] = $more_info;

	return $tabs;
}


function fashionable_store_register_about_page() {
	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	add_theme_page(
		sprintf( __( 'Welcome to %1$s', 'fashionable-store' ), ucfirst( $theme_name ) ),
		sprintf( __( 'About  %1$s', 'fashionable-store' ), ucfirst( $theme_name ) ),
		'edit_theme_options',
		'fashionable-store-hello',
		'fashionable_store_render_about_page'
	);

	function fashionable_store_render_about_page() {
		$themeVars = fashionable_store_theme_var_boot();

		echo '<div class="wrap">
<div id="icon-tools" class="icon32"></div>'; ?>
        <div class="akisthemes-about-wrapper">
            <div class="akis-section akis-group d-flex center-flex">
                <div class="akis-col span_2_of_3">
                    <h2>
						<?php echo sprintf( __( 'Welcome to %1$s ', 'fashionable-store' ), ucfirst( $themeVars['name'] ) ); ?> <?php echo $themeVars['version']; ?>
                    </h2>
                    <h3>
						<?php
						echo esc_html__( 'You are minutes away for creating something smashing good 
                        for any kind of eshop. Fashionable Store Theme is a totally compatible to the WooCommerce plugin, fully responsive theme that gets updated really often with great features. 
                        Check the tabs below to get you started in no time.', 'fashionable-store' ); ?>
                    </h3>
                </div>
				<?php
				$promo = fashionable_store_set_promo_div();
				if ( ! empty( $promo ) ):
					?>
                    <div class="akis-col span_1_of_3">
                        <div class="promo-div">
                            <h3><?php echo esc_html( $promo['heading'] ); ?></h3>
                            <p>
								<?php echo esc_html( $promo['content'] ); ?>
                            </p>
                            <a target="_blank" href="<?php echo esc_url( $promo['link_url'] ); ?>"
                               class="promo-btn button button-primary button-hero">
								<?php echo esc_attr( $promo['link_text'] ); ?>
                            </a>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>

		<?php
		$tabs = fashionable_store_register_tabs();
		if ( ! empty( $tabs ) ):
			$active_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'getting_started';
			?>
            <h2 class="nav-tab-wrapper wp-clearfix akisthemes-tabs">
				<?php foreach ( $tabs as $tab ): ?>

                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=fashionable-store-hello' ) ); ?>&amp;tab=<?php echo esc_attr( $tab['tab_key'] ); ?>"
                       class="nav-tab <?php echo( $active_tab == $tab['tab_key'] ? 'nav-tab-active' : '' ); ?>"
                       role="tab"
                       data-toggle="tab"><?php echo esc_html( $tab['tab_name'] ); ?></a>
				<?php endforeach; ?>
            </h2>
		<?php endif; ?>

        <!-- Tab Content -->

        <div class="about-tab-content <?php echo ($active_tab == 'getting_started' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Install The Recommended Plugins', 'fashionable-store' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with some recommended plugins. You can use it without them installed, however
                        if you install them you
                        use this theme with its max features. The recommended plugins appear at the top of the screen when in a notice box.', 'fashionable-store' ); ?>
                    </p>
                    <p><?php echo esc_html__( 'If you haven\'t already done so, please install and activate these plugins.', 'fashionable-store' ); ?> </p>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Install the demo content.', 'fashionable-store' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'Due to the new guilelines you have to copy the following URL into your browser and follow the steps to install the demo content.It easy very easy."
                      https://akisthemes.com/docs/fashionable-store-documentation/demo-data-installation/how-to-install-the-demo-data/', 'fashionable-store' ); ?>
                    </p>


                </div>

            </div>
        </div>
        <!-- Documentation -->
        <div class="about-tab-content <?php echo ($active_tab == 'documentation' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Documentation', 'fashionable-store' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with extensive documentation. 
						You can find it by clicking the button below.', 'fashionable-store' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( 'https://akisthemes.com/docs/fashionable-store-documentation/'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('Read the Docs','fashionable-store' ); ?>
                    </a>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Support', 'fashionable-store' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'We provide awesome support through the WordPress.org forums. If you need any help just click the button below. We really respect our users.', 'fashionable-store' ); ?>
                    </p>

                    <a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/theme/fashionable-store'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('I need support','fashionable-store' ); ?>
                    </a>
                </div>

            </div>
        </div>

        <!-- Extra info -->
        <div class="about-tab-content <?php echo ($active_tab == 'more_info' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Changelog', 'fashionable-store' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'Click the button below to learn more about the changelog of this theme. You can view all the changes that happen with any new update.', 'fashionable-store' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( 'https://akisthemes.com/changelog/fashionable-store-changelog/'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('View Changelog','fashionable-store' ); ?>
                    </a>
                </div>

            </div>
        </div>
		<?php
		echo '</div>';


	}
}

add_action( 'admin_menu', 'fashionable_store_register_about_page' );

