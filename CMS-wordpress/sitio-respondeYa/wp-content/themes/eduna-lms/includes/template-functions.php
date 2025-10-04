<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
* @package Eduna LMS
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eduna_lms_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' )  ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'eduna_lms_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function eduna_lms_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'eduna_lms_pingback_header' );


// Define the function to check Elementor activation and usage
function eduna_lms_active() {
    // Check if Elementor is active
    if (defined('ELEMENTOR_PATH')) {
        // Check if the current page is built with Elementor
        $post_id = get_queried_object_id();
        if (\Elementor\Plugin::$instance->db->is_built_with_elementor($post_id)) {
            return 'container-elementor';
        }
    }
}
// Hook the function to an appropriate action (e.g., init)
add_action('init', 'eduna_lms_active');

// Post Excerpt Limit
function eduna_lms_wpdocs_custom_excerpt_length( $length ) {
    $excerptlength = absint(get_theme_mod('eduna_lms_post_excerpt',22));
    return $excerptlength;
}
add_filter( 'excerpt_length', 'eduna_lms_wpdocs_custom_excerpt_length', 999 );









