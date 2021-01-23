<?php
/**
 * Featured area
 *
 * @package 	Meridia
 * @since 		Meridia 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$meridia_featured_setting = get_theme_mod( 'meridia_featured_select_settings', 'hero-slider' );

// Featured Area
if ( get_theme_mod( 'meridia_featured_show_settings', true ) ) {

	switch ( $meridia_featured_setting ) {
		case 'hero-slider':
			get_template_part( 'template-parts/featured-area/hero-slider' );
			break;

		case 'hero-carousel':
			get_template_part( 'template-parts/featured-area/pro/hero-carousel' );
			break;

		case 'hero-image':
			get_template_part( 'template-parts/featured-area/pro/hero-image' );
			break;

		case 'hero-center-slider':
			get_template_part( 'template-parts/featured-area/pro/hero-center-slider' );
			break;

		case 'hero-masonry':
			get_template_part( 'template-parts/featured-area/pro/hero-masonry' );
			break;
		
		default:
			break;
	}

}
