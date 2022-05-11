<?php get_header();
$single_style = get_theme_mod(fashionable_store_get_prefix() . '_single_layout', '1');
get_template_part('template-parts/content/content-elements/titles/page-major-title');
?>
    <section id="content" role="main">
        <div class="main-content pad-tb-60">
            <div class="container grid-xl">
                <div class="columns">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <div class="column col-9 col-md-12">
                            <section id="content" role="main">
                                <?php
                                get_template_part('template-parts/content/single/single-style-' . esc_attr($single_style));
                                comments_template();
                                ?>
                            </section>
                        </div>
                    <?php endwhile;
                    endif; ?>


                    <div class="column col-3 col-md-12">
                        <aside id="aside" role="complementary">
                            <?php get_sidebar(); ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>