<?php
/**
 * Template parts
 *
 * @package 	Meridia
 * @since 		Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

add_action( 'meridia_page_section_before', 'meridia_page_title' );
add_action( 'meridia_archive_section_before', 'meridia_archive_page_title' );
add_action( 'meridia_search_results_section_before', 'meridia_search_results_page_title' );
add_action( 'meridia_404_section_before', 'meridia_404_page_title' );


/**
 * Page title
 */
if ( ! function_exists( 'meridia_page_title' ) ) {
	function meridia_page_title() {
		$layout = meridia_page_title_layout_type();
		$featured_image = ( has_post_thumbnail() ) ? sprintf( 'background-image: url( %s )', get_the_post_thumbnail_url() ) : '';
		$classes = '';
		$heading_class = '';

		switch ( $layout ) {
			case 'page-title-style-1':
				$classes = 'page-title';
				$heading_class = 'page-title__title';
				break;

			case 'page-title-style-2':
				$classes = 'page-title-style-2 bg-overlay';
				$heading_class = 'page-title-style-2__title';
				break;
		} ?>

		<!-- Page Title -->
		<div class="<?php echo esc_attr( $classes ); ?> text-center" <?php if ( 'page-title-style-2' === $layout ) echo 'style="' . esc_attr( $featured_image ) . '"'; ?>>
			<div class="container">
				<h1 class="<?php echo esc_attr( $heading_class ); ?>"><?php the_title(); ?></h1>
				<?php if ( meridia_is_woocommerce_activated() && is_woocommerce() ) {
					do_action( 'meridia_shop_breadcrumbs' );
				} ?>
			</div>	
		</div> <!-- .page-title -->

		<?php

	}
}


/**
 * Archive page title
 */
if ( ! function_exists( 'meridia_archive_page_title' ) ) {
	function meridia_archive_page_title() {
		$archive_title    	 = get_the_archive_title();
		$archive_description = get_the_archive_description();
		$layout = meridia_page_title_layout_type();
		$featured_image = ( has_post_thumbnail() ) ? sprintf( 'background-image: url( %s )', get_the_post_thumbnail_url() ) : '';

		if ( $archive_title || $archive_description ) :

			if ( 'page-title-style-1' === $layout ) : ?>

				<!-- Page Title Style 1 -->
				<div class="page-title text-center">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8">

								<?php if ( $archive_title ) : ?>
									<h1 class="page-title__title"><?php echo wp_kses_post( $archive_title ); ?></h1>
								<?php endif; ?>

								<?php if ( $archive_description ) : ?>
									<div class="page-title__description"><?php echo wp_kses_post( wpautop( $archive_description ) ); ?></div>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</div> <!-- .page-title -->
			
			<?php elseif ( 'page-title-style-2' === $layout ) : ?>

				<!-- Page Title Style 2 -->
				<div class="page-title-style-2 text-center bg-overlay" style="<?php echo esc_attr( $featured_image ); ?>">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8">

								<?php if ( $archive_title ) : ?>
									<h1 class="page-title-style-2__title"><?php echo wp_kses_post( $archive_title ); ?></h1>
								<?php endif; ?>

								<?php if ( $archive_description ) : ?>
									<div class="page-title__description"><?php echo wp_kses_post( wpautop( $archive_description ) ); ?></div>
								<?php endif; ?>

							</div>
						</div>
					</div>	
				</div> <!-- .page-title-style-2 -->

			<?php endif; ?>

		<?php endif;
	}
}


/**
 * Search results page title
 */
if ( ! function_exists( 'meridia_search_results_page_title' ) ) {
	function meridia_search_results_page_title() {
		$layout = meridia_page_title_layout_type();
		$featured_image = ( has_post_thumbnail() ) ? sprintf( 'background-image: url( %s )', get_the_post_thumbnail_url() ) : '';

		switch ( $layout ) {
			case 'page-title-style-1' : ?>
				<!-- Page Title -->
				<div class="page-title text-center">
					<h1 class="page-title__title"><?php printf( esc_html__( 'Search Results for: %s', 'meridia' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div><!-- .page-title -->
				<?php
				break;

			case 'page-title-style-2' : ?>
				<!-- Page Title Style 2 -->
				<div class="page-title-style-2 text-center bg-overlay" style="<?php echo esc_attr( $featured_image ); ?>">
					<h1 class="page-title-style-2__title"><?php printf( esc_html__( 'Search Results for: %s', 'meridia' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div><!-- .page-title-style-2 -->
				<?php
				break;
		}

	}
}


/**
 * 404 page title
 */
if ( ! function_exists( 'meridia_404_page_title' ) ) {
	function meridia_404_page_title() {
		$layout = meridia_page_title_layout_type();

		switch ( $layout ) {
			case 'page-title-style-1' : ?>				
				<!-- Page Title -->
				<div class="page-title text-center">
					<h1 class="page-title__title"><?php esc_html_e( '404 Page not found', 'meridia' ); ?></h1>
				</div> <!-- .page-title -->
				<?php
				break;

			case 'page-title-style-2' : ?>
				<!-- Page Title Style 2 -->
				<div class="page-title-style-2 text-center bg-overlay">
					<h1 class="page-title-style-2__title"><?php esc_html_e( '404 Page not found', 'meridia' ); ?></h1>
				</div><!-- .page-title-style-2 -->
				<?php
				break;
		}

	}
}


/**
 * Preloader
 */
if ( ! function_exists( 'meridia_preloader' ) ) {
	function meridia_preloader() {
		if ( get_theme_mod( 'meridia_preloader_show', false ) ) : ?>
			<div class="loader-mask">
				<div class="loader">
					<div></div>
				</div>
			</div>
		<?php endif;
	}
}


/**
 * Instagram section
 */
if ( ! function_exists( 'meridia_instagram_section' ) ) {
	function meridia_instagram_section() {

		if ( ! function_exists( 'sb_instagram_feed_init' ) ) {
			return;
		}

		if ( get_theme_mod( 'meridia_instagram_footer_show', true ) && is_active_sidebar( 'meridia-footer-instagram' ) ) {
			$subtitle = get_theme_mod( 'meridia_instagram_footer_subtitle', esc_html__( 'Follow me on Instagram', 'meridia' ) );
			?>

				<div class="instagram-feed__header">
					<?php if ( $subtitle ) : ?>				
						<span><?php echo esc_html( $subtitle ); ?></span>
					<?php endif; ?>
				</div>

				<div class="instagram-feed__images">
					<?php dynamic_sidebar( 'meridia-footer-instagram' ); ?>
				</div>
			<?php
		}

	}
}


/**
 * Primary Navbar
 */
if ( ! function_exists( 'meridia_primary_navbar' ) ) {
	function meridia_primary_navbar() {
		?>
			<!-- Navbar -->
			<nav id="navbar-collapse" class="flex-child nav__wrap collapse navbar-collapse" itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" role="navigation">
				<?php
				if ( has_nav_menu('primary-menu') ) {
					wp_nav_menu( array(
						'theme_location'  => 'primary-menu',
						'fallback_cb'			=> '__return_false',
						'container'       => false,
						'menu_class'      => 'nav__menu',
						'walker'          => new Meridia_Walker_Nav_Primary()
					) );
				}
				?>

				<?php if ( get_theme_mod( 'meridia_nav_search_show', true ) ) : ?>
					<!-- Mobile Search -->
					<div class="nav__search-mobile d-lg-none">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>

			</nav> <!-- end navbar -->
		<?php
	}
}


/**
 * Mobile Menu Toggle
 */
if ( ! function_exists( 'meridia_mobile_menu_toggle' ) ) {
	function meridia_mobile_menu_toggle() {
		if ( has_nav_menu('primary-menu') ) : ?>
			<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'meridia' ); ?></span>
				<span class="nav__icon-toggle-bar"></span>
				<span class="nav__icon-toggle-bar"></span>
				<span class="nav__icon-toggle-bar"></span>
			</button>
		<?php endif;
	}
}


/**
 * Fullscreen Search
 */
if ( ! function_exists( 'meridia_fullscreen_search' ) ) {
	function meridia_fullscreen_search() {
		if ( get_theme_mod( 'meridia_nav_search_show', true ) ) : ?>
			<!-- Fullscreen Search -->
			<div class="search-wrap">
				<?php get_search_form(); ?>
				<button type="button" role="presentation" class="search-close" id="search-close" aria-label="<?php echo esc_attr__( 'close search', 'meridia' ); ?>">
					<i class="ui-close"></i>
				</button>
			</div>
		<?php endif;
	}
}


/**
 * Back to top
 */
if ( ! function_exists( 'meridia_back_to_top' ) ) {
	function meridia_back_to_top() {
		if ( get_theme_mod( 'meridia_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top"><i class="ui-arrow-up"></i></a>
			</div>
		<?php endif; 
	}
}

/**
 * Content markup top
 */
if ( ! function_exists( 'meridia_content_markup_top' ) ) {
	function meridia_content_markup_top() {
		?>
		<section class="section-wrap">
			<div class="container">
				<div class="row">
		<?php
	}
}


/**
 * Content markup bottom
 */
if ( ! function_exists( 'meridia_content_markup_bottom' ) ) {
	function meridia_content_markup_bottom() {
		?>
				</div>
			</div>
		</section>
		<?php
	}
}