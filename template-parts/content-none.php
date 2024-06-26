<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noble_Performs_Base_Theme
 */

?>

	<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'noble-performs-base-theme' ); ?></h1>

	<?php

	if ( is_search() ) :
		?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'noble-performs-base-theme' ); ?></p>
		<?php
		get_search_form();

	else :
		?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'noble-performs-base-theme' ); ?></p>
		<?php
		get_search_form();

	endif;
	?>