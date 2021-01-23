<?php

/**
 * Customizer Featured Area
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* 03 Featured Area
*/
// Featured Show
Kirki::add_field( 'meridia_config', array(
    'type'        => 'toggle',
    'settings'    => 'meridia_featured_show_settings',
    'label'       => esc_html__( 'Enable featured area', 'meridia' ),
    'description' => sprintf( esc_html__( 'By default featured area shows your recent posts, however you can select which posts to show using featured post metabox. %sLearn More%s', 'meridia' ), '<a href="https://demo.deothemes.com/wp_docs/meridia/index.html#featured-area-types" target="_blank">', '</a>' ),
    'section'     => 'meridia_featured_area',
    'default'     => 1,
) );
// Featured Area Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_featured_select_settings',
    'label'    => esc_html__( 'Featured area layout', 'meridia' ),
    'section'  => 'meridia_featured_area',
    'default'  => 'hero-slider',
    'choices'  => array(
    'hero-slider' => get_template_directory_uri() . '/assets/img/customizer/classic-slider.png',
),
) );
// Featured Slider Categories
Kirki::add_field( 'meridia_config', array(
    'type'            => 'select',
    'settings'        => 'meridia_featured_slider_categories_settings',
    'label'           => esc_html__( 'Featured category', 'meridia' ),
    'section'         => 'meridia_featured_area',
    'default'         => 0,
    'choices'         => meridia_categories_dropdown(),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-image',
    'operator' => '!=',
) ),
) );
// Featured Slider Posts IDs
Kirki::add_field( 'meridia_config', array(
    'type'            => 'text',
    'settings'        => 'meridia_featured_slider_posts_id_settings',
    'label'           => esc_html__( 'Specific posts by ID', 'meridia' ),
    'description'     => esc_html__( 'Paste posts ID\'s separated by commas. This will overwrite featured category settings.', 'meridia' ),
    'section'         => 'meridia_featured_area',
    'default'         => esc_attr( '' ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-image',
    'operator' => '!=',
) ),
) );
// Featured slider posts per page
Kirki::add_field( 'meridia_config', array(
    'type'            => 'number',
    'settings'        => 'meridia_hero_slider_posts_settings',
    'label'           => esc_html__( 'How many posts to show', 'meridia' ),
    'section'         => 'meridia_featured_area',
    'default'         => 3,
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-image',
    'operator' => '!=',
), array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-carousel',
    'operator' => '!=',
), array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-masonry',
    'operator' => '!=',
) ),
    'choices'         => array(
    'min'  => 0,
    'max'  => 10,
    'step' => 1,
),
) );