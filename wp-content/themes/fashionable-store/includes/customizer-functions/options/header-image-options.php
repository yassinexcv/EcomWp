<?php
$prefix = 'fashionable-store';
$wp_customize->add_section($prefix . '_header_section', array(
    'priority' => 11,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Navigation & Header Image section', 'fashionable-store'),
    'description' => '',
    'panel' => $prefix . '_theme_panel',
));
/*== Header section settings ==*/
$wp_customize->add_setting($prefix . '_header_layout', array(
    'default' => 1,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_header_with_sidemenu_enable', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));
$wp_customize->add_setting($prefix . '_everywhere_header', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));
$wp_customize->add_setting($prefix . '_sticky_header', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_header_image_content', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_dropdown_pages',
));
$wp_customize->add_control($prefix . '_header_layout', array(
    'type' => 'select',
    'priority' => 10,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Select header (contains the navigation) style', 'fashionable-store'),
    'description' => esc_html__('There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'fashionable-store'),
    'choices' => array(
        '1' => esc_html__('Style 1', 'fashionable-store'),
        '2' => esc_html__('Style 2', 'fashionable-store'),

    )
));
$wp_customize->add_control($prefix . '_header_with_sidemenu_enable', array(
    'type' => 'select',
    'priority' => 11,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Enable side menu on the left of the header image.', 'fashionable-store'),
    'description' => esc_html__('If you enable this option you have use the "Header Side Menu" in the navigation menus.', 'fashionable-store'),
    'choices' => array(
        '0' => esc_html__('Disable', 'fashionable-store'),
        '1' => esc_html__('Enable', 'fashionable-store')

    )
));
$wp_customize->add_control($prefix . '_everywhere_header', array(
    'type' => 'select',
    'priority' => 11,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Do you want the header image to appear to all pages / posts etc?', 'fashionable-store'),
    'description' => esc_html__('If this is a "No" the header image (if any) will appear only to the homepage and the static front page.', 'fashionable-store'),
    'choices' => array(
        '0' => esc_html__('No - Only Front', 'fashionable-store'),
        '1' => esc_html__('Yes, everywhere', 'fashionable-store'),
    )
));

$wp_customize->add_control($prefix . '_sticky_header', array(
    'type' => 'select',
    'priority' => 12,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Stick the header at the top.', 'fashionable-store'),
    'description' => esc_html__('Enable this to set the main navigation fixed during the page scroll.', 'fashionable-store'),
    'choices' => array(
        '0' => esc_html__('No', 'fashionable-store'),
        '1' => esc_html__('Yes', 'fashionable-store'),
    )
));
$wp_customize->add_control($prefix . '_header_image_content', array(
    'type' => 'dropdown-pages',
    'priority' => 14,
    'section' => $prefix . '_header_section',
    'label' => esc_html__('Select the content of the header image(page).', 'fashionable-store'),
    'description'=> esc_html__('This is a page. If you apply a page ,then title of that page and its link will be visible!','fashionable-store')
));