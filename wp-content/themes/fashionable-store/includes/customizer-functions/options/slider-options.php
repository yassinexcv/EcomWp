<?php
$prefix = fashionable_store_get_prefix();
$wp_customize->add_section($prefix . '_slider_section', array(
    'priority' => 12,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Slider Options', 'fashionable-store'),
    'description' => esc_html__('You can have an slider with unlimited slides! If you enable this feature you have to remove the header image if you have set any. If not both the slider and the header image will appear.', 'fashionable-store'),
    'panel' => $prefix . '_theme_panel',
));

$wp_customize->add_setting($prefix . '_slider_parent_page', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_dropdown_pages',
));

$wp_customize->add_control($prefix . '_slider_parent_page', array(
    'type' => 'dropdown-pages',
    'priority' => 11,
    'section' => $prefix . '_slider_section',
    'label' => esc_html__('Select the parent page of the slider.', 'fashionable-store'),
    'description' => esc_html__('By selecting the page above, all its children pages will be act like the slides. Refer to the documentation to see how you use this section.', 'fashionable-store')
));