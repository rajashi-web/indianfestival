<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Meridia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

meridia_404_section_before(); ?>

<div class="section-wrap section-blog pb-50">
	<div class="container">
		<div class="row justify-content-center">
				
			<div class="col-lg-6">
				<main class="site-main">

					<div class="entry__article text-center">
						<p class="mb-20"><?php esc_html_e( 'Don\'t fret! Let\'s get you back on track. Perhaps searching can help', 'meridia' ); ?></p>
						<?php get_search_form(); ?>
					</div>
					
				</main>
			</div><!-- .col -->
			
		</div>
	</div>
</div>

<?php meridia_404_section_after(); ?>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>
