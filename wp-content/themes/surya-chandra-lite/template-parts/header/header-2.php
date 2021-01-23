<?php
/**
 * Header template
 *
 * @package Surya_Chandra
 */

?>

<header id="masthead" class="site-header">
	<div class="container">

		<?php surya_chandra_render_site_branding(); ?>

		<div id="header-right">
			<a href="#" class="search-icon"><i class="fa fa-search"></i></a>
			<div class="search-box-wrap">
				<div class="container">
					<?php get_search_form(); ?>
				</div><!-- .container -->
			</div><!-- .search-box-wrap -->
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

