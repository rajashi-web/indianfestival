<?php

/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Meridia
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
function meridia_customize_register( $wp_customize )
{
    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background Styles', 'meridia' );
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    // Remove Custom Header Section
    $wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'meridia_customize_register' );
// Check if Kirki is installed

if ( class_exists( 'Kirki' ) ) {
    // Selector Vars
    $meridia_selectors = array(
        'main_color'              => 'a,
			a:focus,
			.loader,
			.socials a:hover,
			.entry-navigation a:hover,
			.owl-next:hover i,
			.owl-prev:hover i,
			.socials--nobase a:hover,
			.entry-category,
			.entry-title:hover a,
			.hero-carousel__entry-title:hover a,
			.entry-meta li a:hover,
			.instagram-feed > p a:hover,
			.search-close:hover i,
			.search-close:focus i,
			.related-posts__entry-title a:hover,
			.comment-edit-link,
			.widget-popular-posts__entry-title a:hover,
			.widget_recent_entries a:hover,
			.footer .widget_recent_entries a:hover,
			.widget_recent_comments a:hover,
			.footer .widget_recent_comments a:hover,
			.widget_nav_menu a:hover,
			.footer .widget_nav_menu a:hover,
			.widget_archive a:hover,
			.footer .widget_archive a:hover,
			.widget_pages a:hover,
			.footer .widget_pages a:hover,
			.widget_categories a:hover,
			.footer .widget_categories a:hover,
			.widget_meta a:hover,
			.footer .widget_meta a:hover,
			.widget_rss .rsswidget:hover,
			.footer .widget_rss .rsswidget:hover,
			.search-wrap .search-button:hover,
			.search-close:hover i,
			.search-close:focus i
			',
        'main_background_color'   => '.btn-color,
			.pagination a:hover,
			.nav__icon-toggle:focus .nav__icon-toggle-bar,
			.nav__icon-toggle:hover .nav__icon-toggle-bar,
			.comment-author__post-author-label,
			#back-to-top:hover',
        'main_border_color'       => 'input:focus, textarea:focus, blockquote, .search-wrap .search-input, .search-wrap .search-input:focus',
        'slider_background_color' => '.hero-slider:before',
        'headings_color'          => 'h1,h2,h3,h4,h5,h6',
        'buttons'                 => 'input[type="button"],
			input[type="reset"],
			input[type="submit"],
			button,		
			.btn,
			.button,
			.wp-block-button .wp-block-button__link,
			a.cc-btn.cc-dismiss',
        'buttons_hover_color'     => 'input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:hover,
			button:focus,			
			.btn:hover,
			.btn:focus,
			.button:hover,
			.button:focus,
			.wp-block-button .wp-block-button__link:active,
			.wp-block-button .wp-block-button__link:focus,
			.wp-block-button .wp-block-button__link:hover',
        'text_color'              => 'body',
        'meta_color'              => '.entry-meta li, .entry-share span, .comment-date, .gallery-caption, .widget_recent_entries .post-date',
        'h1'                      => 'h1',
        'h2'                      => 'h2',
        'h3'                      => 'h3',
        'h4'                      => 'h4',
        'h5'                      => 'h5',
        'h6'                      => 'h6',
        'text'                    => 'body, .widget-popular-posts__entry-title',
        'editor_headings'         => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
        'meta'                    => '.entry-meta li, .entry-share span, .comment-date, .widget_recent_entries .post-date',
        'footer_links_color'      => '.footer__widgets a,
			.footer #wp-calendar caption,
			.footer #wp-calendar a,
			.footer .widget_recent_entries a,
			.footer .widget_rss .rsswidget,
			.footer .widget_recent_comments a,
			.footer .widget_nav_menu a,
			.footer .widget_archive a,
			.footer .widget_pages a,
			.footer .widget_categories a,
			.footer .widget_meta a,
			.footer .deo-newsletter-gdpr-checkbox__label,
			.footer__socials .social',
        'footer_dividers_color'   => '.footer .widget_recent_entries li,
			.footer .widget-popular-posts__list > li,
			.footer .recentcomments,
			.footer .widget_nav_menu li,
			.footer .widget_pages li,
			.footer .widget_categories li,
			.footer .widget_meta li,
			.footer__socials',
    );
    $meridia_mobile_breakpoint = meridia_get_mobile_breakpoint();
    $meridia_bp_lg_up = '@media (min-width:' . strval( $meridia_mobile_breakpoint['lg_up'] ) . 'px)';
    $meridia_bp_lg_down = '@media (max-width:' . strval( $meridia_mobile_breakpoint['lg_down'] ) . 'px)';
    // Kirki
    Kirki::add_config( 'meridia_config', array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
        'option_name' => 'meridia_config',
    ) );
    /**
     * SECTIONS / PANELS
     **/
    $meridia_priority = 20;
    $meridia_uniqid = 1;
    // 01 GENERAL PANEL
    Kirki::add_panel( 'meridia_general', array(
        'title'    => esc_attr__( 'General', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // Preloader
    Kirki::add_section( 'meridia_preloader', array(
        'title' => esc_html__( 'Preloader', 'meridia' ),
        'panel' => 'meridia_general',
    ) );
    // Back to Top
    Kirki::add_section( 'meridia_back_to_top', array(
        'title' => esc_html__( 'Back to Top', 'meridia' ),
        'panel' => 'meridia_general',
    ) );
    // 02 HEADER & LOGO PANEL
    Kirki::add_panel( 'meridia_header', array(
        'title'    => esc_html__( 'Header & Logo', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // Logo
    Kirki::add_section( 'meridia_logo', array(
        'title' => esc_html__( 'Logo', 'meridia' ),
        'panel' => 'meridia_header',
    ) );
    // Header
    Kirki::add_section( 'meridia_desktop_header', array(
        'title' => esc_html__( 'Header', 'meridia' ),
        'panel' => 'meridia_header',
    ) );
    // Mobile Header
    Kirki::add_section( 'meridia_mobile_header', array(
        'title' => esc_html__( 'Mobile Header', 'meridia' ),
        'panel' => 'meridia_header',
    ) );
    // 03 Featured Area
    Kirki::add_section( 'meridia_featured_area', array(
        'title'    => esc_html__( 'Featured Area', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // 04 Promo Boxes
    Kirki::add_section( 'meridia_promo', array(
        'title'    => esc_html__( 'Promo Boxes', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // 05 BLOG PANEL
    Kirki::add_panel( 'meridia_blog', array(
        'title'    => esc_attr__( 'Blog', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // Post Pagination
    Kirki::add_section( 'meridia_post_pagination', array(
        'title' => esc_html__( 'Pagination', 'meridia' ),
        'panel' => 'meridia_blog',
    ) );
    // Post Meta
    Kirki::add_section( 'meridia_post_meta', array(
        'title' => esc_html__( 'Post Meta', 'meridia' ),
        'panel' => 'meridia_blog',
    ) );
    // Single Post
    Kirki::add_section( 'meridia_single_post', array(
        'title' => esc_html__( 'Single Post', 'meridia' ),
        'panel' => 'meridia_blog',
    ) );
    // Post Excerpt
    Kirki::add_section( 'meridia_post_excerpt', array(
        'title' => esc_html__( 'Post Excerpt', 'meridia' ),
        'panel' => 'meridia_blog',
    ) );
    // 06 LAYOUT PANEL
    Kirki::add_panel( 'meridia_layout', array(
        'title'    => esc_html__( 'Layout', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // Homepage Layout
    Kirki::add_section( 'meridia_homepage_layout', array(
        'title'       => esc_html__( 'Homepage', 'meridia' ),
        'description' => esc_html__( 'Layout options for your homepage. If it\'s set to display your latest posts', 'meridia' ),
        'panel'       => 'meridia_layout',
        'capability'  => 'edit_theme_options',
    ) );
    // Single Post Layout
    Kirki::add_section( 'meridia_single_post_layout', array(
        'title'       => esc_html__( 'Single Post', 'meridia' ),
        'description' => esc_html__( 'Layout options for single post', 'meridia' ),
        'panel'       => 'meridia_layout',
        'capability'  => 'edit_theme_options',
    ) );
    // Archives Layout
    Kirki::add_section( 'meridia_archives_layout', array(
        'title'       => esc_html__( 'Archives', 'meridia' ),
        'description' => esc_html__( 'Layout options for archives and categories pages', 'meridia' ),
        'panel'       => 'meridia_layout',
        'capability'  => 'edit_theme_options',
    ) );
    // Page Layout
    Kirki::add_section( 'meridia_page_layout', array(
        'title'       => esc_html__( 'Page', 'meridia' ),
        'description' => esc_html__( 'Layout options for regular pages', 'meridia' ),
        'panel'       => 'meridia_layout',
        'capability'  => 'edit_theme_options',
    ) );
    // Page title layout
    Kirki::add_section( 'meridia_page_title_layout', array(
        'title'      => esc_html__( 'Page title', 'meridia' ),
        'panel'      => 'meridia_layout',
        'capability' => 'edit_theme_options',
    ) );
    // 07 COLORS PANEL
    Kirki::add_panel( 'meridia_colors', array(
        'title'    => esc_html__( 'Colors', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // General Colors
    Kirki::add_section( 'meridia_general_colors', array(
        'title' => esc_html__( 'General Colors', 'meridia' ),
        'panel' => 'meridia_colors',
    ) );
    // Header Colors
    Kirki::add_section( 'meridia_header_colors', array(
        'title' => esc_html__( 'Header Colors', 'meridia' ),
        'panel' => 'meridia_colors',
    ) );
    // Text Colors
    Kirki::add_section( 'meridia_text_colors', array(
        'title' => esc_html__( 'Text Colors', 'meridia' ),
        'panel' => 'meridia_colors',
    ) );
    // Footer Colors
    Kirki::add_section( 'meridia_footer_colors', array(
        'title' => esc_html__( 'Footer Colors', 'meridia' ),
        'panel' => 'meridia_colors',
    ) );
    // Misc Colors
    Kirki::add_section( 'meridia_misc_colors', array(
        'title' => esc_html__( 'Misc Colors', 'meridia' ),
        'panel' => 'meridia_colors',
    ) );
    // 08 TYPOGRAPHY PANEL
    Kirki::add_panel( 'meridia_typography', array(
        'title'    => esc_html__( 'Typography', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // General Typography
    Kirki::add_section( 'meridia_general_typography', array(
        'title' => esc_html__( 'General', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Header Typography
    Kirki::add_section( 'meridia_header_typography', array(
        'title' => esc_html__( 'Header', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Featured Area Typography
    Kirki::add_section( 'meridia_featured_area_typography', array(
        'title' => esc_html__( 'Featured Area', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Posts Typography
    Kirki::add_section( 'meridia_posts_typography', array(
        'title' => esc_html__( 'Posts', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Single Post Typography
    Kirki::add_section( 'meridia_single_post_typography', array(
        'title' => esc_html__( 'Single Post', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Meta Typography
    Kirki::add_section( 'meridia_meta_typography', array(
        'title' => esc_html__( 'Post Meta', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Widgets Typography
    Kirki::add_section( 'meridia_widgets_typography', array(
        'title' => esc_html__( 'Widgets', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // Misc Typography
    Kirki::add_section( 'meridia_misc_typography', array(
        'title' => esc_html__( 'Misc', 'meridia' ),
        'panel' => 'meridia_typography',
    ) );
    // 09 Footer
    Kirki::add_section( 'meridia_footer', array(
        'title'    => esc_html__( 'Footer', 'meridia' ),
        'priority' => $meridia_priority++,
    ) );
    // Load modules
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/general.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/header.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/featured-area.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/promo-boxes.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/blog.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/layout.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/colors.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/typography.php';
    require MERIDIA_THEME_DIR . '/includes/customizer/modules/footer.php';
}

// endif Kirki check
/**
 * Custom dynamic CSS
 */
function meridia_dynamic_styles()
{
    $breakpoint = meridia_get_mobile_breakpoint();
    $custom_css = "\n\t\t\n\t\t@media only screen and (min-width:{$breakpoint['lg_up']}px) {\n\t\t\t.nav {\n\t\t\t\theight: 60px;\n\t\t\t}\n\n\t\t\t.nav--white {\n\t\t\t\tbackground-color: #fff;\n\t\t\t}\n\t\t\t.nav--white .nav__menu > li > a {\n\t\t\t\tcolor: #343434;\n\t\t\t}\n\t\t\t.nav--white .nav__menu > .active > a {\n\t\t\t\tcolor: #c0945c;\n\t\t\t}\n\t\t\t.nav--white .nav__wrap {\n\t\t\t\tborder-top: 1px solid #eaeaea;\n\t\t\t\tborder-bottom: 1px solid #eaeaea;\n\t\t\t}\t\t\t\n\n\t\t\t.nav--transparent {\n\t\t\t\tbackground-color: transparent;\n\t\t\t\theight: auto;\n\t\t\t\tmin-height: auto;\n\t\t\t}\n\n\t\t\t.nav--transparent.sticky {\n\t\t\t\tbackground-color: rgba(#000, .8);\n\t\t\t}\n\n\t\t\t.nav__dropdown > a::after {\n\t\t\t\tdisplay: inline-block;\n\t\t\t\tcontent: '\\f123';\n\t\t\t\tfont-family: 'ui-icons';\n\t\t\t\tfont-size: 8px;\n\t\t\t\tmargin-left: 5px;\n\t\t\t\tline-height: 1;\n\t\t\t\tcolor: inherit;\n\t\t\t\topacity: 0.5;\n\t\t\t}\n\n\t\t\t.nav__wrap {\n\t\t\t\tdisplay: block !important;\n\t\t\t\theight: auto !important;\n\t\t\t}\n\n\t\t\t.nav__wrap--text-center {\n\t\t\t\ttext-align: center;\n\t\t\t}\n\n\t\t\t.nav__menu > li {\n\t\t\t\tdisplay: inline-block;\n\t\t\t\ttext-align: center;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu {\n\t\t\t\tposition: absolute;\n\t\t\t\ttop: 100%;\n\t\t\t\tleft: -5px;\n\t\t\t\tz-index: 1000;\n\t\t\t\tmin-width: 220px;\n\t\t\t\twidth: 100%;\n\t\t\t\ttext-align: left;\n\t\t\t\tlist-style: none;\n\t\t\t\tbackground-color: #000;\n\t\t\t\t-webkit-background-clip: padding-box;\n\t\t\t\tbackground-clip: padding-box;\n\t\t\t\tdisplay: block;\n\t\t\t\tvisibility: hidden;\n\t\t\t\topacity: 0;\n\t\t\t\ttransition: all 0.1s ease-in-out;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu > li > a {\n\t\t\t\tcolor: #fff;\n\t\t\t\tpadding: 13px 18px;\n\t\t\t\tfont-size: 11px;\n\t\t\t\ttext-transform: uppercase;\n\t\t\t\tletter-spacing: 0.05em;\n\t\t\t\tline-height: 1.3;\n\t\t\t\tdisplay: block;\n\t\t\t\tfont-family: 'Raleway', sans-serif;\n\t\t\t\tborder-top: 1px solid #363636;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu > li > a:hover {\n\t\t\t\tcolor: #c0945c;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu.hide-dropdown {\n\t\t\t\tvisibility: hidden !important;\n\t\t\t\topacity: 0 !important;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu--right {\n\t\t\t\tright: 0;\n\t\t\t}\n\n\t\t\t.nav__dropdown:hover > .nav__dropdown-menu,\n\t\t\t.nav__dropdown:focus > .nav__dropdown-menu,\n\t\t\t.nav__dropdown.focus > .nav__dropdown-menu {\n\t\t\t\topacity: 1;\n\t\t\t\tvisibility: visible;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu .nav__dropdown-menu {\n\t\t\t\tleft: 100%;\n\t\t\t\ttop: 0;\n\t\t\t}\n\n\t\t\t.nav__dropdown .nav__dropdown {\n\t\t\t\tposition: relative;\n\t\t\t}\n\n\t\t\t.nav__dropdown .nav__dropdown > a:after {\n\t\t\t\tfont-family: 'ui-icons';\n\t\t\t\tposition: absolute;\n\t\t\t\tcontent: '\\e804';\n\t\t\t\tfont-size: 10px;\n\t\t\t\tright: 20px;\n\t\t\t\ttop: 50%;\n\t\t\t\ttransform: translateY(-50%);\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger {\n\t\t\t\tdisplay: none;\n\t\t\t}\n\n\t\t\t.nav__flex-parent {\n\t\t\t\theight: 60px;\n\t\t\t}\n\n\t\t\t.nav--align-left {\n\t\t\t\tmargin-left: 60px; \n\t\t\t}\n\n\t\t\t.nav__icon-toggle {\n\t\t\t\tdisplay: none;\n\t\t\t}\n\n\t\t\t.nav--sticky {\n\t\t\t\tposition: fixed;\n\t\t\t\tleft: 0;\n\t\t\t\tright: 0;\n\t\t\t\ttop: 0;\n\t\t\t\tbackground-color: inherit;\n\t\t\t\ttransition: all 0.3s ease-in-out;\n\t\t\t}\n\n\t\t\t.d-lg-block {\n\t\t\t\tdisplay: block!important;\n\t\t\t}\n\n\t\t\t.d-lg-none {\n\t\t\t\tdisplay: none!important;\n\t\t\t}\n\n\t\t}\n\n\t\t@media only screen and (max-width:{$breakpoint['lg_down']}px) {\n\t\t\t.logo-wrap {\n\t\t\t\tpadding: 30px 15px;\n\t\t\t}\n\n\t\t\t.nav--below-header {\n\t\t\t\tpadding: 0 15px;\n\t\t\t}\n\n\t\t\t.nav-2 {\n\t\t\t\tborder-top: 1px solid #eaeaea;\n\t\t\t\tborder-bottom: 1px solid #eaeaea; \n\t\t\t}\n\n\t\t\t.nav__flex-parent,\n\t\t\t.nav__menu {\n\t\t\t\tdisplay: block;\n\t\t\t}\n\n\t\t\t.nav__header {\n\t\t\t\theight: 60px;\n\t\t\t\tdisplay: flex;\n\t\t\t\talign-items: center;\n\t\t\t}\n\n\t\t\t.nav__wrap {\n\t\t\t\ttext-align: left;\n\t\t\t}\n\n\t\t\t.nav__menu li a {\n\t\t\t\tpadding: 0;\n\t\t\t\tline-height: 46px !important;\n\t\t\t\theight: 46px;\n\t\t\t\tdisplay: block;\n\t\t\t\tborder-bottom: 1px solid #363636;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu a {\n\t\t\t\tcolor: #343434;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu a:hover {\n\t\t\t\tcolor: #c0945c;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu > li > a {\n\t\t\t\tpadding-left: 10px;\n\t\t\t\tfont-size: 11px;\n\t\t\t\ttext-transform: uppercase;\n\t\t\t\tletter-spacing: 0.05em;\n\t\t\t\tcolor: #fff;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu > li > ul > li > a {\n\t\t\t\tpadding-left: 20px;\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger {\n\t\t\t\tdisplay: block;\n\t\t\t\twidth: 24px;\n\t\t\t\tmin-height: 46px;\n\t\t\t\tline-height: 46px;\n\t\t\t\tfont-size: 12px;\n\t\t\t\ttext-align: center;\n\t\t\t\tposition: absolute;\n\t\t\t\tright: 0;\n\t\t\t\ttop: 0;\n\t\t\t\tz-index: 50;\n\t\t\t\tcursor: pointer;\n\t\t\t\tcolor: #999999;\n\t\t\t\tbackground-color: transparent;\n\t\t\t\tborder: 0;\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger i {\n\t\t\t\tdisplay: inline-block;\n\t\t\t\ttransition: all 0.3s ease-in-out;\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger:hover,\n\t\t\t.nav__dropdown-trigger:focus {\n\t\t\t\tbackground-color: transparent;\n\t\t\t}\n\n\t\t\t.nav__dropdown-submenu {\n\t\t\t\tposition: relative;\n\t\t\t}\n\n\t\t\t.nav__dropdown-menu {\n\t\t\t\tdisplay: none;\n\t\t\t\twidth: 100% !important;\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger.active + .nav__dropdown-menu {\n\t\t\t\tdisplay: block;\n\t\t\t}\n\n\t\t\t.nav__dropdown-trigger.active > i {\n\t\t\t\ttransform: rotate(180deg);\n\t\t\t}\n\n\t\t\t.logo-title {\n\t\t\t\tdisplay: table;\n\t\t\t\theight: 60px;\n\t\t\t\tposition: absolute;\n\t\t\t\ttop: 0;\n\t\t\t}\n\n\t\t\t.logo-title a {\n\t\t\t\tdisplay: table-cell;\n\t\t\t\tvertical-align: middle;\n\t\t\t}\n\n\t\t\t.nav__socials {\n\t\t\t\tline-height: 60px;\n\t\t\t\tposition: absolute;\n\t\t\t\ttop: 0;\n\t\t\t}\n\n\t\t}\n\n\t";
    $custom_css = meridia_minify_css( $custom_css );
    return $custom_css;
}
