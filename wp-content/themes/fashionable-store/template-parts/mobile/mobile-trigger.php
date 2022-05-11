<!-- Mobile Menu Trigger -->
<div class="column col-6 show-md text-center">

    <ul id="mobile-menu-actions" class="mobile-menu-actions">
        <li>
            <a href="<?php  echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"  class="mobile-my-account"><span class="far fa-user-circle"></span></a>
        </li>
        <li>
            <a href="#"  class="mobile-search search-btn"><span class="fas fa-search"></span></a>
        </li>
        <li>
	        <?php if (fashionable_store_check_woocommerce() == true): ?>
                <a id="open-minicart" href="#minicart"
                   title="<?php echo esc_attr__('View Cart', 'fashionable-store'); ?>">
                    <span class="fas fa-shopping-bag"></span>
                </a>
	        <?php endif; ?>
        </li>
        <li>
            <a href="#sidr-mobile" id="mobile-menu-nav" class="mob-trigger link-transition">
                <span class="fa fa-bars"></span>
            </a>
        </li>
    </ul>
</div>