<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 * @subpackage fmagazine
 * @author tishonator
 * @since fMagazine 1.0.0
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
	<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) : ?>

			<?php if ( is_single() ) : ?>

					<?php the_post_thumbnail('full'); ?>
			
			<?php else : ?>

					<div class="thumbnail-wrapper">
						<?php the_post_thumbnail('full'); ?>
					</div>

			<?php endif; ?>

	<?php endif; ?>

	<div class="before-content">		
		<?php if ( !is_single() && get_the_title() === '' ) : ?>
				<span class="icon clock-icon">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
					</a>
				</span><!-- .clock-icon -->
		<?php else : ?>
				<span class="icon clock-icon">
					<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
				</span><!-- .clock-icon -->
		<?php endif; ?>
		
		<?php if ( ! post_password_required() ) :
					$format = get_post_format();
					if ( current_theme_supports( 'post-formats', $format ) ) :
						printf( '<span class="%1$s-icon"> <a href="%2$s">%3$s</a></span>',
								$format,							
								esc_url( get_post_format_link( $format ) ),
								get_post_format_string( $format )
							);
					endif;
			  endif;
		?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="icon comments-icon">
					<?php comments_popup_link(__( 'No Comments', 'fmagazine' ), __( '1 Comment', 'fmagazine' ), __( '% Comments', 'fmagazine' ), '', __( 'Comments are closed.', 'fmagazine' )); ?>
				</span><!-- .comments-icon -->
		<?php endif; ?>
	</div><!-- .before-content -->

	<?php the_content( __( 'Read More...', 'fmagazine') ); ?>

	<div class="after-content">
		<div class="icon author-icon">
			<?php echo get_avatar( get_the_author_meta('email'), '26' ); ?>
			<?php the_author_posts_link(); ?>
		</div>
		<?php if ( ! post_password_required() ) : ?>
				<?php if ( has_category() ) : ?>
						<div class="icon category-icon">
							<?php the_category( ', ' ) ?>
						</div><!-- .category-icon -->						
				<?php endif; ?>
			
				<?php if ( has_tag() ) : ?>
						<div class="icon tags-icon">
							<?php the_tags(''); ?> 
						</div><!-- .tags-icon -->						
				<?php endif; ?>
		<?php endif; // ! post_password_required() ?>

		<?php edit_post_link( __( 'Edit', 'fmagazine' ), '<span class="edit-icon">', '</span>' ); ?>
	</div><!-- .after-content -->
	<?php if ( !is_single() ) : ?>
			<div class="separator">
			</div>
	<?php endif; ?>
</article><!-- #post-## -->
