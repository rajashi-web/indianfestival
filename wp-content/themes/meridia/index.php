<?php
/**
 * The main template file.
 *
 * @package Meridia
 * @since   Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

// Featured Area
get_template_part( 'template-parts/featured-area/featured-area' );

// Promo Boxes
get_template_part( 'template-parts/promo-boxes' );

// Newsletter
get_template_part( 'template-parts/newsletter' );

?>

<!-- Blog -->
<div class="section-wrap section-blog">	
	<div class="container">
		<div class="row content-row">

			<?php meridia_primary_content_top(); ?>

			<!-- Content -->
			<div id="primary" class="blog__content content col-lg <?php echo meridia_post_layout_type( 'grid' ); ?>">
				<main class="site-main">

					<?php						
						// Post Layout Type
						switch( get_theme_mod( 'meridia_post_layout_type', 'grid' ) ) {

							case ( 'grid' ) :
							case ( 'grid-first-large' ) :
								get_template_part( 'template-parts/posts/grid-layout' );
								break;

							case ( 'list' ) :
								get_template_part( 'template-parts/posts/list-layout' );
								break;

							case ( 'horizontal-cards' ) :
								get_template_part( 'template-parts/posts/pro/horizontal-cards-layout' );
								break;

							case ( 'vertical-cards' ) :
								get_template_part( 'template-parts/posts/pro/vertical-cards-layout' );
								break;

							default :
								get_template_part( 'template-parts/posts/grid-layout' );
						}
					?>        

					<?php meridia_post_pagination(); ?>

				</main>
			</div> <!-- .blog__content -->

			<?php meridia_primary_content_bottom(); ?>
			
			<?php
				// Sidebar
				if ( 'fullwidth' !== meridia_layout_type( 'homepage' ) ) {
					meridia_sidebar();
				}
			?>

		</div>
	</div>
</div>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>