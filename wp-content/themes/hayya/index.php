<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @since	  1.0.0
 * @package	hayya
 * @author	 zintaThemes <>
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			HayyaThemeWidgets::right_sidebar('start');

			if ( is_home() && ! is_front_page() ) : ?>

				<header class="page-title-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) {
				the_post();
				get_template_part( 'templates/content', get_post_format() );
			}

			HayyaThemePosts::pagination();

			HayyaThemeWidgets::right_sidebar();

		else :

			get_template_part( 'templates/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
