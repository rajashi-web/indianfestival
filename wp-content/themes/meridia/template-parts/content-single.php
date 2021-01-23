<?php
/**
 * Single post
 *
 * @package Meridia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>

	<?php if ( 'single-post-style-1' == meridia_single_post_layout_type() ) {
		get_template_part( 'template-parts/posts/single/single-post-style-1', get_post_format() );
	} ?>

	<?php meridia_entry_content_top(); ?>

	<!-- Article -->
	<div class="entry__article clearfix">

		<?php the_content(); ?>

		<?php meridia_multi_page_pagination(); ?>

	</div><!-- .entry-article -->

	<?php meridia_entry_content_bottom(); ?>
	
	<?php if ( get_theme_mod( 'meridia_post_tags_settings', true ) || get_theme_mod( 'meridia_post_share_icons_settings', true ) ) : ?>
		<!-- Tags / Share -->
		<div class="row entry__share-tags">
			<?php if( get_theme_mod( 'meridia_post_tags_settings', true ) ) : ?>
				<div class="col-md-6">
					<div class="entry-tags tags">
						<?php the_tags( '', '', '' ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'meridia_post_share_icons_settings', true ) && function_exists('meridia_social_sharing_buttons') ) : ?>
				<div class="col-md-6">
					<div class="entry-share">
						<?php meridia_social_sharing_buttons(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div> <!-- end tags / share -->
	<?php endif; ?>

</article><!-- #post-## -->


<?php if ( get_theme_mod( 'meridia_author_box_show', true ) ) {
	meridia_author_box();
} ?>


<!-- Prev / Next Posts -->
<?php meridia_post_nav(); ?>

<?php if ( get_theme_mod( 'meridia_related_posts_settings', true ) ) {
	// Related Posts
	meridia_related_posts(); }
?>

<?php
	// Comments
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
?>

