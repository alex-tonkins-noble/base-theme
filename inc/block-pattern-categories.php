<?php
/**
 * Register Block Pattern Category.
 *
 * @package Armando Noble
 * @since 2.0.0
 */

if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'layout',
		array( 'label' => esc_html__( 'Page layouts', 'armando-noble' ) )
	);
}
