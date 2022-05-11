<?php
$prefix = 'fashionable-store';
$wp_customize->add_section( $prefix . '_copyright_section', array(
    'priority'       => 17,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright section', 'fashionable-store' ),
    'description'    => '',
    'panel'          => $prefix . '_theme_panel',
) );

/*== Copyright section settings ==*/

$wp_customize->add_setting( $prefix . '_copyright_layout', array(
    'default'           => 1,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fashionable_store_sanitize_number_absint',
) );

$wp_customize->add_setting( $prefix . '_copyright_text', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( $prefix . '_copyright_layout', array(
    'type'        => 'select',
    'priority'    => 10,
    'section'     => $prefix . '_copyright_section',
    'label'       => esc_html__( 'Select the copyright section style', 'fashionable-store' ),
    'description' => esc_html__( 'There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'fashionable-store' ),
    'choices'     => array(
        1 => esc_html__( 'Style 1', 'fashionable-store' ),
        2 => esc_html__( 'Style 2', 'fashionable-store' ),
        3 => esc_html__( 'Style 3', 'fashionable-store' ),
        4 => esc_html__( 'Style 4', 'fashionable-store' ),
    )
) );

$wp_customize->add_control( $prefix . '_copyright_text', array(
    'type'        => 'text',
    'priority'    => 11,
    'section'     => $prefix . '_copyright_section',
    'label'       => esc_html__( 'Copyright', 'fashionable-store' ),
    'description' => esc_html__( 'Add your copyright text here. You can use this text with the available copyright layouts.', 'fashionable-store' ),
) );