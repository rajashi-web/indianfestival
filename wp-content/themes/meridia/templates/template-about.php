<?php
/*
Template Name: About
*/

/**
 * Page About
 *
 * @package Meridia
 * @since   Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<?php meridia_page_section_before(); ?>

<!-- About -->
<div class="section-wrap about-me pt-40 pb-60">
	<div class="container-holder">
		<div class="container">
			<main class="site-main">

				<div class="row row-35">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div class="col-sm-6" >
						<!-- Image -->
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
					</div> <!-- end col -->

					<div class="col-sm-6" >
						<article class="entry__article clearfix">
							<?php the_content(); ?>

							<?php
								// Comments
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						</article>
					</div> <!-- .col -->

					<?php endwhile; endif; ?>
				</div>

			</main>
		</div>
	</div>
</div>

<?php meridia_page_section_after(); ?>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>