<?php get_header();
get_template_part( 'template-parts/content/content-elements/titles/archive-major-title' ); ?>
    <div class="main-content pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-9 col-md-12">
                    <section id="content" role="main">

						<?php
						get_template_part( 'template-parts/content/tag/tag-style-1' );
						?>
                    </section>
                </div>
                <div class="column col-3 col-md-12">
                    <aside id="aside" role="complementary">
						<?php get_sidebar(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>