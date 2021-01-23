<?php
/**
 * The template for displaying archive pages
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

			HayyaThemeWidgets::right_sidebar( 'start' );

			if ( is_author() && HayyaTheme::hayya_options( 'show-author-card' ) ) {
				HayyaThemePosts::author_card( get_the_author_meta( 'ID' ) );
			}
			?>

			<header class="page-title-header">
				<?php
					if ( ! is_author() ) {
						the_archive_description( '<div class="archive-description">', '</div>' );
					}
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header>

			<?php
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
