<?php
/*
 * Template Name: Home Page
 */
get_header();
?>
<div id="home-content-wrapper" class="home-content">
    <?php
    $prefix = fashionable_store_get_prefix();
    $featured_style = absint(get_theme_mod($prefix.'_featured_categories_style','1'));
    get_template_part('template-parts/eshop/homepage/featured-categories-tpl-'.$featured_style);

    //Section 1
    get_template_part('template-parts/eshop/homepage/section-one/section-one','tpl');
    //Section 2
    get_template_part('template-parts/eshop/homepage/section-two/section-two','tpl');
    //Section 3
    get_template_part('template-parts/eshop/homepage/section-three/section-three','tpl');
    // Section 4
    get_template_part('template-parts/eshop/homepage/section-four/section-four','tpl');
    // Blog
    get_template_part('template-parts/custom-pages/homepage/blog/homepage-blog','tpl');
    //Testimonials
    get_template_part('template-parts/custom-pages/homepage/testimonials/home-testimonial','tpl');

    ?>

</div>
<?php get_footer();