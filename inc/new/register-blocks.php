<?php

// Register Custom Gutenberg Blocks

// Recursive function to search directories and register block types
function register_blocks_recursively($directory) {
    $subdirs = glob($directory . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);
    foreach ($subdirs as $path) {
        if (file_exists($path . DIRECTORY_SEPARATOR . 'block.json')) {
            register_block_type($path . DIRECTORY_SEPARATOR . 'block.json');
        }
        register_blocks_recursively($path);
    }
}

// Main function to initiate recursive registration
function register_custom_blocks() {
    // Define the initial path to blocks directory
    $blocks_path = THEME_BUILD_PATH . DIRECTORY_SEPARATOR . 'blocks';
    register_blocks_recursively($blocks_path);
}

add_action('init', 'register_custom_blocks');
