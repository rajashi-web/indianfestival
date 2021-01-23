<?php 
/**
 * The template for displaying code in the header section
 *
 * @version    0.0.36
 * @package    pose
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>	
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pose' ); ?></a>



<?php

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
?>
	

<!-- BEGIN BLOG INFO -->
<div class="site-info">
	<div class="mg-auto site-info-flex wid-90 mobwid-90">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-info-name">
			<?php echo bloginfo('name'); ?>
		</a>
		<p class="site-info-desc"><?php echo bloginfo('description'); ?></p>
	</div>
</div>
<!-- END BLOG INFO -->

<!-- BEGIN NAV MENU -->
<div class="flowid nav-outer">
	<div class="mg-auto wid-90 mobwid-90">
		<div class="nav">
			<input type="checkbox" class="navcheck" id="navcheck" />
			<label class="navlabel" for="navcheck" ></label>
			<button class="panbtn" for="navcheck">
				<div></div>
				<div></div>
				<div></div>
			</button>
		    <div class="site-mob-title">
		        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-nav-title"><?php echo bloginfo('name'); ?></a>
		    </div>
			<div class="theme-nav">
				<ul class="logo">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-nav-title"><?php echo bloginfo('name'); ?></a></li>
				</ul>
		        
		        <ul class="nav-wrap">
					<?php 
						if (has_nav_menu('primary-menu')) {
							wp_nav_menu(array(
								'theme_location' => 'primary-menu',
								'menu_class'  => '',
							));
							}else {
							 
							 wp_list_pages( array('depth' => 1, 
								 'title_li' => '')); 
							      
						 } 

					?>
				</ul>
			</div>
		</div>
	</div>	
</div>
<!-- END NAV MENU -->


<?php } ?>	