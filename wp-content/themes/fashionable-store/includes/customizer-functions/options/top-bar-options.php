<?php
$prefix = 'fashionable-store';
$wp_customize->add_section($prefix . '_topbar_section', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Top Bar section', 'fashionable-store'),
    'description' => '',
    'panel' => $prefix . '_theme_panel',
));

$wp_customize->add_setting($prefix . '_topbar_enable', array(
    'default' => 0,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));

$wp_customize->add_setting($prefix . '_topbar_layout', array(
    'default' => 1,
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
));

$wp_customize->add_control($prefix . '_topbar_enable', array(
    'type' => 'select',
    'priority' => 10,
    'section' => $prefix . '_topbar_section',
    'label' => esc_html__('Do you want to enable the top bar?', 'fashionable-store'),
    'description' => esc_html__('If you select "yes" you can go to the Widget page and use the Top Bar Widget areas with your content!', 'fashionable-store'),
    'choices' => array(
        0 => esc_html__('No', 'fashionable-store'),
        1 => esc_html__('Yes', 'fashionable-store'),
    )
));