<?php

/**
 * Customizer Typography
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* General Typography
/*-------------------------------------------------------*/
// Headings Typography
Kirki::add_field( 'meridia_config', array(
    'type'        => 'typography',
    'settings'    => 'meridia_headings_typography_settings',
    'label'       => esc_html__( 'Headings', 'meridia' ),
    'description' => esc_html__( 'This option affects all the headings on your website.', 'meridia' ),
    'section'     => 'meridia_general_typography',
    'default'     => array(
    'font-family'    => 'Raleway',
    'font-weight'    => '600',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'choices'     => array(
    'variant' => array( 'regular', '600' ),
),
    'output'      => array(
    array(
    'element' => 'h1,h2,h3,h4,h5,h6, .wprm-recipe.wprm-recipe-template-meridia .wprm-recipe-name, .wprm-recipe.wprm-recipe-template-meridia .wprm-recipe-header',
),
    array(
    'element' => ( isset( $meridia_selectors['shop_headings'] ) ? $meridia_selectors['shop_headings'] : NULL ),
),
    array(
    'element' => $meridia_selectors['editor_headings'],
    'context' => array( 'editor' ),
),
    array(
    'element' => '.wprm-recipe.wprm-recipe-template-meridia .wprm-recipe-name, .wprm-recipe.wprm-recipe-template-meridia .wprm-recipe-header',
    'context' => array( 'editor' ),
)
),
    'transport'   => 'auto',
) );
// Body typography
Kirki::add_field( 'meridia_config', array(
    'type'        => 'typography',
    'settings'    => 'meridia_body_text_typography_settings',
    'label'       => esc_html__( 'Body text', 'meridia' ),
    'description' => esc_html__( 'This option affects the main body font. It does not affect single post fonts', 'meridia' ),
    'section'     => 'meridia_general_typography',
    'default'     => array(
    'font-family'    => 'Open Sans',
    'font-size'      => '15px',
    'variant'        => 'regular',
    'line-height'    => '1.5',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'choices'     => array(
    'variant' => array( '700', 'italic' ),
),
    'output'      => array( array(
    'element' => $meridia_selectors['text'],
), array(
    'element' => '.edit-post-visual-editor.editor-styles-wrapper',
    'context' => array( 'editor' ),
) ),
    'transport'   => 'auto',
) );
// Buttons Typography
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_buttons_typography_settings',
    'label'     => esc_html__( 'Buttons', 'meridia' ),
    'section'   => 'meridia_general_typography',
    'default'   => array(
    'font-family'    => 'Raleway',
    'font-weight'    => '400',
    'line-height'    => '1.5',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'choices'   => array(
    'variant' => array( 'regular', '600' ),
),
    'output'    => array( array(
    'element' => $meridia_selectors['buttons'],
), array(
    'element' => '.wp-block-button .wp-block-button__link',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Form labels typography
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_form_labels_typography_settings',
    'label'     => esc_html__( 'Form labels', 'meridia' ),
    'section'   => 'meridia_general_typography',
    'default'   => array(
    'font-family'    => 'Raleway',
    'font-size'      => '14px',
    'font-weight'    => '600',
    'letter-spacing' => 'none',
    'text-transform' => 'normal',
),
    'choices'   => array(
    'variant' => array( 'regular', '600' ),
),
    'output'    => array( array(
    'element' => 'label',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Header Typography
/*-------------------------------------------------------*/
// Menu links typography
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_menu_links_typography_settings',
    'label'     => esc_html__( 'Menu links', 'meridia' ),
    'section'   => 'meridia_header_typography',
    'default'   => array(
    'font-family'    => 'Raleway',
    'font-size'      => '11px',
    'font-weight'    => '600',
    'letter-spacing' => '0.15em',
    'text-transform' => 'uppercase',
),
    'choices'   => array(
    'variant' => array( 'regular', '600' ),
),
    'output'    => array( array(
    'element' => '.nav__menu > li > a',
) ),
    'transport' => 'auto',
) );
// Menu dropdown links typography
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_menu_dropdown_links_typography_settings',
    'label'     => esc_html__( 'Menu dropdown links', 'meridia' ),
    'section'   => 'meridia_header_typography',
    'default'   => array(
    'font-family'    => 'Raleway',
    'font-size'      => '11px',
    'font-weight'    => 'regular',
    'letter-spacing' => '0.05em',
    'text-transform' => 'uppercase',
),
    'choices'   => array(
    'variant' => array( 'regular', '600' ),
),
    'output'    => array( array(
    'element' => '.nav__dropdown-menu > li > a',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Single Post Typography
/*-------------------------------------------------------*/
// Single Post Title
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_title',
    'label'     => esc_html__( 'Post title', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '34px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'    => array( array(
    'element' => '.single-post__entry-title',
), array(
    'element' => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H1
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h1',
    'label'     => esc_html__( 'H1 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '34px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h1',
), array(
    'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H2
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h2',
    'label'     => esc_html__( 'H2 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '32px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h2',
), array(
    'element' => '.edit-post-visual-editor h2.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H3
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h3',
    'label'     => esc_html__( 'H3 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '28px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h3',
), array(
    'element' => '.edit-post-visual-editor h3.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H4
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h4',
    'label'     => esc_html__( 'H4 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '24px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h4',
), array(
    'element' => '.edit-post-visual-editor h4.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H5
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h5',
    'label'     => esc_html__( 'H5 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '20px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h5',
), array(
    'element' => '.edit-post-visual-editor h5.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post H6
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_headings_h6',
    'label'     => esc_html__( 'H6 headings', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '18px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry__article h6',
), array(
    'element' => '.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post Body Text
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_body_typography',
    'label'     => esc_html__( 'Body text', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-size'      => '17px',
    'variant'        => 'regular',
    'line-height'    => '1.7',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'choices'   => array(
    'variant' => array( '700', 'italic' ),
),
    'output'    => array( array(
    'element' => '.entry__article',
), array(
    'element' => '.edit-post-visual-editor.editor-styles-wrapper',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Single Post Blockquote / Pullquote
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_single_post_blockquote_typography',
    'label'     => esc_html__( 'Blockquote / Pullquote', 'meridia' ),
    'section'   => 'meridia_single_post_typography',
    'default'   => array(
    'font-family'    => 'Libre Baskerville',
    'variant'        => 'italic',
    'font-size'      => '20px',
    'line-height'    => '1.6',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.wp-block-pullquote p, .wp-block-quote p',
), array(
    'element' => '.edit-post-visual-editor .wp-block-quote p,
			.edit-post-visual-editor .wp-block-pullquote p',
    'context' => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Featured Area Typography
/*-------------------------------------------------------*/
// Classic Slider Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_classic_slider_posts_headings',
    'label'           => esc_html__( 'Classic slider posts headings', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '36px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'          => array( array(
    'element' => '.hero-slider__entry-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-slider',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Carousel Posts Section Title
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_carousel_posts_section_title',
    'label'           => esc_html__( 'Carousel section title', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '15px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'          => array( array(
    'element' => '.hero-carousel__heading',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-carousel',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Carousel Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_carousel_posts_headings',
    'label'           => esc_html__( 'Carousel posts headings', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '18px',
    'line-height'    => '1.2',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'          => array( array(
    'element' => '.hero-carousel__entry-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-carousel',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Carousel Posts Categories
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_carousel_posts_categories',
    'label'           => esc_html__( 'Carousel posts categories', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '10px',
    'line-height'    => '1.5',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'          => array( array(
    'element' => '.hero-carousel .entry-category',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-carousel',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Hero Image Heading
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_image_heading',
    'label'           => esc_html__( 'Hero image heading', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '34px',
    'line-height'    => '1.3',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'          => array( array(
    'element' => '.hero-img__title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-image',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Hero Center Slider Headings
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_center_slider_headings',
    'label'           => esc_html__( 'Center slider headings', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '28px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'          => array( array(
    'element' => '.hero-center-slider__entry-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-center-slider',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Hero Masonry Small Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_masonry_small_posts_headings',
    'label'           => esc_html__( 'Masonry small posts headings', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '18px',
    'line-height'    => '1.2',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'          => array( array(
    'element' => '.hero-masonry__small-column .hero-masonry__entry-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-masonry',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
// Hero Masonry Large Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'            => 'typography',
    'settings'        => 'meridia_hero_masonry_large_posts_headings',
    'label'           => esc_html__( 'Masonry large posts headings', 'meridia' ),
    'section'         => 'meridia_featured_area_typography',
    'default'         => array(
    'font-size'      => '26px',
    'line-height'    => '1.2',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'          => array( array(
    'element' => 'hero-masonry__large-column .hero-masonry__entry-title',
) ),
    'active_callback' => array( array(
    'setting'  => 'meridia_featured_select_settings',
    'value'    => 'hero-masonry',
    'operator' => '==',
) ),
    'transport'       => 'auto',
) );
/*-------------------------------------------------------*/
/* Posts Typography
/*-------------------------------------------------------*/
// Small Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'        => 'typography',
    'settings'    => 'meridia_small_posts_headings',
    'label'       => esc_html__( 'Small posts headings', 'meridia' ),
    'description' => esc_html__( 'Grid / List small posts headings.', 'meridia' ),
    'section'     => 'meridia_posts_typography',
    'default'     => array(
    'font-size'      => '18px',
    'line-height'    => '1.2',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'      => array( array(
    'element' => '.entry-title',
) ),
    'transport'   => 'auto',
) );
// Large Posts Headings
Kirki::add_field( 'meridia_config', array(
    'type'        => 'typography',
    'settings'    => 'meridia_large_posts_headings',
    'label'       => esc_html__( 'Large posts headings', 'meridia' ),
    'description' => esc_html__( 'Grid / List large posts headings.', 'meridia' ),
    'section'     => 'meridia_posts_typography',
    'default'     => array(
    'font-size'      => '23px',
    'line-height'    => '1.2',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'      => array( array(
    'element' => '.large-post .entry-title',
) ),
    'transport'   => 'auto',
) );
// Posts Meta
Kirki::add_field( 'meridia_config', array(
    'type'        => 'typography',
    'settings'    => 'meridia_meta_typography_settings',
    'label'       => esc_html__( 'Posts meta', 'meridia' ),
    'description' => esc_html__( 'Date, comments meta.', 'meridia' ),
    'section'     => 'meridia_posts_typography',
    'default'     => array(
    'font-family'    => 'Libre Baskerville',
    'variant'        => 'italic',
    'font-size'      => '11px',
    'line-height'    => '30px',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'      => array( array(
    'element' => $meridia_selectors['meta'],
) ),
    'transport'   => 'auto',
) );
// Posts Meta Categories
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_meta_category_typography_settings',
    'label'     => esc_html__( 'Posts categories', 'meridia' ),
    'section'   => 'meridia_posts_typography',
    'default'   => array(
    'font-family'    => 'Libre Baskerville',
    'variant'        => 'italic',
    'font-size'      => '13px',
    'line-height'    => '1.5',
    'letter-spacing' => 'normal',
    'text-transform' => 'none',
),
    'output'    => array( array(
    'element' => '.entry-category',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Widgets Typography
/*-------------------------------------------------------*/
// Widget headings
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_widgets_headings_typography_settings',
    'label'     => esc_html__( 'Widget headings', 'meridia' ),
    'section'   => 'meridia_widgets_typography',
    'default'   => array(
    'font-size'      => '11px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'    => array( array(
    'element' => '.widget-title',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Misc Typography
/*-------------------------------------------------------*/
// Page Title
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_page_title_typography',
    'label'     => esc_html__( 'Page title', 'meridia' ),
    'section'   => 'meridia_misc_typography',
    'default'   => array(
    'font-size'      => '34px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'    => array( array(
    'element' => '.page-title__title, .page-heading, .page-title-style-2__title',
) ),
    'transport' => 'auto',
) );
// Newsletter area widget form title
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_newsletter_title_below_featured_area_typography_settings',
    'label'     => esc_html__( 'Newsletter title below featured area', 'meridia' ),
    'section'   => 'meridia_misc_typography',
    'default'   => array(
    'font-size'      => '16px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'    => array( array(
    'element' => '.newsletter-area .meridia-mc4wp-form-widget__title',
) ),
    'transport' => 'auto',
) );
// Promo boxes title
Kirki::add_field( 'meridia_config', array(
    'type'      => 'typography',
    'settings'  => 'meridia_promo_boxes_title_typography_settings',
    'label'     => esc_html__( 'Promo boxes title', 'meridia' ),
    'section'   => 'meridia_misc_typography',
    'default'   => array(
    'font-size'      => '16px',
    'line-height'    => '1.3',
    'letter-spacing' => '0.1em',
    'text-transform' => 'uppercase',
),
    'output'    => array( array(
    'element' => '.promo-box__text',
) ),
    'transport' => 'auto',
) );