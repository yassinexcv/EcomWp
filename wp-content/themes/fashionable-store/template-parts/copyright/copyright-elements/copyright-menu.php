<?php
wp_nav_menu( array(
	'theme_location'  => 'copyright-menu',
	'menu_class'      => 'copyright-menu',
	'container'       => 'nav',
	'container_class' => 'copyright-menu-nav',
	'fallback_cb'     => 'fashionable_store_wp_menu_fallback'
) );