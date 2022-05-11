<div class="columns center-flex">
    <div class="column col-3 hide-md header-style-1">
        <?php get_template_part('template-parts/header/header-elements/logo'); ?>
    </div>
    <div class="column col-7 col-mx-auto hide-md header-style-1">
        <?php get_template_part('template-parts/header/header-elements/navigation'); ?>
    </div>
    <div class="column col-2 hide-md">

	    <?php if (fashionable_store_check_woocommerce() == true): ?>
            <a id="open-minicart" href="#"
               title="<?php echo esc_attr__('View Cart', 'fashionable-store'); ?>"
               class="shopping-cart-icon-link float-right"><i class="fas fa-shopping-bag"></i>
                <span class="shopping-cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            </a>

	    <?php endif; ?>
        
        <a href="#" class="top-search search-btn float-right"><span class="fas fa-search"></span></a>


    </div>
</div>

<?php get_template_part('template-parts/header/header-elements/search-overlay');?>