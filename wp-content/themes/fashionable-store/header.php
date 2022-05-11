<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
if (fashionable_store_check_woocommerce()):
    wc_print_notices();
endif;
?>
<?php
$prefix = fashionable_store_get_prefix();
$topbar_enable = esc_attr(get_theme_mod($prefix . '_topbar_enable', '0'));
?>
<div id="topbar"
     class="topbar-area hide-md pad-tb-5<?php echo($topbar_enable == '0' ? ' hide-element' : ' show-element'); ?> center-flex">
    <div class="container grid-xl">
        <div class="columns">
            <?php get_template_part('template-parts/topbar/topbar-style-1'); ?>
        </div>
    </div>

</div>

<?php $hasSticky = esc_attr(get_theme_mod($prefix . '_sticky_header', '0'));
$header_style = esc_attr(get_theme_mod($prefix . '_header_layout', '1')); ?>

<header id="header"
        class="pad-tb-20 <?php echo($hasSticky != '0' ? ' sticky-header ' : ''); ?> <?php echo 'header-style-' . $header_style; ?>"
        role="banner">
    <?php
    $header_style = esc_attr(get_theme_mod($prefix . '_header_layout', '1'));
    ?>

    <div class="container grid-xl">
        <div class="columns center-flex mobile-nav-container">
            <?php get_template_part('template-parts/mobile/mobile-header-style-1'); ?>
        </div>
        <!-- Desktop / Tablet till 600px; -->
        <?php get_template_part('template-parts/header/header-style-' . $header_style); ?>
    </div>
</header>

<?php get_template_part('template-parts/eshop/mini-cart'); ?>
<?php
/*
 * Hooked the function/s
 * fashionable_store_set_header_image - Priority 5 - init.php
 */
do_action('fashionable_store_after_header');
$prefix = fashionable_store_get_prefix();
$where_to_show = get_theme_mod($prefix . '_everywhere_header', '0');

if ($where_to_show == 0) {
    if (is_front_page() || is_home()) {
        if (is_active_sidebar('header-sidebar')) :
            dynamic_sidebar('header-sidebar');
        endif;
    }
} else {
    if (is_active_sidebar('header-sidebar')) :
        dynamic_sidebar('header-sidebar');
    endif;
}

