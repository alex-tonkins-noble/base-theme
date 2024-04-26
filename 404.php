<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Noble_Performs_Base_Theme
 */

get_header();
?>

	<section class="error-404 not-found">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'noble-performs-base-theme' ); ?></h1>

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'noble-performs-base-theme' ); ?></p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );
				?>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

<?php
get_footer();
