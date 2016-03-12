<?php
/**
 * aestivate Theme Customizer.
 *
 * @package aestivate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aestivate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	//Adds option for users to customize the copyright details
	//Adds the section
 	$wp_customize->add_section('copyright_section', array(
 		'title' => __('Copyright Details')
	) ); 

	//Adds the setting
	$wp_customize->add_setting( 'copyright_setting', array(
		'default' => 'Aestivate all rights reserved.'
	) );

	//Adds the control
	$wp_customize->add_control( 'copyright_setting', array(
		'type' => 'text',
		'label' => __('Copyright Text'),
		'section' => 'copyright_section'
	) );
	
	//Adds option for users to customize the logo 
	//Adds the section
 	$wp_customize->add_section('logo_section', array(
 		'title' => __('Logo')
	) ); 

	//Adds the setting
	$wp_customize->add_setting( 'logo_setting', array(
		'default' => "img/me.jpg"
	) );

	//Adds the control
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_control', array(
  	'label' => _( 'logo image', 'theme_textdomain' ),
  	'section' => 'logo_section',
  	'settings' => 'logo_setting',
  	'mime_type' => 'image',
	) ) );
	
	//Adds option for users to customize the text color
	//Adds the setting
	$wp_customize->add_setting( 'text_color_setting', array(
		'default' => '#9EA3A5'
	) );

	//Adds the control
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_color_control', array(
		'label' => __('Text Color'),
		'section' => 'colors',
		'settings' => 'text_color_setting'
	) ) );

}

add_action( 'customize_register', 'aestivate_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aestivate_customize_preview_js() {
	wp_enqueue_script( 'aestivate_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aestivate_customize_preview_js' );
