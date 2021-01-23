<?php
/**
 * Template part for displaying single page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hayya
 */

?>

<div class="entry-content single-entry">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php $post_title = the_title('', '', false); ?>

	<?php
	if ( has_post_thumbnail() ) {

		the_post_thumbnail('large', array(
				'class' => 'responsive-img',
				'title' => $post_title
			)
		);
		
	}
	?>

	<div class="entry-text">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hayya' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<div class="clear"></div>

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
				<div class="entry-categories">
					<span class="second-color"><?php esc_html_e( 'Categories', 'hayya' )?></span>
					<?php the_category(); ?>
				</div>

				<div class="entry-tags">
					<span class="second-color"><?php esc_html_e( 'Tags', 'hayya' )?></span>
					<?php the_tags('<ul><li>', '</li><li>', '</li></ul>');?>
				</div>
			<?php endif; ?>
		</div>
		<div class="hidden hide">
			<span class="screen-reader-text post-date updated"><?php the_date(); ?></span>
			<span class="screen-reader-text vcard author post-author"><span class="fn"><?php the_author(); ?></span></span>
		</div>
	</footer> <!-- .entry-footer -->

	<?php
	if ( HayyaTheme::hayya_options('show-author-card') ) {
		echo '<div id="author_card">';
			HayyaThemePosts::author_card( get_the_author_meta('ID') );
		echo '</div>';
	}
	?>

	<?php if ( HayyaTheme::hayya_options('show-related-and-author') ) : ?>
	<div id="related-posts" class="more-tabs tabs tabs--swipeup">
		<ul class="tabs__list">
			<li class="tab active"><a class="waves-effect" href="#related_articles"><?php esc_html_e( 'Related Articles', 'hayya' );?></a></li>
			<li class="tab"><a class="waves-effect" href="#more_from_author"><?php esc_html_e( 'More From Author', 'hayya' );?></a></li>
		</ul>
		<div class="tabs__content">
			<?php HayyaThemePosts::related_posts();?>
			<?php HayyaThemePosts::author_posts();?>
		</div>
	</div>
	<?php endif; ?>

	<?php HayyaThemePosts::post_links();?>

</div><!-- .entry-content -->
