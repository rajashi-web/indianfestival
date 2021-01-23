<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rasti
 */

get_header(); 
rasti_blog_banner();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ">
				
						<?php
						
							if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; 
					
					?>	
						
					
					<div class="row">
						<div class="col-sm-12">
							<div class="pagination">
							<!-- pagination -->
								<?php the_posts_pagination( array(
									'mid_size' => 2,
									'prev_text' => rasti_wp_kses( '<i class="ti-angle-left"></i>' ),
									'next_text' => rasti_wp_kses( '<i class="ti-angle-right"></i>' ),
								) ); ?>
								
							</div>
						</div>
					</div>							
				</div>
								
				<div class="col-md-4">
					<?php get_sidebar();?>
				</div>	
			</div>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->


<?php

get_footer();
