<?php
$prefix = 'fashionable-store';

$wp_customize->add_panel($prefix . '_home_theme_panel', array(
    'priority' => 4,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Fashionable Store - Homepage', 'fashionable-store'),
    'description' => esc_html__('This settings apply to the page you have set as the homepage in the "Settings > Reading Section".', 'fashionable-store'),
));

require_once(get_template_directory().'/includes/customizer-functions/homepage-layout-sections.php');

$wp_customize->add_panel($prefix . '_theme_panel', array(
    'priority' => 5,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Fashionable Store - Theme Options', 'fashionable-store'),
    'description' => esc_html__('A lot of options to customize your website completely.', 'fashionable-store'),
));
/*= Options for the Top Bar Section ==*/
require_once (get_template_directory().'/includes/customizer-functions/options/top-bar-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/header-image-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/slider-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/eshop-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/footer-options.php');
require_once (get_template_directory().'/includes/customizer-functions/options/copyright-options.php');
