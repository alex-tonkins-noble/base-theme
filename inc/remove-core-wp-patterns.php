<?php

// Remove Core WordPress Patterns
function remove_core_wp_patterns() {
	remove_theme_support('core-block-patterns');

	// Manually remove all patterns - the above theme support removal doesn't target the ones below.
	unregister_block_pattern('core/query-standard-posts');
	unregister_block_pattern('core/query-medium-posts');
	unregister_block_pattern('core/query-small-posts');
	unregister_block_pattern('core/query-grid-posts');
	unregister_block_pattern('core/query-large-title-posts');
	unregister_block_pattern('core/query-offset-posts');
	unregister_block_pattern('core/social-links-shared-background-color');
};
add_action( 'init', 'remove_core_wp_patterns');