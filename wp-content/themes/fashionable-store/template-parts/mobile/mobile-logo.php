<!-- Mobile Logo -->
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
if ( has_custom_logo() ) {
    echo '<div class="column col-6 show-md">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">
        <img class="img-responsive" src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">
        </a>';
	echo '</div>';
} else { ?>

    <div class="column col-sm-12 show-md">
        <h2 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
        </h2>
        <p class="site-tagline hide-xs">
			<?php echo get_bloginfo( 'description' ); ?>
        </p>
    </div>
<?php } ?>