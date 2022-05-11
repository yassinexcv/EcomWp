<?php
$copyright_text = get_theme_mod( fashionable_store_get_prefix() . '_copyright_text', '' );
?>
<p class="copyright-text">
	<?php
	if ( ! empty( $copyright_text ) ):
		echo esc_html( $copyright_text );
	else:
		echo __( 'Fashionable Store Theme' , 'fashionable-store' ); ?><?php echo __( ' by ', 'fashionable-store' ); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
           title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php echo esc_html__( 'akisthemes.com', 'fashionable-store' ); ?>
        </a>
	<?php endif; ?>
</p>