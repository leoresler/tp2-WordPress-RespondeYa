<?php
/**
 * GrShop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eduna LMS
 */

if (!defined('eduna_lms_VERSION')) {
	$eduna_lms_theme = wp_get_theme();
	define('eduna_lms_VERSION', $eduna_lms_theme->get('Version'));
}

if ( ! function_exists( 'eduna_lms_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eduna_lms_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on one-elementor, use a find and replace
		 * to change 'eduna-lms' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eduna-lms', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/* Woocommerce Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		// Image Size
		add_image_size('eduna-lms-blog-thumb', 600, 440, true);
		add_image_size('eduna-lms-blog-single-thumb', 770, 380, true);
		add_image_size('eduna-lms-product-cat-thumb', 355, 265, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'eduna-lms' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'eduna_lms_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		
	}
endif;
add_action( 'after_setup_theme', 'eduna_lms_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eduna_lms_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Default Sidebar', 'eduna-lms' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'eduna-lms' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'eduna-lms' ),
			'id'            => 'eduna-lms-woocommerce-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'eduna-lms' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'eduna-lms' ),
		'id'            => 'eduna-lms-footer-1',
		'description'   => esc_html__( 'Add footer widget here.', 'eduna-lms' ),
		'before_widget' => '<div id="%1$s" class="eduna-lms-footer__widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'eduna-lms' ),
		'id'            => 'eduna-lms-footer-2',
		'description'   => esc_html__( 'Add footer widget here.', 'eduna-lms' ),
		'before_widget' => '<div id="%1$s" class="eduna-lms-footer__widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'eduna-lms' ),
		'id'            => 'eduna-lms-footer-3',
		'description'   => esc_html__( 'Add footer widget here.', 'eduna-lms' ),
		'before_widget' => '<div id="%1$s" class="eduna-lms-footer__widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'eduna-lms' ),
		'id'            => 'eduna-lms-footer-4',
		'description'   => esc_html__( 'Add footer widget here.', 'eduna-lms' ),
		'before_widget' => '<div id="%1$s" class="eduna-lms-footer__widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eduna_lms_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function eduna_lms_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/resource/css/bootstrap.css', array(), '5.1.3' );
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/resource/css/font-awesome-all.css', array(), '6.1.1' );
	wp_enqueue_style( 'eduna-lms-default', get_template_directory_uri() . '/resource/css/theme-default.css', array(), '1.0.0' );
	wp_enqueue_style( 'eduna-lms-woocommerce', get_template_directory_uri() . '/resource/css/woocommerce.css', array(), '1.0.0' );
	wp_enqueue_style( 'eduna-lms-tutor', get_template_directory_uri() . '/resource/css/tutor-custom.css', array(), '1.0.0' );
	wp_enqueue_style( 'eduna-lms-style', get_stylesheet_uri(), array(), eduna_lms_VERSION );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/resource/js/bootstrap.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'eduna-lms-navigation', get_template_directory_uri() . '/resource/js/navigation.js', array(), eduna_lms_VERSION, true );
    wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'skip-link-js', get_template_directory_uri() . '/resource/js/skip-link-focus-fix.js', array('jquery'), eduna_lms_VERSION, true );
	wp_enqueue_script( 'eduna-lms-active', get_template_directory_uri() . '/resource/js/active.js', array('jquery'), eduna_lms_VERSION, true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eduna_lms_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';


/**
 * Theme Font Load.
 */
require get_template_directory() . '/includes/theme-font.php';


/**
 * Load TGM plugins for required plugins.
 */
require get_template_directory() . '/includes/tgm/required-plugins.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Theme OCDI Import.
 */
require_once get_template_directory() . '/includes/ocdi-demo-import.php';

/**
 * Theme SEttings Menu.
 */
require_once get_template_directory() . '/includes/admin/admin-page.php';


