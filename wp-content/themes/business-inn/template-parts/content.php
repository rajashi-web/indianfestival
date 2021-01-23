<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Inn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
		</div>
	<?php endif; ?>

	<div class="content-wrap">
		<div class="content-wrap-inner">
			
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-footer">
				<?php business_inn_posted_on(); ?>
				<?php business_inn_entry_footer(); ?>
			</div>

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-## -->