<?php

// Set up theme defaults and registers support for various WordPress features.
function theme_support() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');

	// body { ... } in the editor style is rewritten to .editor-styles-wrapper { ... }
	add_theme_support( 'editor-styles' );

	// Disable ability for the user to add custom colours. Restricts to the Theme.
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-gradients' );
}
add_action( 'after_setup_theme', 'theme_support' );