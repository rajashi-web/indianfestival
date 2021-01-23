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
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>

	<div class="content-wrap">
		<div class="content-wrap-inner">
			
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-footer">
				<?php business_inn_posted_on(); ?>
				<?php business_inn_entry_footer(); ?>
			</div>

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'business-inn' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-inn' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-## -->
