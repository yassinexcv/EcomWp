<?php
$prefix = 'fashionable-store';
$wp_customize->add_section( $prefix . '_home_section_one', array(
	'priority'       => 9,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Section 1', 'fashionable-store' ),
	'description'    => esc_html__( 'The first section below the featured categories.', 'fashionable-store' ),
	'panel'          => $prefix . '_home_theme_panel',
) );
$wp_customize->add_setting( $prefix . '_section_one_bg_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_setting( $prefix . '_section_one_content', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'fashionable_store_sanitize_dropdown_pages',
) );

$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_section_one_bg_color',
		array(
			'label'   => esc_html__( 'Set background color.', 'fashionable-store' ),
			'section' => $prefix . '_home_section_one',
		) ) );

$wp_customize->add_control( $prefix . '_section_one_content', array(
	'type'        => 'dropdown-pages',
	'priority'    => 9,
	'section'     => $prefix . '_home_section_one',
	'label'       => esc_html__( 'Select the page to show the content.', 'fashionable-store' ),
	'description' => esc_html__( 'Keep in mind to use a page that you have pasted a WooCommerce shortcode inside it order to make the products shown inside this section. There are some examples for this in the documentation.', 'fashionable-store' )
) );