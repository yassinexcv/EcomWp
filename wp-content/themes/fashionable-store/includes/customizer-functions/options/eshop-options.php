<?php
$prefix = 'fashionable-store';
$wp_customize->add_section($prefix . '_eshop_section', array(
    'priority' => 14,
    'capability' => 'edit_theme_options',
    'title' => __('Eshop Options', 'fashionable-store'),
    'description' => '',
    'panel' => $prefix . '_theme_panel',
));
$wp_customize->add_setting($prefix . '_eshop_layout', array(
    'default' => 1,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));
$wp_customize->add_setting($prefix . '_eshop_columns', array(
    'default' => 4,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));
$wp_customize->add_control($prefix . '_eshop_layout', array(
    'type' => 'select',
    'priority' => 10,
    'section' => $prefix . '_eshop_section',
    'label' => esc_html__('Select the shop page layout', 'fashionable-store'),
    'description' => esc_html__('You can select with or without the shop sidebar.', 'fashionable-store'),
    'choices' => array(
        '1' => esc_html__('With Sidebar', 'fashionable-store'),
        '2' => esc_html__('Without Sidebar', 'fashionable-store'),
    )
));

$wp_customize->add_control($prefix . '_eshop_columns', array(
    'type' => 'select',
    'priority' => 11,
    'section' => $prefix . '_eshop_section',
    'label' => esc_html__('Select the number of product columns', 'fashionable-store'),
    'description' => esc_html__('You can select between 2-6 columns. These applies to all shop archive pages and the main shop page.', 'fashionable-store'),
    'choices' => array(
        '2' => esc_html__('2 Columns', 'fashionable-store'),
        '3' => esc_html__('3 Columns', 'fashionable-store'),
        '4' => esc_html__('4 Columns', 'fashionable-store'),
        '5' => esc_html__('5 Columns', 'fashionable-store'),
        '6' => esc_html__('6 Columns', 'fashionable-store'),
    )
));