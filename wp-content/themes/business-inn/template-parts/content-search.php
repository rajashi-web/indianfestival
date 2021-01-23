<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Inn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content-wrap">
		<div class="content-wrap-inner">
			<header class="entry-header">
				<?php 
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
				
				<div class="entry-footer">
					<?php
					if ( 'post' === get_post_type() ) :
						
						business_inn_posted_on(); 

					endif; 
					
					business_inn_entry_footer(); 
					?>
				</div>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-## -->