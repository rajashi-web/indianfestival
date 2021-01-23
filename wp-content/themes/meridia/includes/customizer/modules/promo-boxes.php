<?php
/**
 * Customizer Promo Boxes
 *
 * @package Meridia
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* 04 Promo Boxes
*/

// Promo Boxes Show
Kirki::add_field( 'meridia_config', array(
	'type'        => 'toggle',
	'settings'    => 'meridia_promo_show_settings',
	'label'       => esc_html__( 'Enable promo boxes', 'meridia' ),
	'section'     => 'meridia_promo',
	'default'     => true,
) );	

Kirki::add_field( 'meridia_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $meridia_uniqid++,
	'section'     => 'meridia_promo',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Promo box 1', 'meridia' ) . '</h3>',
) );

// Promo Box Image Upload 1
Kirki::add_field( 'meridia_config', array(
	'type'        => 'image',
	'settings'    => 'meridia_promo_image_upload_1',
	'label'       => esc_attr__( 'Promo box 1 image upload', 'meridia' ),
	'description' => esc_attr__( 'Recommended size is 350x260.', 'meridia' ),
	'section'     => 'meridia_promo',
	'default'     => MERIDIA_THEME_URI . '/assets/img/defaults/meridia_promo_1.jpg',
) );

// Promo Box Text Control 1
Kirki::add_field( 'meridia_config', array(
	'type'     => 'text',
	'settings' => 'meridia_promo_text_1',
	'label'    => esc_html__( 'Promo box 1 text', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => esc_attr__( 'Travel Guide', 'meridia' ),
) );

// Promo Box URL Control 1
Kirki::add_field( 'meridia_config', array(
	'type'     => 'url',
	'settings' => 'meridia_promo_url_1',
	'label'    => esc_html__( 'Promo box 1 URL', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => '#',
) );

Kirki::add_field( 'meridia_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $meridia_uniqid++,
	'section'     => 'meridia_promo',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Promo box 2', 'meridia' ) . '</h3>',
) );

// Promo Box Image Upload 2
Kirki::add_field( 'meridia_config', array(
	'type'        => 'image',
	'settings'    => 'meridia_promo_image_upload_2',
	'label'       => esc_attr__( 'Promo box 2 image upload', 'meridia' ),
	'description' => esc_attr__( 'Recommended size is 350x260.', 'meridia' ),
	'section'     => 'meridia_promo',
	'default'     => MERIDIA_THEME_URI . '/assets/img/defaults/meridia_promo_2.jpg',
) );

// Promo Box Text Control 2
Kirki::add_field( 'meridia_config', array(
	'type'     => 'text',
	'settings' => 'meridia_promo_text_2',
	'label'    => esc_html__( 'Promo box 2 text', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => esc_attr__( 'Instagram', 'meridia' ),
) );

// Promo Box URL Control 2
Kirki::add_field( 'meridia_config', array(
	'type'     => 'url',
	'settings' => 'meridia_promo_url_2',
	'label'    => esc_html__( 'Promo box 2 URL', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => '#',
) );

Kirki::add_field( 'meridia_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $meridia_uniqid++,
	'section'     => 'meridia_promo',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Promo Box 3', 'meridia' ) . '</h3>',
) );

// Promo Box Image Upload 3
Kirki::add_field( 'meridia_config', array(
	'type'        => 'image',
	'settings'    => 'meridia_promo_image_upload_3',
	'label'       => esc_attr__( 'Promo box 3 image upload', 'meridia' ),
	'description' => esc_attr__( 'Recommended size is 350x260.', 'meridia' ),
	'section'     => 'meridia_promo',
	'default'     => MERIDIA_THEME_URI . '/assets/img/defaults/meridia_promo_3.jpg',
) );

// Promo Box Text Control 3
Kirki::add_field( 'meridia_config', array(
	'type'     => 'text',
	'settings' => 'meridia_promo_text_3',
	'label'    => esc_html__( 'Promo box 3 text', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => esc_attr__( 'Lifestyle', 'meridia' ),
) );

// Promo Box URL Control 3
Kirki::add_field( 'meridia_config', array(
	'type'     => 'url',
	'settings' => 'meridia_promo_url_3',
	'label'    => esc_html__( 'Promo box 3 URL', 'meridia' ),
	'section'  => 'meridia_promo',
	'default'  => '#',
) );