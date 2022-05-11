<?php
$wp_customize->add_section( $prefix . '_home_blog_section', array(
	'priority'       => 16,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Blog section', 'fashionable-store' ),
	'description'    => esc_html__( 'The blog section of the homepage. It uses the title and the excerpt from the blog page you have set at the "Reading Settings". At the moment you can show the last 3 blog entries.', 'fashionable-store' ),
	'panel'          => $prefix . '_home_theme_panel',
) );

$wp_customize->add_setting( $prefix . '_enable_blog_section', array(
	'default'           => true,
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'fashionable_store_sanitize_checkbox',
) );

$wp_customize->add_control( $prefix . '_enable_blog_section', array(
	'type'     => 'checkbox',
	'priority' => 10,
	'section'  => $prefix . '_home_blog_section',
	'label'    => esc_html__( 'Enable this section.', 'fashionable-store' ),
) );