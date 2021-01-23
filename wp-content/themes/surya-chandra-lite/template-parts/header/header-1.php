<?php
/**
 * Header template
 *
 * @package Surya_Chandra
 */

?>
<div id="tophead">
	<div class="container">

		<a href="#" class="search-icon"><i class="fa fa-search"></i></a>
		<div class="search-box-wrap">
			<div class="container">
				<?php get_search_form(); ?>
			</div><!-- .container -->
		</div><!-- .search-box-wrap -->


		<?php surya_chandra_render_contact_info(); ?>

		<div class="header-social-wrapper">
			<?php surya_chandra_render_social_links( 'default' ); ?>
		</div><!-- .header-social-wrapper -->
	</div><!-- .container -->
</div><!-- #tophead -->

<header id="masthead" class="site-header">
	<div class="container">

		<?php surya_chandra_render_site_branding(); ?>

		<div id="header-right">
			<div id="quick-link-buttons">
				<?php if ( surya_chandra_is_woocommerce_active() ) : ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="custom-button cart-button"><i class="fa fa-cart-plus"></i><?php esc_html_e( 'Cart', 'surya-chandra-lite' ); ?><span><?php echo absint( WC()->cart->get_cart_contents_count() );?></span></a>
				<?php endif; ?>
				<?php
				$quote_button_text = surya_chandra_get_option( 'quote_button_text' );
				$quote_button_url  = surya_chandra_get_option( 'quote_button_url' );
				?>
				<?php if ( ! empty( $quote_button_text ) && ! empty( $quote_button_url ) ) : ?>
					<a href="<?php echo esc_url( $quote_button_url ); ?>" class="custom-button quick-link-button"><?php echo esc_html( $quote_button_text ); ?></a>
				<?php endif; ?>
			</div><!-- #quick-link-buttons -->
		</div><!-- #header-right -->

		<div id="main-navigation">
			<div class="menu-wrapper">
				<button id="menu-toggle" class="menu-toggle" aria-controls="main-menu" aria-expanded="false"><i class="fa fa-bars"></i><i class="fa fa-times" aria-hidden="true"></i><span class="menu-label"><?php esc_html_e( 'Menu', 'surya-chandra-lite' ); ?></span></button>

				<div class="menu-inside-wrapper">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'fallback_cb'    => 'surya_chandra_primary_navigation_fallback',
						) );
						?>
					</nav><!-- #site-navigation -->
					<?php surya_chandra_render_contact_info(); ?>
				</div>
			</div><!-- .menu-wrapper -->
		</div><!-- #main-navigation -->

	</div><!-- .container -->
</header><!-- #masthead -->
