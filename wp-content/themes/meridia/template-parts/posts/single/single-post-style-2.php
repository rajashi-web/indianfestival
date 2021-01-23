<?php
/**
 * Single post style 2 layout
 *
 * @package 	Meridia
 * @since 		Meridia 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<!-- Featured Image -->
<div class="blog-featured-img bg-overlay" <?php if ( has_post_thumbnail() ) : ?>style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"<?php endif; ?>>
	<figure class="blog-featured-img__container d-none">
		<?php the_post_thumbnail( 'full', array( 'class' => 'blog-featured-img__image' )); ?>
	</figure>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">

				<header class="single-post__entry-header">

					<!-- Category -->
					<?php if ( get_theme_mod( 'meridia_meta_category_settings', true ) ) { meridia_meta_category(); } ?>

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

				</header>

			</div>
		</div>
	</div>
</div>