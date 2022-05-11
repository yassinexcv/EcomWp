<div id="main-navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_class' => 'top-menu',
        'container' => 'nav',
        'container_class' => 'main-menu-nav',
        'fallback_cb' => 'fashionable_store_wp_menu_fallback'
    ));
    ?>
</div>
