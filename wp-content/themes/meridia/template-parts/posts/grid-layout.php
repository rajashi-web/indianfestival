<?php
/**
 * Grid layout
 *
 * @package 	Meridia
 * @since 		Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$meridia_homepage_columns = get_theme_mod( 'meridia_homepage_columns', 'col-lg-6' );
$meridia_post_layout = get_theme_mod( 'meridia_post_layout_type', 'grid' );

?>

<!-- Grid Layout -->
<?php if ( have_posts() ) : ?>
	
	<div class="row" id="masonry-grid">

		<?php while ( have_posts() ) : the_post();

			// large post
			if ( 'grid-first-large' === $meridia_post_layout && 0 == $wp_query->current_post ) : ?>
				<div class="large-post col-lg-12">
					<?php get_template_part( 'template-parts/posts/grid-post-large', get_post_format() ); ?>
				</div>

			<?php else : ?>
				<div class="<?php echo esc_attr( $meridia_homepage_columns ); ?> col-sm-6">
					<?php get_template_part( 'template-parts/posts/grid-post-small', get_post_format() ); ?>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>

	</div> <!-- .row -->

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>