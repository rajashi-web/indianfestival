<?php
/**
 * Themes functions and definitions
 *
 * @package Concept Lite
 */
function concept_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 960;
		}
	load_theme_textdomain( 'concept-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'concept-lite' ),
			'social' 	=> esc_html__( 'Social', 'concept-lite' )
		) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('concept-slideimage', 960, 480, true);
	add_image_size('concept-blog-landscape', 960, 480, true);
	add_image_size('concept-blog-portrait', 300, 400, true);
}
add_action( 'after_setup_theme', 'concept_setup' );

/**
 * Register widget areas.
 *
 */
function concept_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'concept-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Front Widget', 'concept-lite' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'concept-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'concept_widgets_init' );

/**
 * Register Open Sans Google fonts for Concept Lite.
 *
 * @return string
 */
function concept_open_sans_font_url() {
	$open_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'concept-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'concept-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Open Sans:300,400,600,700,800' ),
			'subset' => urlencode( $subsets ),
		);

		$open_sans_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $open_sans_font_url;
}

/**
 * Register Arvo Google font for Concept Lite.
 *
 * @return string
 */
function concept_arvo_font_url() {
	$arvo_font_url = '';

	/* translators: If there are characters in your language that are not supported
	   by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Arvo font: on or off', 'concept-lite' ) ) {

		$arvo_font_url = add_query_arg( 'family', urlencode( 'Arvo' ), "https://fonts.googleapis.com/css" );
	}

	return $arvo_font_url;
}

/**
 * Including theme scrips and styles.
 */
function concept_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-reaktion', get_template_directory_uri() . '/js/reaktion.js', array( 'jquery' ), '', true );
		if(is_front_page()){
			wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
		}
		wp_enqueue_script( 'responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'concept-open-sans', concept_open_sans_font_url(), array(), null );
		wp_enqueue_style( 'concept-arvo', concept_arvo_font_url(), array(), null );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style( 'concept-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'concept_scripts_styles' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';