<section class="single-major-title major-title woo-breadcrumb">
    <div class="container grid-xl">
        <div class="columns">
            <div class="column col-12">
                <h2 class="no-margin">
					<?php echo fashionable_store_get_title(); ?>
                </h2>
				<?php
				$args = array(
					'delimiter' => '<span class="fas fa-angle-right breadcrumb-delimiter"></span>'
				);
				if ( fashionable_store_check_woocommerce() ):
					woocommerce_breadcrumb( $args );
				endif;
				?>
            </div>

        </div>
    </div>
</section>
