<?php
/**
 * The template for displaying search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hayya
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			HayyaThemeWidgets::right_sidebar('start'); ?>
			
			<header class="page-title-header">
				<h1 class="page-title"><?php esc_html_e('Searching for','hayya'); ?>: <?php the_search_query(); ?></h1>
			</header>

			<?php get_search_form(); ?>

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
