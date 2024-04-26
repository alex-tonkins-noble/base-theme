<?php

define('THEME_VERSION', wp_get_theme()->get('Version'));
define('THEME_PATH', dirname(__FILE__));
define('THEME_BUILD_PATH', THEME_PATH . '/build');
define('THEME_STYLES_URL', get_template_directory_uri() . '/build/css');
define('THEME_SCRIPTS_URL', get_template_directory_uri() . '/build/js');
define('THEME_BLOCKS_URL', get_template_directory_uri() . '/build/blocks');
define('THEME_ASSETS_URL', get_template_directory_uri() . '/assets');


// Register Blocks
require_once get_template_directory() . '/inc/theme-support.php';

// Register Blocks
require_once get_template_directory() . '/inc/register-blocks.php';

// Block Patterns
require_once get_template_directory() . '/inc/block-pattern-categories.php';
require_once get_template_directory() . '/inc/remove-core-wp-patterns.php';

// All Styles & Scripts
require_once get_template_directory() . '/inc/enqueueing-styles-scripts.php';

