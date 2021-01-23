<?php
/**
 *
 * Template Name: Media Page
 * Template Post Type: post
 *
 * Template part for displaying media
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hayya
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main post-type-media">

			<?php
			while ( have_posts() ):
				
				?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<?php

				the_post();

				get_template_part( 'templates/content', 'page' );

				?>

				<div class="hb_separator duble-lines separator-mask">
					<div class="left-separator"></div>
						<h4><?php esc_html_e( 'Other Media Files', 'hayya' );?></h4>
					<div class="right-separator"></div>
				</div>

				<div id="other-media-files" class="row">
					<?php HayyaThemePosts::media_gallery();?>
				</div>
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
