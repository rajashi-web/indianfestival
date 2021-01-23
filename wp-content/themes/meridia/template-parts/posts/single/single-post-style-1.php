<?php
/**
 * Single post style 1 layout
 *
 * @package 	Meridia
 * @since 		Meridia 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<!-- Entry Header -->
<div class="entry-header">
	<!-- Category -->
	<?php if ( get_theme_mod( 'meridia_meta_category_settings', true ) ) { meridia_meta_category(); } ?>

	<!-- Title -->
	<h1 class="single-post__entry-title"><?php the_title(); ?></h1>

	<?php if ( get_theme_mod( 'meridia_meta_date_settings', true ) || get_theme_mod( 'meridia_meta_comments_settings', true ) ) : ?>
		<!-- Meta -->
		<ul class="entry-meta">
			<li class="entry-date">
				<?php if ( get_theme_mod( 'meridia_meta_date_settings', true ) ) { meridia_meta_date(); } ?>
			</li>                 
			<li class="entry-comments">
				<?php if ( get_theme_mod( 'meridia_meta_comments_settings', true ) ) { meridia_meta_comments(); } ?>
			</li>             
		</ul>
	<?php endif; ?>

</div>


<?php
	// Post thumb
	if ( has_post_thumbnail() ) {
		$post_format = get_post_format( $post->ID );   

		switch ( $post_format ) {
			case 'gallery':
			case 'video':
			case 'audio':
				break;

			default: ?>
				<figure class="entry-img single-post__entry-img-holder">
					<?php if ( 'fullwidth' == meridia_layout_type( 'single_post' ) ) : ?>
						<?php the_post_thumbnail( 'meridia_extra_large' ); ?>
					<?php else : ?>
						<?php the_post_thumbnail( 'meridia_large' ); ?>
					<?php endif; ?>
				</figure>
			<?php
		}
	}
?>