<?php
/**
 * The template for displaying archive pages.
 *
 * @package Meridia
 * @since   Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
$meridia_archive_columns = get_theme_mod( 'meridia_archives_columns', 'col-lg-4' );
?>

<?php meridia_archive_section_before(); ?>

<div class="section-wrap pb-50 grid-layout">
	<div class="container">
		<div class="row content-row">

			<!-- Content -->
			<div class="blog__content content col-lg">
				<main class="site-main">

					<div class="row" id="masonry-grid">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<div class="<?php echo esc_attr( $meridia_archive_columns ); ?> col-sm-6 col-xs-12">            
								<?php get_template_part( 'template-parts/posts/grid-post-small', get_post_format() ); ?>
							</div>

						<?php endwhile; ?>

						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>

					</div> <!-- .row -->

					<?php meridia_post_pagination(); ?>

				</main>
			</div> <!-- .blog__content -->

			<?php
				// Sidebar
				if ( 'fullwidth' !== meridia_layout_type( 'archives', 'fullwidth' ) ) {
					meridia_sidebar();
				}
			?>

		</div> <!-- .row -->

	</div>
</div>

<?php meridia_archive_section_after(); ?>

<?php meridia_instagram_section(); ?>

<?php get_footer();  ?>