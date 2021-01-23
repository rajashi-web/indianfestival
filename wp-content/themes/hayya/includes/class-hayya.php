<?php
/**
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

class HayyaTheme
{

	/**
	 * Hayya Options.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	public static $options = false;

	/**
	 * theme mod
	 *
	 * @var        array
	 */
	public static $hayya_mods = [];

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function __construct() {
		hayya_register_classe( 'Loader', true );
	} // End __construct()

	/**
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function options( $value1 = null, $value2 = null, $value3 = null ) {
		if ( ! self::$options ) {
			global $hayya;
			self::$options = $hayya;
		}
		return self::$options;
	}

	/**
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function hayya_options( $v1 = '', $v2 = '' ) {
		if ( empty( self::$hayya_mods ) ) {
			self::$hayya_mods = get_theme_mods();
		}

		if ( !$v1 &&  !$v2 ) {
			return self::$hayya_mods;
		}

		$return = self::get_value(
			self::$hayya_mods,
			$v1,
			$v2
		);

		if ( !isset($return) ) {
			$return = self::get_value(
				self::defaults(),
				$v1,
				$v2
			);
		}

		return isset($return) ? $return : false;
	}

	/**
	 * Gets the value.
	 *
	 * @param      <type>  $arr    The arr
	 * @param      <type>  $v1     The v 1
	 * @param      <type>  $v2     The v 2
	 *
	 * @return     <type>  The value.
	 */
	private static function get_value( $arr, $v1, $v2 ) {
		if ( $v1 && !$v2 ) {
			return isset($arr[$v1]) ? $arr[$v1] : '';
		} else if ( $v1 && $v2 ) {
			return isset($arr[$v1][$v2]) ? $arr[$v1][$v2] : '';
		}
		return '';
	}

	/**
	 * this function will store default values of the theme in array to use it
	 * in customizer or when cannot get values from database
	 *
	 * @access 		public
	 * @author 		ZintaThemes
	 * @return 		Array
	 * @since 		1.0.0
	 * @version 	1.0.0
	 *
	 */
	public static function defaults( $value = null ) {
		$defaults = [
			'layout-mode' => 'layout-wide',
			'layout-width'   => '90',
			'container-width'   => '85',
			'layout-background-color' => '#003434',

			'body-bg-image' => '',
			'body-bg-color' => '#003434',
			'header-bg-image' => '',
			'header-bg-color' => '#003434',
			'footer-bg-image' => '',
			'footer-bg-color' => '#003434',

			'body-font' => '"Arial Black", Gadget, sans-serif',
			'body-size' => '1',
			'h1-font' => '"Arial Black", Gadget, sans-serif',
			'h1-size' => '2',
			'h2-font' => '"Arial Black", Gadget, sans-serif',
			'h2-size' => '1.8',
			'h3-font' => '"Arial Black", Gadget, sans-serif',
			'h3-size' => '1.6',
			'h4-font' => '"Arial Black", Gadget, sans-serif',
			'h4-size' => '1.4',
			'h5-font' => '"Arial Black", Gadget, sans-serif',
			'h5-size' => '1.2',
			'h6-font' => '"Arial Black", Gadget, sans-serif',
			'h6-size' => '1',

			'smaller-font' => '"Arial Black", Gadget, sans-serif',
			'smaller-size' => '0.5',
			'small-font' => '"Arial Black", Gadget, sans-serif',
			'small-size' => '0.75',
			'regular-font' => '"Arial Black", Gadget, sans-serif',
			'regular-size' => '1',
			'large-font' => '"Arial Black", Gadget, sans-serif',
			'large-size' => '1.5',
			'larger-font' => '"Arial Black", Gadget, sans-serif',
			'larger-size' => '2',

			'first-color' => '#003434',
			'second-color' => '#0cc6d3',
			'third-color' => '#eef2a2',
			'fourth-color' => '#ffffff',
			'fifth-color' => '#ecf27d',
			'sixth-color' => '#61ccd3',
			'seventh-color' => '#096c9e',
			'red-color' => '#ffa5a5',
			'green-color' => '#b0ff99',
			'blue-color' => '#99d6ff',
			'orange-color' => '#f7c08a',
			'yellow-color' => '#f3ff7a',

			'header-height' => '350px',
			'hayyabuild-header' => false,
			'top-menu' 			=> false,
			'header-logo' => '', // get_template_directory_uri().'/assets/images/hayya-logo.png',
			'header-backgound' => '',
			'header-text' => get_bloginfo( 'description' ), // 'Hayya Theme - WordPress responsive theme based on Materialize CSS Framework',
			'hayyabuild-footer' => false,
			'footer-backgound' => '',
			'show-footer-widgets' => true,
			'footer-text' => get_bloginfo( 'description' ),// 'Hayya Theme - WordPress responsive theme based on Materialize CSS Framework',
			'show-copyright' => true,
			'footer-copyright-text' => 'Theme: Hayya by ZintaThemes',
			'copyright-alignment' => 'center',

			'shop-show-header-cart' => true,
			'shop-products-per-page' => 10,
			'shop-gallery-thumnbail-columns' => '6',
			'shop-number-of-columns' => 3,
			'shop-number-of-related' => 4,
			'shop-related-columns' => 4,

			'show-post-image' => false,
			'image-zoom-effect' => true,
			'show-single-sidebar' => true,
			'show-related-and-author' => true,
			'show-author-card' => true,
			'default-posts-image' => get_template_directory_uri().'/assets/images/no-image.png',
			'default-slider-image' => get_template_directory_uri().'/assets/images/no-image-150x150.png'
		];

		if ( null === $value ) {
			return $defaults;
		} else if ( ! empty( $defaults[ $value ] ) ) {
			return $defaults[ $value ];
		}

		return false;
	}

} // End Hayya {} class
