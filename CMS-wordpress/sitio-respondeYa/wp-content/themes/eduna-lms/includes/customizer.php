<?php
/**
 * Theme Customizer
 *
 * @package Eduna LMS
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eduna_lms_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'eduna_lms_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'eduna_lms_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'eduna_lms_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function eduna_lms_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function eduna_lms_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eduna_lms_customize_preview_js() {
	wp_enqueue_script( 'eduna-lms-customizer', get_template_directory_uri() . '/resource/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eduna_lms_customize_preview_js' );


// Load customizer required panels

// Sanitize
require trailingslashit( get_template_directory() ) . '/includes/sanitize.php'; 


if ( class_exists( 'Kirki' ) ) {
require trailingslashit( get_template_directory() ) . '/includes/eduna-lms-customizer/kirki-customizer.php';
}