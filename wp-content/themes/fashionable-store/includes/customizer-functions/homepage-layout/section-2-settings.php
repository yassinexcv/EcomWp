<?php
$prefix = 'fashionable-store';
$wp_customize->add_section( $prefix . '_home_section_two', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Section 2', 'fashionable-store' ),
	'description'    => esc_html__( 'The second section below the featured categories section.', 'fashionable-store' ),
	'panel'          => $prefix . '_home_theme_panel',
) );
$wp_customize->add_setting( $prefix . '_section_two_bg_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_setting($prefix . '_section_two_content', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'fashionable_store_sanitize_dropdown_pages',
));
$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_section_two_bg_color',
		array(
			'label'   => esc_html__( 'Set background color.', 'fashionable-store' ),
			'section' => $prefix . '_home_section_two',
		) ) );
$wp_customize->add_control($prefix . '_section_two_content', array(
	'type' => 'dropdown-pages',
	'priority' => 9,
	'section' => $prefix . '_home_section_two',
	'label' => esc_html__('Select the page to show the content.', 'fashionable-store'),
	'description'=> esc_html__('Keep in mind to use a page that you have pasted a WooCommerce shortcode inside it order to make the products shown inside this section. The title of that page and the excerpt will be shown as title and subtitle automatically. There are some examples for this in the documentation.','fashionable-store')
));
