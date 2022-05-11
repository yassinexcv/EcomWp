<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) {
        echo '<a href="'.esc_url(home_url( '/' )).'" class="logo-image">
        <img class="img-responsive" src="'. esc_url( $logo[0] ) .'" alt="'.esc_attr(get_bloginfo('name')).'">
        </a>';
} else { ?>

    <h2 class="site-title">
        <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html(get_bloginfo( 'name' )); ?></a>
    </h2>
    <p class="site-tagline">
		<?php echo get_bloginfo( 'description' ); ?>
    </p>

<?php } ?>

