<?php
/**
 * The template for displaying search results pages.
 *
 * @package Meridia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header(); ?>

<?php meridia_search_results_section_before(); ?>

<section class="section-wrap pb-50 grid-layout">
	<div class="container">    
		<div class="row" id="masonry-grid">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<div class="col-lg-4 col-sm-6 col-xs-12">         
					<?php get_template_part( 'template-parts/posts/grid-post-small', get_post_format() ); ?>
				</div>
				
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>        
		
		</div> <!-- .row -->

		<?php meridia_post_pagination(); ?>

	</div>
</section>

<?php meridia_search_results_section_after(); ?>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>
