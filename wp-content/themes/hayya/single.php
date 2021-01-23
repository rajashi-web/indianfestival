<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main"><?php

		HayyaThemeWidgets::right_sidebar('start');

		while ( have_posts() ) : the_post();

			get_template_part( 'templates/content', get_post_type() );

			// HayyaThemePosts::post_links();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			HayyaThemeWidgets::right_sidebar();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
