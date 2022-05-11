<ul class="social-menu text-right">
	<?php
	$prefix = fashionable_store_get_prefix();
	$fb     = get_theme_mod( $prefix . '_facebook', '#' );
	$tw     = get_theme_mod( $prefix . '_twitter', '#' );
	$gp     = get_theme_mod( $prefix . '_google-plus', '#' );
	$ln     = get_theme_mod( $prefix . '_linkedin', '#' );
	$in     = get_theme_mod( $prefix . '_instagram', '#' );
	?>
	<?php if ( ! empty( $fb ) ): ?>
        <li><a href="<?php echo esc_url( $fb ); ?>"
               title="<?php echo esc_attr__( 'Visit us on Facebook', 'fashionable-store' ); ?>">
                <span class="fab fa-facebook"></span>
            </a>
        </li>
	<?php endif; ?>
	<?php if ( ! empty( $tw ) ): ?>
        <li><a href="<?php echo esc_url( $tw ); ?>"
               title="<?php echo esc_attr__( 'Follow us on Twitter', 'fashionable-store' ); ?>"> <span
                        class="fab fa-twitter"></span></a></li>
	<?php endif; ?>
	<?php if ( ! empty( $gp ) ): ?>
        <li><a href="<?php echo esc_url( $gp ); ?>"
               title="<?php echo esc_attr__( 'View our Google+ profile', 'fashionable-store' ); ?>"><span
                        class="fab fa-google-plus"></span></a></li>
	<?php endif; ?>

	<?php if ( ! empty( $ln ) ): ?>
        <li><a href="<?php echo esc_url( $ln ); ?>"
               title="<?php echo esc_attr__( 'View our Linkedin profile', 'fashionable-store' ); ?>"><span
                        class="fab fa-linkedin"></span></a></li>
	<?php endif; ?>
	<?php if ( ! empty( $in ) ): ?>
        <li><a href="<?php echo esc_url($in); ?>" title="<?php echo esc_attr__( 'Follow us on Instagram', 'fashionable-store' ); ?>"><span
                        class="fab fa-instagram"></span></a></li>
	<?php endif; ?>
</ul>