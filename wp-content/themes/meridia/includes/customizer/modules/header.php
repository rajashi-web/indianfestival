<?php

/**
 * Customizer Site Identity
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* Logo
/*-------------------------------------------------------*/
// Logo type
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio',
    'settings' => 'meridia_logo_type',
    'label'    => esc_html__( 'Logo type', 'meridia' ),
    'section'  => 'meridia_logo',
    'default'  => 'image',
    'choices'  => array(
    'image' => esc_html__( 'Image', 'meridia' ),
    'text'  => esc_html__( 'Text', 'meridia' ),
),
) );
// Logo text notes
Kirki::add_field( 'meridia_config', array(
    'type'            => 'custom',
    'settings'        => 'separator-' . $meridia_uniqid++,
    'section'         => 'meridia_logo',
    'default'         => '<span class="description customize-control-description">' . esc_html__( 'Set yout site title and tagline in ', 'meridia' ) . '<a href="javascript:wp.customize.section(\'title_tagline\').focus();">' . esc_html__( 'Site Identity', 'meridia' ) . '</a></span>',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'text',
    'operator' => '==',
) ),
) );
// Site title typography
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_logo_site_title_typography',
    'label'           => esc_html__( 'Site title typography', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => array(
    'font-family'    => 'Raleway',
    'font-size'      => '24px',
    'font-weight'    => '600',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
    'color'          => '#ffffff',
),
    'output'          => array( array(
    'element' => '.site-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'text',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Tagline typography
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_tagline_typography',
    'label'           => esc_html__( 'Tagline typography', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => array(
    'font-family'    => 'Libre Baskerville',
    'font-size'      => '13px',
    'font-weight'    => '400',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
    'color'          => '#999999',
),
    'output'          => array( array(
    'element' => '.site-tagline',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'text',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
Kirki::add_field( 'meridia_config', array(
    'type'            => 'custom',
    'settings'        => 'separator-' . $meridia_uniqid++,
    'section'         => 'meridia_logo',
    'default'         => '<h3 class="customizer-title">' . esc_attr__( 'White Logo', 'meridia' ) . '</h3>',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-4',
    'operator' => '!==',
) ),
) );
// Logo Image Upload
Kirki::add_field( 'meridia_config', array(
    'type'            => 'image',
    'settings'        => 'meridia_logo_image_upload',
    'label'           => esc_attr__( 'Upload White Logo', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => MERIDIA_THEME_URI . '/assets/img/logo.png',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-4',
    'operator' => '!==',
) ),
) );
// Logo Retina Image Upload
Kirki::add_field( 'meridia_config', array(
    'type'            => 'image',
    'settings'        => 'meridia_logo_retina_image_upload',
    'label'           => esc_attr__( 'Upload White Retina Logo', 'meridia' ),
    'description'     => esc_html__( 'Logo 2x bigger size', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => MERIDIA_THEME_URI . '/assets/img/logo@2x.png',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-4',
    'operator' => '!==',
) ),
) );
Kirki::add_field( 'meridia_config', array(
    'type'            => 'custom',
    'settings'        => 'separator-' . $meridia_uniqid++,
    'section'         => 'meridia_logo',
    'default'         => '<h3 class="customizer-title">' . esc_attr__( 'Dark Logo', 'meridia' ) . '</h3>',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-1',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-3',
    'operator' => '!==',
) ),
) );
// Logo Dark Image Upload
Kirki::add_field( 'meridia_config', array(
    'type'            => 'image',
    'settings'        => 'meridia_logo_dark_image_upload',
    'label'           => esc_attr__( 'Upload Dark Logo', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => MERIDIA_THEME_URI . '/assets/img/logo_dark.png',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-1',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-3',
    'operator' => '!==',
) ),
) );
// Logo Dark Retina Image Upload
Kirki::add_field( 'meridia_config', array(
    'type'            => 'image',
    'settings'        => 'meridia_logo_dark_retina_image_upload',
    'label'           => esc_attr__( 'Upload Dark Retina Logo', 'meridia' ),
    'description'     => esc_html__( 'Logo 2x bigger size', 'meridia' ),
    'section'         => 'meridia_logo',
    'default'         => MERIDIA_THEME_URI . '/assets/img/logo_dark@2x.png',
    'active_callback' => array( array(
    'setting'  => 'meridia_logo_type',
    'value'    => 'image',
    'operator' => '==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-1',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-3',
    'operator' => '!==',
) ),
) );
// Sticky nav
Kirki::add_field( 'meridia_config', array(
    'type'            => 'toggle',
    'settings'        => 'meridia_sticky_nav_settings',
    'label'           => esc_html__( 'Sticky Navbar', 'meridia' ),
    'section'         => 'meridia_desktop_header',
    'default'         => 1,
    'active_callback' => array( array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '!==',
) ),
) );
// Header navbar height
Kirki::add_field( 'meridia_config', array(
    'type'      => 'slider',
    'settings'  => 'meridia_header_navbar_height',
    'label'     => esc_attr__( 'Navbar height', 'meridia' ),
    'section'   => 'meridia_desktop_header',
    'default'   => 60,
    'choices'   => array(
    'min'  => '40',
    'max'  => '200',
    'step' => '1',
),
    'output'    => array( array(
    'element'     => '.nav:not(.nav--transparent), .nav__flex-parent',
    'property'    => 'height',
    'units'       => 'px',
    'media_query' => $meridia_bp_lg_up,
), array(
    'element'     => '.nav:not(.nav--transparent)',
    'property'    => 'min-height',
    'units'       => 'px',
    'media_query' => $meridia_bp_lg_up,
), array(
    'element'     => '.nav__menu > li > a',
    'property'    => 'line-height',
    'units'       => 'px',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Logo height
Kirki::add_field( 'meridia_config', array(
    'type'            => 'slider',
    'settings'        => 'meridia_header_logo_height',
    'label'           => esc_attr__( 'Header logo height', 'meridia' ),
    'section'         => 'meridia_desktop_header',
    'default'         => 48,
    'choices'         => array(
    'min'  => '10',
    'max'  => '200',
    'step' => '1',
),
    'output'          => array( array(
    'element'  => '.nav__header .logo',
    'property' => 'max-height',
    'units'    => 'px',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '!==',
), array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-4',
    'operator' => '!==',
) ),
    'transport'       => 'auto',
) );
// Menu items horizontal spacing
Kirki::add_field( 'meridia_config', array(
    'type'      => 'slider',
    'settings'  => 'meridia_header_text_links_horizontal_spacing',
    'label'     => esc_attr__( 'Menu text links horizontal spacing', 'meridia' ),
    'section'   => 'meridia_desktop_header',
    'default'   => 13,
    'choices'   => array(
    'min'  => '0',
    'max'  => '60',
    'step' => '1',
),
    'output'    => array( array(
    'element'     => '.nav__menu > li > a',
    'property'    => 'padding-left',
    'units'       => 'px',
    'media_query' => $meridia_bp_lg_up,
), array(
    'element'     => '.nav__menu > li > a',
    'property'    => 'padding-right',
    'units'       => 'px',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Navbar mobile collapse breakpoint
Kirki::add_field( 'meridia_config', array(
    'type'     => 'slider',
    'settings' => 'meridia_header_navbar_mobile_collapse_breakpoint',
    'label'    => esc_attr__( 'Navbar mobile collapse breakpoint', 'meridia' ),
    'section'  => 'meridia_desktop_header',
    'default'  => 992,
    'choices'  => array(
    'min'  => 0,
    'max'  => 4000,
    'step' => 1,
),
) );
// Show nav search
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_nav_search_show',
    'label'    => esc_html__( 'Show navbar search', 'meridia' ),
    'section'  => 'meridia_desktop_header',
    'default'  => 1,
) );