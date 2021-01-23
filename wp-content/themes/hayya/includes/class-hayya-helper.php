<?php
/**
 * Helper class.
 *
 *
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HayyaThemeHelper {

	/**
	 * Set theme mode.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	public static $mode = null;

	/**
	 * redirect static varibale
	 *
	 * @since		1.0.0
	 * @access		protected
	 * @var			string	$plugin_name	The string used to uniquely identify this plugin.
	 */
	public static $redirect = array();

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since		1.0.0
	 * @access		protected
	 * @var			string	$plugin_name	The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since		1.0.0
	 * @access		protected
	 * @var			string	$version	The current version of the plugin.
	 */
	protected $version;

	/**
	 *
	 * @since		3.0.0
	 * @access		public
	 * @var 		array		$options
	 */
	public static $options = array();

	/**
	 * construct function
	 *
	 * @access		public
	 * @since		1.0.0
	 */
	public function __construct() {
		return true;
	}

	/**
	 *
	 *
	 */
	public static function check_hb() {
		return ( function_exists( 'hayya_run' ) && is_page() ) ? true : false;
	}

	/**
	 * add or remove slashes
	 *
	 * @param unknown $content
	 * @param unknown $slashes
	 * @return unknown|boolean
	 */
	public static function slashes($content = null, $slashes = null ) {
		if ( null !== $content &&  null !== $slashes ) {
			if ( $slashes === 'add' ) return addslashes($content);
			else if ( $slashes === 'strip' ) return stripslashes($content);
		} return false;
	} // End slashes()

	/**
	 * remove slashes if magic_quotes_gpc() is activated
	 *
	 * @param unknown $content
	 * @return unknown|boolean
	 */
	public static function strip_magic_quotes($content = null) {
		return stripslashes_deep($content);
		// return get_magic_quotes_gpc() ? self::slashes($content, 'strip') : $content;
	} // End strip_magic_quotes()

	/**
	 *
	 * @since 	1.0.0
	 */
	public static function is_empty( $var = null ) {
		if ( ! isset($var) ) $var = '';
		return $var;
	} // End is_empty()

	/**
	 * Get wpdb.
	 *
	 * @since   1.0.0
	 */
	public static function debug( $message ) {
		if ( ! empty($message) ) {
			$message = '<div>'.$message.'</div>';
		}
		return $message;
	} // End debug()

	/**
	 * Get HayyaBuild options.
	 *
	 * @since   3.0.0
	 */
	public static function options( $atts = null ) {
		if ( empty(self::$options) ) self::$options = get_option('hayya_settings');
		return self::$options;
	} // End options()

	/**
	 * Check current user
	 *
	 * @since   3.2.0
	 */
	public static function current_user( $capability = null ) {
		// if ( ! function_exists('wp_get_current_user') ) {
		//	 require_once( ABSPATH . 'wp-includes/pluggable.php' );
		// }
		if ( function_exists('current_user_can') && function_exists('wp_get_current_user') ) {
			if ( ! $capability ) $capability = 'manage_options';
			if ( current_user_can($capability) ) {
				return true;
			}
		}
		return false;
	} // End current_user()

	/**
	 *
	 * @since   3.2.0
	 */
	public static function ajax_nonce($process = null) {
		if ( null === $process ) return check_ajax_referer( $process );
	}

	/**
	 *
	 * @since   3.1.0
	 * @return number
	 */
	public static function mtime() {
		// $time_start = HayyaThemeHelper::__mtime();
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	/**
	 * this function will be darken or lighten colors
	 *
	 * @access 		public
	 * @author 		ZintaThemes
	 * @return 		mixed
	 * @since 		1.0.0
	 * @version 	1.0.0
	 *
	 */
	public static function color( $color ) {
		if ( empty($color) ) {
			return;
		}
		if ( ! class_exists('Mexitek\PHPColors\Color') ) {
			return $color;
		}
		$colors = new Mexitek\PHPColors\Color( $color );
		$return = [];
		$p = '20';
		$return['color']	= $color;
		$return['light']	= '#' . $colors->lighten($p);
		$return['dark']	 = '#' . $colors->darken($p);
		return $return;
	}

}
