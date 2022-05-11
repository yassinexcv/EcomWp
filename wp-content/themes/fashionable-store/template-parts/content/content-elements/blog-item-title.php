<h2 class="blog-item-title no-margin">
    <?php if(is_sticky() && is_home()): ?>
        <span class="sticky-icon fa fa-thumb-tack"></span>
	<?php endif;  ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

</h2>