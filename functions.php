<?php
/**
 * Gather functions and definitions
 *
 * @package Gather
 */

/**
 * The current version of the theme.
 */
define( 'GATHER_VERSION', '1.1.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 664; /* pixels */
}

if ( ! function_exists( 'gather_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gather_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Gather, use a find and replace
	 * to change 'gather' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gather', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Registers navigation menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gather' ),
		'secondary' => __( 'Secondary Menu', 'gather' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
	) );

	// Post editor styles
	add_editor_style( 'editor-style.css' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'quote', 'link'
	) );

	// Adds support for wide images introduced in WordPress 5.0.
	add_theme_support( 'align-wide' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gather_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );

	// Support custom logo feature.
	add_theme_support( 'custom-logo', array( 'size' => 'large' ) );

}
endif; // gather_setup
add_action( 'after_setup_theme', 'gather_setup' );

if ( ! function_exists( 'gather_register_image_sizes' ) ) :
/*
 * Enables support for Post Thumbnails on posts and pages.
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
function gather_register_image_sizes() {

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 720, 1200 );
	add_image_size( 'gather-archive', 560, 999 );

}
add_action( 'after_setup_theme', 'gather_register_image_sizes' );
endif;

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gather_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gather' ),
		'id'            => 'primary',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget module %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'gather' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'gather_widgets_init' );

/**
 * Enqueue fonts.
 */
function gather_fonts() {

	// Font options
	$fonts = array();

	// Site title font only required when logo not in use
	if ( ! get_theme_mod( 'logo', 0 ) ) :
		$fonts[0] = get_theme_mod( 'site-title-font', customizer_library_get_default( 'site-title-font' ) );
	endif;

	$fonts[1] = get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) );
	$fonts[2] = get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) );

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style(
		'gather-body-fonts',
		$font_uri,
		array(),
		null,
		'screen'
	);

	// Icon Font
	wp_enqueue_style(
		'gather-icons',
		get_template_directory_uri() . '/assets/fonts/gather-icons.css',
		array(),
		'0.4.0'
	);

}
add_action( 'wp_enqueue_scripts', 'gather_fonts' );

/**
 * Enqueue scripts and styles.
 */
function gather_scripts() {

	wp_enqueue_style(
		'gather-style',
		get_template_directory_uri() . '/css/style.min.css',
		array(),
		GATHER_VERSION
	);

	// Use style-rtl.css for RTL layouts
	wp_style_add_data(
		'gather-style',
		'rtl',
		'replace'
	);

	wp_enqueue_script(
		'gather-scripts',
		get_template_directory_uri() . '/js/gather.min.js',
		array( 'jquery' ),
		GATHER_VERSION,
		true
	);

	if ( gather_load_masonry() ) {
		 wp_enqueue_script( 'masonry' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gather_scripts' );

/**
 * Load placeholder polyfill for IE9 and older
 */
function gather_placeholder_polyfill() {
	echo '<!--[if lte IE 9]><script src="' . get_template_directory_uri() . '/assets/js/jquery-placeholder.js"></script><![endif]-->'. "\n";
}
add_action( 'wp_head', 'gather_placeholder_polyfill' );


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Color utility functions.
if ( ! class_exists( 'Jetpack_Color' ) ) {
	require get_template_directory() . '/inc/jetpack.class.color.php';
}

// Helper library for the theme customizer.
require get_template_directory() . '/inc/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/inc/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/inc/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/inc/mods.php';

// Theme Updater
function gather_theme_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'gather_theme_updater' );
