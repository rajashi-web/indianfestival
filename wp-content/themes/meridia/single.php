<?php

/**
 * The template for displaying all single posts.
 *
 * @package Meridia
 */
get_header();
if ( 'single-post-style-2' == meridia_single_post_layout_type() ) {
    get_template_part( 'template-parts/posts/single/single-post-style-2', get_post_format() );
}
?>

<!-- Blog Single -->
<div class="section-wrap blog__single">
	<div class="container">
		<div class="row content-row <?php 
if ( 'fullwidth' == meridia_layout_type( 'single_post' ) ) {
    echo  esc_attr( 'justify-content-center' ) ;
}
?>">

			<!-- Content -->
			<div id="primary" class="blog__content content col-lg">
				<main class="site-main">

					<?php 
while ( have_posts() ) {
    the_post();
    ?>

						<?php 
    get_template_part( 'template-parts/content-single', get_post_format() );
    ?>

					<?php 
}
?>

				</main>
			</div> <!-- .blog__content -->


			<?php 
// Sidebar
if ( 'fullwidth' !== meridia_layout_type( 'single_post' ) && is_active_sidebar( 'meridia-blog-sidebar' ) ) {
    meridia_sidebar();
}
?>
			
		</div>
	</div>
</div>	

<?php 
meridia_instagram_section();
?>

<?php 
get_footer();