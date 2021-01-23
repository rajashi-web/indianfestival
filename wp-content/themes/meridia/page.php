<?php
/**
 * Default Page Template
 *
 * @package Meridia
 * @since   Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

$meridia_page_title_layout = meridia_page_title_layout_type();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php meridia_page_section_before(); ?>

<!-- Page Section -->
<div class="section-wrap pt-40">
	<div class="container-holder">
		<div class="container">
			<div class="row content-row <?php if ( 'fullwidth' == meridia_layout_type( 'page' ) ) { echo esc_attr( 'justify-content-center' ); } ?>">

				<div id="primary" class="page-content content col-lg">
					<main class="site-main">
					
						<div class="entry__article clearfix">
							<?php the_content(); ?>
						</div>
								
						<?php meridia_multi_page_pagination(); ?>				

						<?php
							// Comments
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					</main>
				</div> <!-- .page-content -->			

				<?php
					// Sidebar
					if ( 'fullwidth' !== meridia_layout_type( 'page', 'fullwidth' ) && is_active_sidebar( 'meridia-page-sidebar' ) ) {
						meridia_sidebar( 'page' );
					}
				?>

			</div>
		</div>
	</div>
</div> <!-- end page section -->

<?php meridia_page_section_after(); ?>

<?php endwhile; endif; ?>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>