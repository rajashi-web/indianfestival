<?php
/**
 * Hayya functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hayya_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Hayya, use a find and replace
   * to change 'hayya' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'hayya', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );

  /*
   * Add default posts and comments RSS feed links to head.
   */
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'hayya' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for custom logo.
   *
   * @since Twenty Fifteen 1.5
   */
  add_theme_support( 'header-logo', array(
    'width'       => 200,
    'flex-height' => true,
  ) );

  /*
   * This theme styles the visual editor to resemble the theme style,
   * specifically font, colors, icons, and column width.
   */
  add_editor_style( array( 'style.css' ) );

  /*
  * Register support for Gutenberg wide blocks
  */
  add_theme_support( 'align-wide' );

  add_theme_support( 'custom-header' );
  
  add_theme_support( 'custom-background' );

  /*
   * color palette
   */
  $them_options = HayyaTheme::hayya_options();

  add_theme_support( 'editor-color-palette', [
    [
      'name' => __( 'First Color', 'hayya' ),
      'slug' => 'first',
      'color' => isset($them_options['first-color']) ? $them_options['first-color'] : '#76C6FF',
    ],
    [
      'name' => __( 'Second Color', 'hayya' ),
      'slug' => 'second',
      'color' => isset($them_options['second-color']) ? $them_options['second-color'] : '#267A9F',
    ],
    [
      'name' => __( 'Third Color', 'hayya' ),
      'slug' => 'third',
      'color' => isset($them_options['third-color']) ? $them_options['third-color'] : '#FFCF4E',
    ],
    [
      'name' => __( 'Fourth Color', 'hayya' ),
      'slug' => 'fourth',
      'color' => isset($them_options['fourth-color']) ? $them_options['fourth-color'] : '#FF933F',
    ],
    [
      'name' => __( 'Fifth Color', 'hayya' ),
      'slug' => 'fifth',
      'color' => isset($them_options['fifth-color']) ? $them_options['fifth-color'] : '#777777',
    ],
    [
      'name' => __( 'Sixth Color', 'hayya' ),
      'slug' => 'sixth',
      'color' => isset($them_options['sixth-color']) ? $them_options['sixth-color'] : '#B6B6B6',
    ],
    [
      'name' => __( 'Seventh Color', 'hayya' ),
      'slug' => 'seventh',
      'color' => isset($them_options['seventh-color']) ? $them_options['seventh-color'] : '#EEEEEE',
    ],
  ] );

  add_theme_support( 'editor-font-sizes', [
    [
      'name'      => __( 'Smaller', 'hayya' ),
      'shortName' => __( 'XS', 'hayya' ),
      'size'      => 8,
      'slug'      => 'smaller'
    ],
    [
      'name'      => __( 'Small', 'hayya' ),
      'shortName' => __( 'S', 'hayya' ),
      'size'      => 12,
      'slug'      => 'small'
    ],
    [
      'name'      => __( 'Regular', 'hayya' ),
      'shortName' => __( 'R', 'hayya' ),
      'size'      => 16,
      'slug'      => 'regular'
    ],
    [
      'name'      => __( 'Large', 'hayya' ),
      'shortName' => __( 'L', 'hayya' ),
      'size'      => 24,
      'slug'      => 'large'
    ],
    [
      'name'      => __( 'Larger', 'hayya' ),
      'shortName' => __( 'XL', 'hayya' ),
      'size'      => 32,
      'slug'      => 'larger'
    ]
  ] );
}
add_action( 'after_setup_theme', 'hayya_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hayya_widgets_init() {
  if ( method_exists( 'HayyaThemeWidgets', 'Widgets') ) {
    HayyaThemeWidgets::Widgets();
  }
}
add_action( 'widgets_init', 'hayya_widgets_init' );

/**
 * comments theme
 */
function hayya_commants( $args = null, $args2 = null, $args3 = null ) {
  HayyaThemeComments::comments( $args, $args2, $args3 );
}

if ( ! isset( $content_width ) ) {
  $content_width = '900';
}

/**
 * Hayya register classe
 */
if ( ! function_exists( 'hayya_register_classe' ) ) :
  function hayya_register_classe( $class = null, $call = false ) {
    if ( null === $class || is_array( $class ) ) {
        return;
    }

    $file_name = 'class-hayya' . ( empty( $class ) ? '' : '-' ) . strtolower( $class ) . '.php';
    $class_name = 'HayyaTheme'. $class;
    $path = get_template_directory() . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . $file_name;
    if ( ! class_exists( $class_name ) && file_exists( $path ) ) {
      include $path;
      if ( class_exists( $class_name ) && true === $call ) {
        new $class_name;
      }
    }
  }
endif;

/**
 * register multiple classes
 */
if ( ! function_exists( 'hayya_register_classes' ) ) :
  function hayya_register_classes( $classes = '' ) {
    if ( empty( $classes ) || ! is_array( $classes ) ) {
      return;
    }
    if ( is_array( $classes ) ) {
      foreach( $classes as $class => $call ) {
        hayya_register_classe( $class, $call );
      }
    }
  }
endif;

if ( ! class_exists( 'Hayya' ) ) {
  hayya_register_classe( '', true );
}

if ( ! function_exists( 'remove_template_redirect' ) ) {
  function remove_template_redirect() {
    ob_start( function( $buffer ){
      $buffer = str_replace( array( 
        '<script type="text/javascript">',
        "<script type='text/javascript'>", 
        "<script type='text/javascript' src=",
        '<script type="text/javascript" src=',
        '<style type="text/css">', 
        "' type='text/css' media=", 
        '<style type="text/css" media',
        "' type='text/css'>"
      ), 
      array(
        '<script>', 
        "<script>", 
        "<script src=",
        '<script src=',
        '<style>', 
        "' media=", 
        '<style media',
        "' >"
      ), $buffer );

      return $buffer;
    });
  }
}
add_action( 'template_redirect', 'remove_template_redirect', 10, 2);
