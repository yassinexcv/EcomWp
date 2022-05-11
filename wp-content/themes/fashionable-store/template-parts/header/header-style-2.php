<div class="columns center-flex">
	<div class="column col-6 hide-md header-style-2">
		<?php get_template_part( 'template-parts/header/header-elements/navigation' ); ?>
	</div>
    <div class="column col-3 col-mx-auto hide-md header-style-2">
		<?php get_template_part('template-parts/header/header-elements/logo'); ?>
    </div>
	<div class="column col-2 hide-md header-style-2">
        <a href="#" class="top-search search-btn"><span class="fas fa-search"></span></a>
		<?php if (fashionable_store_check_woocommerce() == true): ?>

            <a id="open-minicart" href="#"
               title="<?php echo esc_attr__('View Cart', 'fashionable-store'); ?>"
               class="shopping-cart-icon-link float-right"><i class="fas fa-shopping-bag"></i>
                <span class="shopping-cart-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            </a>
		<?php endif; ?>
	</div>
</div>

<?php get_template_part('template-parts/header/header-elements/search-overlay');?>