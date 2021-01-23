<?php
/*
Template Name: Contact
*/

/**
 * Page Contact
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

<!-- Contact -->
<div class="section-wrap page-contact pt-40 pb-50">
	<div class="container-holder">
		<div class="container">
			<main class="site-main">

				<div class="row justify-content-center">
					<div class="col-lg-10">
						<!-- Image -->
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>

						<article class="page-contact__entry mt-30">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<div class="entry__article clearfix">
									<?php the_content(); ?>

									<?php
										// Comments
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>
								</div>
							<?php endwhile; endif; ?>
						</article>
					</div>
						

				</div>

			</main>
		</div>
	</div>
</div>

<?php meridia_page_section_after(); ?>

<?php meridia_instagram_section(); ?>

<?php get_footer(); ?>