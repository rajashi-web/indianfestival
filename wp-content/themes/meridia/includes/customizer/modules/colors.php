<?php

/**
 * Customizer Colors
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/
// Main color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_color_settings',
    'label'     => esc_html__( 'Main accent color', 'meridia' ),
    'section'   => 'meridia_general_colors',
    'default'   => '#c0945c',
    'output'    => array(
    array(
    'element'  => $meridia_selectors['main_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $meridia_selectors['shop_main_color'] ) ? $meridia_selectors['shop_main_color'] : NULL ),
    'property' => 'color',
),
    array(
    'element'  => '.wprm-recipe .wprm-color-accent.wprm-recipe-print-wide-button',
    'property' => 'background-color',
    'suffix'   => '!important',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => '.wprm-recipe .wprm-color-accent.wprm-recipe-print-wide-button',
    'property' => 'border-color',
    'suffix'   => '!important',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => '.wprm-recipe-rating .wprm-rating-star.wprm-rating-star-full svg *',
    'property' => 'fill',
    'suffix'   => '!important',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => '.wprm-recipe-rating .wprm-rating-star.wprm-rating-star-full svg *',
    'property' => 'stroke',
    'suffix'   => '!important',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => $meridia_selectors['main_background_color'],
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $meridia_selectors['shop_main_background_color'] ) ? $meridia_selectors['shop_main_background_color'] : NULL ),
    'property' => 'background-color',
),
    array(
    'element'  => $meridia_selectors['main_border_color'],
    'property' => 'border-color',
),
    array(
    'element'  => ( isset( $meridia_selectors['shop_main_border_color'] ) ? $meridia_selectors['shop_main_border_color'] : NULL ),
    'property' => 'border-color',
),
    array(
    'element'  => '.edit-post-visual-editor a, .editor-rich-text__tinymce a',
    'property' => 'color',
    'context'  => array( 'editor' ),
)
),
    'transport' => 'auto',
) );
// Buttons hover color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_buttons_hover_color_settings',
    'label'     => esc_html__( 'Buttons hover color', 'meridia' ),
    'section'   => 'meridia_general_colors',
    'default'   => '#171717',
    'output'    => array( array(
    'element'  => $meridia_selectors['buttons_hover_color'],
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Background
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_background_color_settings',
    'label'     => esc_html__( 'Background color', 'meridia' ),
    'section'   => 'meridia_general_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => 'body',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page container background
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_page_container_background_color_settings',
    'label'     => esc_html__( 'Page container background color', 'meridia' ),
    'section'   => 'meridia_general_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.container-holder',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Slider background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_slider_background_color_settings',
    'label'     => esc_html__( 'Slider background color', 'meridia' ),
    'section'   => 'meridia_general_colors',
    'default'   => '#fcf3ec',
    'output'    => array( array(
    'element'  => $meridia_selectors['slider_background_color'],
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Header Colors
/*-------------------------------------------------------*/
// Navbar background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_background_color',
    'label'     => esc_html__( 'Navbar background color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#000000',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.nav:not(.nav--transparent), .nav--transparent.sticky',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Logo area background color
Kirki::add_field( 'meridia_config', array(
    'type'            => 'color',
    'settings'        => 'meridia_logo_area_background_color',
    'label'           => esc_html__( 'Logo area background color', 'meridia' ),
    'section'         => 'meridia_header_colors',
    'default'         => '#ffffff',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.header-2-logo-wrap',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Header dividers color
Kirki::add_field( 'meridia_config', array(
    'type'            => 'color',
    'settings'        => 'meridia_header_dividers_color',
    'label'           => esc_html__( 'Header dividers color', 'meridia' ),
    'section'         => 'meridia_header_colors',
    'default'         => '#eaeaea',
    'output'          => array(
    array(
    'element'       => '.nav--white .nav__wrap',
    'value_pattern' => '1px solid $;',
    'property'      => 'border-top',
    'media_query'   => $meridia_bp_lg_up,
),
    array(
    'element'       => '.nav--white .nav__wrap',
    'value_pattern' => '1px solid $;',
    'property'      => 'border-bottom',
    'media_query'   => $meridia_bp_lg_up,
),
    array(
    'element'       => '.nav-2',
    'value_pattern' => '1px solid $;',
    'property'      => 'border-top',
    'media_query'   => $meridia_bp_lg_down,
),
    array(
    'element'       => '.nav-2',
    'value_pattern' => '1px solid $;',
    'property'      => 'border-bottom',
    'media_query'   => $meridia_bp_lg_down,
)
),
    'active_callback' => array( array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Header links / icons color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_text_color',
    'label'     => esc_html__( 'Header links / icons color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.nav__menu > li > a,
				.nav--white .nav__menu > li > a,
				.nav__search-trigger,
				.nav__search--1 .nav__search-trigger,
				.nav__socials .social',
    'property'    => 'color',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Header active / hover text color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_text_active_color',
    'label'     => esc_html__( 'Header active / hover link color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#c0945c',
    'output'    => array( array(
    'element'  => '.nav__menu > .active > a,
				.nav__menu > .current_page_parent > a,
				.nav__menu .current-menu-item > a,
				.nav__menu > li > a:hover,
				.nav__search-trigger:hover,
				.nav__search--1 .nav__search-trigger:hover,
				.nav__socials .social:hover,
				.nav__socials-mobile .social:hover,
				.nav--white .nav__menu > .active > a,
				.nav--white .nav__menu > li > a:hover',
    'property' => 'color',
), array(
    'element'  => '.nav__icon-toggle:focus .nav__icon-toggle-bar, .nav__icon-toggle:hover .nav__icon-toggle-bar',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Header dropdown background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_dropdown_background_color',
    'label'     => esc_html__( 'Menu dropdown background color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'     => '.nav__dropdown-menu',
    'property'    => 'background-color',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Header dropdown dividers color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_dropdown_dividers_color',
    'label'     => esc_html__( 'Menu dropdown dividers color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#363636',
    'output'    => array( array(
    'element'     => '.nav__dropdown-menu > li > a',
    'property'    => 'border-top-color',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Header dropdown links color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_dropdown_text_color',
    'label'     => esc_html__( 'Menu dropdown links color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.nav__dropdown-menu > li > a',
    'property'    => 'color',
    'media_query' => $meridia_bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Header dropdown links hover color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_dropdown_text_hover_color',
    'label'     => esc_html__( 'Menu dropdown links hover color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#c0945c',
    'output'    => array( array(
    'element'  => '.nav__dropdown-menu > li > a:hover',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
Kirki::add_field( 'meridia_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $meridia_uniqid++,
    'section'  => 'meridia_header_colors',
    'default'  => '<h3 class="customizer-title">' . esc_attr__( 'Mobile header', 'meridia' ) . '</h3>',
) );
// Navbar mobile background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_background_color',
    'label'     => esc_html__( 'Navbar mobile background color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'     => '.nav:not(.nav--transparent)',
    'property'    => 'background-color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Logo area mobile background color
Kirki::add_field( 'meridia_config', array(
    'type'            => 'color',
    'settings'        => 'meridia_logo_area_mobile_background_color',
    'label'           => esc_html__( 'Logo area mobile background color', 'meridia' ),
    'section'         => 'meridia_header_colors',
    'default'         => '#ffffff',
    'output'          => array( array(
    'element'     => '.header-2-logo-wrap',
    'property'    => 'background-color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_header_type',
    'value'    => 'header-type-2',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Header mobile socials color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_socials_color',
    'label'     => esc_html__( 'Header mobile socials color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.nav__socials-mobile .social',
    'property'    => 'color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Header mobile menu links color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_menu_links_color',
    'label'     => esc_html__( 'Header mobile menu links color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.nav__menu li a',
    'property'    => 'color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Header mobile dropdown arrow color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_dropdown_arrow_color',
    'label'     => esc_html__( 'Header mobile dropdown arrow color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#999999',
    'output'    => array( array(
    'element'     => '.nav__dropdown-trigger',
    'property'    => 'color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Header mobile dividers color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_dividers_color',
    'label'     => esc_html__( 'Header mobile dividers color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#363636',
    'output'    => array( array(
    'element'     => '.nav__menu li a',
    'property'    => 'border-bottom-color',
    'media_query' => $meridia_bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Header mobile search color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_search_color',
    'label'     => esc_html__( 'Header mobile search color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array(
    array(
    'element'  => '.nav__search-mobile .search-input::-webkit-input-placeholder, .nav__search-mobile .search-input',
    'property' => 'color',
),
    array(
    'element'  => '.nav__search-mobile .search-input:-moz-placeholder, .nav__search-mobile .search-input::-moz-placeholder',
    'property' => 'color',
),
    array(
    'element'  => '.nav__search-mobile .search-input:-ms-input-placeholder',
    'property' => 'color',
),
    array(
    'element'  => '.nav__search-mobile .search-button',
    'property' => 'color',
)
),
    'transport' => 'auto',
) );
// Header mobile toggle color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_header_mobile_toggle_color',
    'label'     => esc_html__( 'Header mobile toggle color', 'meridia' ),
    'section'   => 'meridia_header_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => '.nav__icon-toggle-bar',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Text Colors
/*-------------------------------------------------------*/
// Headings color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_headings_color_settings',
    'label'     => esc_html__( 'Headings color', 'meridia' ),
    'section'   => 'meridia_text_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'  => $meridia_selectors['headings_color'],
    'property' => 'color',
), array(
    'element'  => ( isset( $meridia_selectors['shop_headings_color'] ) ? $meridia_selectors['shop_headings_color'] : NULL ),
    'property' => 'color',
), array(
    'element'  => $meridia_selectors['editor_headings'],
    'property' => 'color',
    'context'  => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Text color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_text_color_settings',
    'label'     => esc_html__( 'Text color', 'meridia' ),
    'section'   => 'meridia_text_colors',
    'default'   => '#343434',
    'output'    => array( array(
    'element'  => $meridia_selectors['text_color'],
    'property' => 'color',
), array(
    'element'  => '.editor-styles-wrapper.edit-post-visual-editor',
    'property' => 'color',
    'context'  => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Meta color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_meta_color_settings',
    'label'     => esc_html__( 'Meta color', 'meridia' ),
    'section'   => 'meridia_text_colors',
    'default'   => '#999999',
    'output'    => array( array(
    'element'  => $meridia_selectors['meta_color'],
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Footer Colors
/*-------------------------------------------------------*/
// Footer background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_background_color',
    'label'     => esc_html__( 'Footer background color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => '.footer',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Footer dividers color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_dividers_color',
    'label'     => esc_html__( 'Footer dividers color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#eaeaea',
    'output'    => array( array(
    'element'  => $meridia_selectors['footer_dividers_color'],
    'property' => 'border-color',
) ),
    'transport' => 'auto',
) );
// Footer widget title color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_widget_title_color',
    'label'     => esc_html__( 'Footer widget title color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'  => '.footer__widgets .widget-title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Footer links color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_links_color',
    'label'     => esc_html__( 'Footer links color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#343434',
    'output'    => array( array(
    'element'  => $meridia_selectors['footer_links_color'],
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Footer bottom background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_bottom_background_color',
    'label'     => esc_html__( 'Footer bottom background color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'  => '.footer-bottom',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Footer bottom text color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_footer_bottom_copyright_text_color',
    'label'     => esc_html__( 'Footer copyright text color', 'meridia' ),
    'section'   => 'meridia_footer_colors',
    'default'   => '#999999',
    'output'    => array( array(
    'element'  => '.copyright',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Misc Colors
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_page_title_base_color',
    'label'     => esc_html__( 'Page title background color', 'meridia' ),
    'section'   => 'meridia_misc_colors',
    'default'   => '#f8f8f8',
    'output'    => array( array(
    'element'  => '.page-title',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page title overlay opacity
Kirki::add_field( 'meridia_config', array(
    'type'        => 'color',
    'settings'    => 'meridia_page_title_style_2_overlay_opacity',
    'label'       => esc_html__( 'Page title overlay color', 'meridia' ),
    'description' => esc_html__( 'Overlay color for page title style 2, applies to single posts as well', 'meridia' ),
    'section'     => 'meridia_misc_colors',
    'default'     => 'rgba(0, 0, 0, 0.15)',
    'choices'     => array(
    'alpha' => true,
),
    'output'      => array( array(
    'element'  => '.page-title-style-2::after, .blog-featured-img::after',
    'property' => 'background-color',
) ),
    'transport'   => 'auto',
) );
// Page title heading color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_page_title_heading_color',
    'label'     => esc_html__( 'Page title heading color', 'meridia' ),
    'section'   => 'meridia_misc_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'  => '.page-title__title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Newsletter form base color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_newsletter_form_base_color',
    'label'     => esc_html__( 'Newsletter form base color', 'meridia' ),
    'section'   => 'meridia_misc_colors',
    'default'   => '#f9f7f4',
    'output'    => array( array(
    'element'  => '.newsletter-area .meridia-mc4wp-form-widget, .sidebar .meridia-mc4wp-form-widget',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Promo boxes text base color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_promo_boxes_text_base_color',
    'label'     => esc_html__( 'Promo boxes text base color', 'meridia' ),
    'section'   => 'meridia_misc_colors',
    'default'   => '#ffffff',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.promo-box__text',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Promo boxes text color
Kirki::add_field( 'meridia_config', array(
    'type'      => 'color',
    'settings'  => 'meridia_promo_boxes_text_color',
    'label'     => esc_html__( 'Promo boxes text color', 'meridia' ),
    'section'   => 'meridia_misc_colors',
    'default'   => '#000000',
    'output'    => array( array(
    'element'  => '.promo-box__text',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );