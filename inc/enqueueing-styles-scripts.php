<?php

// Enqueueing Styles
function enqueue_styles() {
	wp_enqueue_style('np-css-properties', THEME_STYLES_URL . '/css-properties.css', [], THEME_VERSION);

	// Check if it's not the admin dashboard
	if (!is_admin()) {
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
