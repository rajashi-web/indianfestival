<?php
/*
Template Name: Full Width
*/

/**
 * Page fullwidth layout
 *
 * @package Meridia
 * @since   Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Page Title -->
<div class="page-title text-center">
	<div class="container">
		<h1 class="page-title__title"><?php the_title(); ?></h1>
		<?php if ( meridia_is_woocommerce_activated() && is_woocommerce() ) {
			do_action( 'meridia_shop_breadcrumbs' );
		} ?>
	</div>	
</div> <!-- .page-title -->


<!-- Page Section -->
<section class="section-wrap pt-40">
	<div class="container-holder">
		<div class="container">
			<div class="row">

				<div id="primary" class="page-content col-lg-12">
					<main class="site-main">

						<?php if ( has_post_thumbnail() ) : ?>
							<!-- Thumb -->
							<figure class="entry-img">
								<?php the_post_thumbnail(); ?>
							</figure>
						<?php endif; ?>
					
						<div class="entry__article clearfix">
							<?php the_content(); ?>
						</div>
								
						<?php meridia_multi_page_pagination(); ?>				

						<?php
							// Comments
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					</main>
				</div> <!-- .page-content -->

			</div>
		</div>
	</div>
</section> <!-- end page section -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>