<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hayya
 */

?>

<?php
$show_post_image = HayyaTheme::hayya_options('show-post-image') ? ' show-post-image' : '';
?>

<div class="entry-content<?php echo esc_attr($show_post_image); ?>">

	<?php if ( HayyaTheme::hayya_options('show-post-image') ) : ?>

	<div class="post_thumbnail">

		<?php

		$post_title = the_title( '', '', false );
		?>
		<a href="<?php esc_url( the_permalink() ); ?>" title="<?php echo esc_attr( $post_title ); ?>">
			<?php

			$youtube_image = get_post_meta($post->ID, 'youtube-image', true);

			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'medium',
					array(
						'title' => $post_title
					)
				);
			} elseif ( $youtube_image ) {
					?><img class="hayya-youtube-image" src="https://img.youtube.com/vi/<?php echo esc_attr($youtube_image);?>/hqdefault.jpg" alt="<?php the_title();?>"><?php
			} else {
				if ( ! $image = HayyaTheme::hayya_options( 'default-posts-image' ) ) $image = get_template_directory_uri() . '/assets/images/no-image-150x150.png';
				?>
				<img src="<?php echo esc_url( $image ); ?>" class="wp-post-image post_no_thumbnail default-posts-image" alt="" title="<?php echo esc_attr( $post_title ); ?>" />
				<?php
			}
			if ( $category = get_the_category('') ) {
				?>
				<span class="category"><?php echo esc_html( $category[0]->name );?></span>
				<?php
			}
			?>
		</a>
	</div>
	
	<?php endif; ?>

	<div class="entry-body">
		<header class="entry-header">
			<span class="comments badge">
				<?php comments_number( '0 ', '1 ', '% ' );?>
			</span>
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title no-paddings no-margins"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header>

		<div class="entry-text">
		<?php
			if ( is_single() ) :
				the_content();
			else :
				the_excerpt();
			endif;
			?>
		</div>

		<div class="clear"></div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hayya' ),
			'after'  => '</div>',
		) );
		?>

		<footer class="entry-footer">
			<?php
			if ( 'post' === get_post_type() && ! is_single() ) : ?>
				<div class="entry-meta">
					<?php hayya_posted_on(); ?>
				</div> <?php
			endif;
			?>
			<div class="">
				<?php if ( is_single() ): ?>

					<div class="entry-tags">
						<span><?php esc_html_e('Tags', 'hayya')?></span>
						<?php the_tags('', '', '');?>
					</div>

				<?php endif; ?>
			</div>
			<div class="hidden hide">
				<span class="screen-reader-text post-date updated"><?php the_date(); ?></span>
				<span class="screen-reader-text vcard author post-author"><span class="fn"><?php the_author(); ?></span></span>
			</div>
		</footer>
	</div>
</div>
