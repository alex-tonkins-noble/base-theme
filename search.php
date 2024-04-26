<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Noble_Performs_Base_Theme
 */

get_header();

if ( have_posts() ) : ?>
	<h1 class="page-title">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Search Results for: %s', 'noble-performs-base-theme' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'search' );
	endwhile;

	the_posts_navigation();

else :
	get_template_part( 'template-parts/content', 'none' );
endif;

get_sidebar();
get_footer();
