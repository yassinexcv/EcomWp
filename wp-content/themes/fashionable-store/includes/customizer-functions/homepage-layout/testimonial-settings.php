<?php
$wp_customize->add_section( $prefix . '_home_testimonials_section', array(
	'priority'       => 17,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Testimonials section', 'fashionable-store' ),
	'description'    => esc_html__( 'Show your latest testimonials using a great testimonials slider.', 'fashionable-store' ),
	'panel'          => $prefix . '_home_theme_panel',
) );

$wp_customize->add_setting( $prefix . '_enable_testimonials_section', array(
	'default'           => true,
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'fashionable_store_sanitize_checkbox',
) );

$wp_customize->add_setting($prefix . '_testimonials_parent_page', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'fashionable_store_sanitize_dropdown_pages',
));


$wp_customize->add_control( $prefix . '_enable_testimonials_section', array(
	'type'     => 'checkbox',
	'priority' => 10,
	'section'  => $prefix . '_home_testimonials_section',
	'label'    => esc_html__( 'Enable this section.', 'fashionable-store' ),
) );

$wp_customize->add_control($prefix . '_testimonials_parent_page', array(
	'type' => 'dropdown-pages',
	'priority' => 11,
	'section' => $prefix . '_home_testimonials_section',
	'label' => esc_html__('Select the parent page of the testimonials.', 'fashionable-store'),
	'description'=> esc_html__('By selecting the page above, all its children pages will be act like the testimonials. Refer to the documentation to see how you use this section.','fashionable-store')
));