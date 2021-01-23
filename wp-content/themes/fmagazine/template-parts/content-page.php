<?php
/**
 * The template used for displaying page content
 *
 * @subpackage fMagazine
 * @author tishonator
 * @since fMagazine 1.0.0
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumbnail-wrapper">
				<?php the_post_thumbnail('full'); ?>
			</div>
	<?php endif; ?>

	<h1 class="entry-title"><?php the_title(); ?></h1>
	
	<div class="page-content">
		<?php the_content( __( 'Read More...', 'fmagazine') ); ?>
	</div><!-- .page-content -->

	<div class="page-after-content">
		
		<?php if ( ! post_password_required() ) : ?>

			<?php if ('open' == $post->comment_status) : ?>

				<span class="icon comments-icon">
					<?php comments_popup_link(__( 'No Comments', 'fmagazine' ), __( '1 Comment', 'fmagazine' ), __( '% Comments', 'fmagazine' ), '', __( 'Comments are closed.', 'fmagazine' )); ?>
				</span>

			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'fmagazine' ), '<span class="edit-icon">', '</span>' ); ?>
		<?php endif; ?>

	</div><!-- .page-after-content -->
</article><!-- #post-## -->

