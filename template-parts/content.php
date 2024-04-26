<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noble_Performs_Base_Theme
 */

?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php noble_performs_base_theme_post_thumbnail(); ?>

<?php the_content(); ?>

<?php noble_performs_base_theme_entry_footer(); ?>