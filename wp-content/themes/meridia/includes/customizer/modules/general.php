<?php
/**
 * Customizer General
 *
 * @package Meridia
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* 01 General
*/

// Preloader
Kirki::add_field( 'meridia_config', array(
	'type'        => 'toggle',
	'settings'    => 'meridia_preloader_settings',
	'label'       => esc_html__( 'Enable Theme Preloader', 'meridia' ),
	'section'     => 'meridia_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'meridia_config', array(
	'type'        => 'toggle',
	'settings'    => 'meridia_back_to_top_settings',
	'label'       => esc_html__( 'Back to top arrow', 'meridia' ),
	'section'     => 'meridia_back_to_top',
	'default'     => 1,
) );