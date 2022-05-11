<?php
/*
 * Template Name: Fullwidth Page
 */
get_header();
    get_template_part('template-parts/content/content-elements/titles/page-major-title'); ?>
	<section id="content" role="main">
		<div class="main-content pad-tb-60">
			<div class="container grid-xl">
				<div class="columns">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<div class="column col-12">
							<section id="content" role="main">

								<?php
								get_template_part('template-parts/content/page/page-style-1');

								comments_template();
								?>
							</section>
						</div>
					<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>