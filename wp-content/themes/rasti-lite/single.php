<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rasti
 */

get_header();
rasti_single_banner();
?>

<div class="clearfix"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8 single_blog">	
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'single' );

							?>
							
							<div class="posts-navigation clearfix">
								<div class="post-details-nav pull-left">
									<?php previous_post_link('%link', '<span class="nav_btn">PREV POST</span>' ); ?>
								</div>
								<div class="post-details-nav pull-right">
									<?php next_post_link('%link', '<span class="nav_btn">NEXT POST</span>' ); ?>
								</div>
								
							</div>	
							
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
					
					<div class="col-md-4">
						<?php get_sidebar();?>
					</div>
					
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
