<?php

define('THEME_VERSION', wp_get_theme()->get('Version'));
define('THEME_PATH', dirname(__FILE__));
define('THEME_BUILD_PATH', THEME_PATH . '/build');
define('THEME_STYLES_URL', get_template_directory_uri() . '/build/css');
define('THEME_SCRIPTS_URL', get_template_directory_uri() . '/build/js');
define('THEME_BLOCKS_URL', get_template_directory_uri() . '/build/blocks');
define('THEME_ASSETS_URL', get_template_directory_uri() . '/assets');

/**
 * Noble Performs Base Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Noble_Performs_Base_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function noble_performs_base_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Noble Performs Base Theme, use a find and replace
		* to change 'noble-performs-base-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'noble-performs-base-theme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'noble-performs-base-theme' ),
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
			'noble_performs_base_theme_custom_background_args',
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
}
add_action( 'after_setup_theme', 'noble_performs_base_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noble_performs_base_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'noble_performs_base_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'noble_performs_base_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noble_performs_base_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'noble-performs-base-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'noble-performs-base-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'noble_performs_base_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function noble_performs_base_theme_scripts() {
	wp_enqueue_style( 'noble-performs-base-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'noble-performs-base-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'noble-performs-base-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'noble_performs_base_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// Register Blocks
require_once get_template_directory() . '/inc/new/register-blocks.php';

// Block Patterns
require_once get_template_directory() . '/inc/new/block-pattern-categories.php';
require_once get_template_directory() . '/inc/new/remove-core-wp-patterns.php';



function theme_setup() {
	// Add support for Block Styles.
	// add_theme_support( 'wp-block-styles' );

	// Enqueue editor styles.
	add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'theme_setup' );


// Enqueueing Styles
function enqueue_styles() {
	wp_enqueue_style('np-css-properties', THEME_STYLES_URL . '/css-properties.css', [], THEME_VERSION);

	if (!is_admin()) { // Check if it's not the admin dashboard
		wp_enqueue_style('np-frontend-styles', THEME_STYLES_URL . '/frontend-styles.css', [], THEME_VERSION);
	}
}
add_action('enqueue_block_assets', 'enqueue_styles');


// Admin Scripts
function block_admin_scripts() {
    wp_enqueue_script( 'np-editor-scripts', THEME_SCRIPTS_URL . '/editor.js', [], THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'block_admin_scripts' );

// Editor Styles
function editor_styles() {
	add_editor_style( 'build/css/editor-styles.css' );
}
add_action( 'after_setup_theme', 'editor_styles', 10 );



// Disable ability for the user to add custom colours. Restricts to the Theme.
add_theme_support( 'disable-custom-colors' );
add_theme_support( 'disable-custom-gradients' );
