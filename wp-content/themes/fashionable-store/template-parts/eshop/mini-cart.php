<?php
/*
 * Template part that shows the minicart
 */
if (fashionable_store_check_woocommerce()): ?>
<div id="cart-overlay">
    <a href="#" id="cart-close-button"><span class="fa fa-times fa-2x"></span></a>
    <div id="minicart" class="container grid-sm">
		<?php woocommerce_mini_cart(); ?>
    </div>
</div>

<?php endif; ?>