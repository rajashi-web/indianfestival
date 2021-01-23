<?php

/**
 * Customizer Footer
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* 09 Footer
*/
// Footer columns
Kirki::add_field( 'meridia_config', array(
    'type'     => 'select',
    'settings' => 'meridia_footer_col_settings',
    'label'    => esc_html__( 'How many columns to show', 'meridia' ),
    'section'  => 'meridia_footer',
    'default'  => 'four-col',
    'choices'  => array(
    'one-col'   => esc_attr__( '1 Column', 'meridia' ),
    'two-col'   => esc_attr__( '2 Columns', 'meridia' ),
    'three-col' => esc_attr__( '3 Columns', 'meridia' ),
    'four-col'  => esc_attr__( '4 Columns', 'meridia' ),
),
) );
// Show bottom footer year
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_footer_bottom_year_show',
    'label'    => esc_attr__( 'Show bottom footer year', 'meridia' ),
    'section'  => 'meridia_footer',
    'default'  => true,
) );
// Bottom footer text
Kirki::add_field( 'meridia_config', array(
    'type'              => 'text',
    'settings'          => 'meridia_footer_bottom_text',
    'section'           => 'meridia_footer',
    'label'             => esc_html__( 'Footer bottom text', 'meridia' ),
    'description'       => esc_html__( 'Allowed HTML: a, span, i, em, strong', 'meridia' ),
    'sanitize_callback' => 'meridia_sanitize_html',
    'default'           => sprintf( esc_html__( 'Meridia, Made by %1$sDeoThemes%2$s', 'meridia' ), '<a href="' . esc_url( 'https://deothemes.com' ) . '">', '</a>' ),
) );