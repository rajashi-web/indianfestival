<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @since	  1.0.0
 * @package	hayya
 * @author	 zintaThemes <>
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

			<section class="error-404 not-found">

				<div class="hb_separator duble-lines separator-mask">
					<div class="left-separator"></div>
					<h4><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hayya' );?></h4>
					<div class="right-separator"></div>
				</div>

				<div class="page-content">

					<p class="center">
						<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hayya' ); ?>
					</p>

					<?php
						get_search_form();
					?>
					<div class="row">

						<div class="col l3 m3 s6">
							<?php
								the_widget(
									'WP_Widget_Recent_Posts',
									null,
									[
										'before_title' => '<h4 class="widgettitle">',
										'after_title' => '</h4>',
									]
								);
							?>
						</div>

						<div class="col l3 m3 s6">

							<div class="widget widget_categories">
								
								<h4 class="widgettitle">
									<?php esc_html_e( 'Most Used Categories', 'hayya' ); ?>
								</h4>

								<ul>
								<?php
									wp_list_categories( [
										'orderby'	=> 'count',
										'order'	  => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'	 => 10,
									] );
								?>
								</ul>

							</div><!-- .widget -->

						</div>

						<div class="col l3 m3 s6">
							<?php
							the_widget(
								'WP_Widget_Archives',
								null,
								[
									'before_title' => '<h4 class="widgettitle">',
									'after_title' => '</h4>',
								]
							);
							?>
						</div>

						<div class="col m3">
							<?php
							the_widget(
								'WP_Widget_Tag_Cloud',
								null,
								[
									'before_title' => '<h4 class="widgettitle">',
									'after_title' => '</h4>',
								]
							);
							?>
						</div>

					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
