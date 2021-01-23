<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since		  1.0.0
 * @package		  hayya
 * @author		 zintaThemes <>
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<!-- HAYYA Hooks -->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="site <?php echo esc_attr( HayyaTheme::hayya_options( 'layout-mode' ) ); ?>">

			<?php
			/**
			 * Call HayyaBuild function
			 */
			if ( !function_exists( 'hayyabuild' ) || !HayyaTheme::hayya_options( 'hayyabuild-header' ) || false === hayyabuild() ) :
			?>

			<header id="site-header" class="site-header page-header first-color second-color-text">

				<nav id="site-navigation">
					<div class="nav-wrapper container">
						<div id="main-logo">
							<?php
							if ( $logo = HayyaTheme::hayya_options( 'header-logo' ) ) :?>
							<a class="logo-container" href="<?php echo esc_url( get_site_url() ); ?>" class="brand-logo">
								<img alt="" src="<?php echo esc_url( $logo ); ?>" />
							</a>
							<?php
							else : ?>
								<a class="logo-container" href="<?php echo esc_attr( get_site_url() ); ?>" class="brand-logo">
									<?php bloginfo( 'name' );?>
								</a>
							<?php endif; ?>
						</div>
						<div id="main-navigation" class="ht_menu ht_menu--right">
							<div class="ht-toggle-menu">
								<div class="ht-toggle-menu__lines"></div>
							</div>
							<?php
							if ( function_exists( 'hayya_woocommerce_header_cart' ) && HayyaTheme::hayya_options( 'shop-show-header-cart' ) ) {
								echo '<div id="site-header-cart" class="site-header-cart">';
								hayya_woocommerce_header_cart();
								echo '</div>';
							}
							?>
							<?php
								wp_nav_menu( array(
									'theme_location'   	=> 'primary',
									'menu_id'		  	=> 'primary-menu',
									'menu_class' 		=> 'ht_menuul',
									'container'			=> 'ul',
								) );
							?>
						</div>
					</div>
				</nav><!-- #site-navigation -->

				<?php if ( $header_text = HayyaTheme::hayya_options( 'header-text' ) ) :?>
				<div id="header-content" class="header-content">
					<?php echo do_shortcode( wp_kses_post( $header_text ) );?>
				</div>
				<?php endif;?>

			</header><!-- #masthead -->

			<?php
			endif; ?>

			<?php if ( HayyaTheme::hayya_options( 'show-header-widgets' ) && ! is_page() ) get_sidebar( 'header' );?>

			<div id="content" class="site-content container">
