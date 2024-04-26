<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noble_Performs_Base_Theme
 */

?>

<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

<?php noble_performs_base_theme_post_thumbnail(); ?>

<?php the_excerpt(); ?>

<?php noble_performs_base_theme_entry_footer(); ?>