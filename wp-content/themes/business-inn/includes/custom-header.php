<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Business_Inn
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses business_inn_header_style()
 */

function business_inn_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'business_inn_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 410,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'business_inn_custom_header_setup' );
