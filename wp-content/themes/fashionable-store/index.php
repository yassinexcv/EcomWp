<?php get_header(); ?>
    <div class="main-content pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-9 col-md-12">
                    <section id="content" role="main">
                        <?php
                        $blog_style = get_theme_mod(fashionable_store_get_prefix() . '_blog_layout', '1');
                        get_template_part('template-parts/content/blog/blog-style-' . esc_attr($blog_style));
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