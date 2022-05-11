<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item blog-item-style-1'); ?>>

    <!-- Featured Image container -->
    <?php get_template_part('template-parts/content/content-elements/featured-image'); ?>

    <?php the_content(); ?>
	<?php if(has_tag()): ?>
		<?php the_tags(); ?>
	<?php endif; ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>

</article>
