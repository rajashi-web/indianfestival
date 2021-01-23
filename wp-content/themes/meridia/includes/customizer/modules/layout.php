<?php

/**
 * Customizer General
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Homepage Post Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_post_layout_type',
    'label'    => esc_html__( 'Post layout type', 'meridia' ),
    'section'  => 'meridia_homepage_layout',
    'default'  => 'grid',
    'choices'  => array(
    'grid-first-large' => get_template_directory_uri() . '/assets/img/customizer/grid-first-large.png',
    'grid'             => get_template_directory_uri() . '/assets/img/customizer/grid.png',
    'list'             => get_template_directory_uri() . '/assets/img/customizer/list.png',
),
) );
// Homepage Content Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_homepage_layout_type',
    'label'    => esc_html__( 'Content layout', 'meridia' ),
    'section'  => 'meridia_homepage_layout',
    'default'  => 'right-sidebar',
    'choices'  => array(
    'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
    'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
    'fullwidth'     => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
),
) );
// Homepage columns
Kirki::add_field( 'meridia_config', array(
    'type'            => 'select',
    'settings'        => 'meridia_homepage_columns',
    'label'           => esc_html__( 'Grid columns', 'meridia' ),
    'section'         => 'meridia_homepage_layout',
    'default'         => 'col-lg-6',
    'choices'         => array(
    'col-lg-12' => esc_attr__( '1 Column', 'meridia' ),
    'col-lg-6'  => esc_attr__( '2 Columns', 'meridia' ),
    'col-lg-4'  => esc_attr__( '3 Columns', 'meridia' ),
    'col-lg-3'  => esc_attr__( '4 Columns', 'meridia' ),
),
    'active_callback' => array( array(
    'setting'  => 'meridia_post_layout_type',
    'value'    => 'list',
    'operator' => '!=',
), array(
    'setting'  => 'meridia_post_layout_type',
    'value'    => 'horizontal-cards',
    'operator' => '!=',
) ),
) );
// Single Post Style
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_single_post_style',
    'label'    => esc_html__( 'Post layout', 'meridia' ),
    'section'  => 'meridia_single_post_layout',
    'default'  => 'single-post-style-1',
    'choices'  => array(
    'single-post-style-1' => get_template_directory_uri() . '/assets/img/customizer/single-post-style-1.png',
    'single-post-style-2' => get_template_directory_uri() . '/assets/img/customizer/single-post-style-2.png',
),
) );
// Single Post Content Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_single_post_layout_type',
    'label'    => esc_html__( 'Content layout', 'meridia' ),
    'section'  => 'meridia_single_post_layout',
    'default'  => 'right-sidebar',
    'choices'  => array(
    'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
    'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
    'fullwidth'     => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
),
) );
// Archives Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_archives_layout_type',
    'label'    => esc_html__( 'Page content layout', 'meridia' ),
    'section'  => 'meridia_archives_layout',
    'default'  => 'fullwidth',
    'choices'  => array(
    'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
    'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
    'fullwidth'     => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
),
) );
// Archives columns
Kirki::add_field( 'meridia_config', array(
    'type'        => 'select',
    'settings'    => 'meridia_archives_columns',
    'label'       => esc_html__( 'Columns', 'meridia' ),
    'description' => esc_html__( 'Will apply on grid layout type', 'meridia' ),
    'section'     => 'meridia_archives_layout',
    'default'     => 'col-lg-4',
    'choices'     => array(
    'col-lg-12' => esc_attr__( '1 Column', 'meridia' ),
    'col-lg-6'  => esc_attr__( '2 Columns', 'meridia' ),
    'col-lg-4'  => esc_attr__( '3 Columns', 'meridia' ),
    'col-lg-3'  => esc_attr__( '4 Columns', 'meridia' ),
),
) );
// Page Layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_page_layout_type',
    'label'    => esc_html__( 'Page content layout', 'meridia' ),
    'section'  => 'meridia_page_layout',
    'default'  => 'fullwidth',
    'choices'  => array(
    'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
    'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
    'fullwidth'     => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
),
) );
// Page title layout
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio-image',
    'settings' => 'meridia_page_title_layout_type',
    'label'    => esc_html__( 'Page title layout', 'meridia' ),
    'section'  => 'meridia_page_title_layout',
    'default'  => 'page-title-style-1',
    'choices'  => array(
    'page-title-style-1' => get_template_directory_uri() . '/assets/img/customizer/page-title-style-1.png',
    'page-title-style-2' => get_template_directory_uri() . '/assets/img/customizer/page-title-style-2.png',
),
) );
Kirki::add_field( 'meridia_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $meridia_uniqid++,
    'section'  => 'meridia_page_title_layout',
    'default'  => '<h3 class="customizer-title">' . esc_attr__( 'Shop page title background image', 'meridia' ) . '</h3>',
) );
// Shop page title image upload
Kirki::add_field( 'meridia_config', array(
    'type'        => 'image',
    'settings'    => 'meridia_shop_page_title_image_upload',
    'label'       => esc_attr__( 'Upload page title image', 'meridia' ),
    'description' => esc_attr__( 'Background image for shop pages. Recommended size is 1366x1000.', 'meridia' ),
    'section'     => 'meridia_page_title_layout',
    'default'     => MERIDIA_THEME_URI . '/assets/img/defaults/meridia_shop_page_title-min.jpg',
) );