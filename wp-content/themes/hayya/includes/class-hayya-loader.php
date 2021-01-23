<?php
/**
 *
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 *
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

class HayyaThemeLoader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since	1.0.0
	 * @access   protected
	 * @var	  array	$actions	The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since	1.0.0
	 * @access   protected
	 * @var	  array	$filters	The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since	1.0.0
	 */
	public function __construct() {

		/**
		 * Load autoload from vendor
		 */
		$vendor = get_template_directory() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
		if ( file_exists( $vendor ) ) {
			require_once $vendor;
		}

		$this->hayya_loader();

		// redux
		if ( class_exists( 'HayyaThemeOptions' ) ) {
			new HayyaThemeOptions();
		}

		// main actions
		if ( class_exists( 'HayyaThemeCustomize' ) ) {

			$this->actions();

			/**
			* fonts customize register
			*/
			if ( is_customize_preview() ) {
				$this->hayya_fonts_customize();
			}

		}
	}

	/**
	 *
	 *  call main actions
	 */
	public function actions() {
		add_action( 'customize_register' , array( 'HayyaThemeCustomize' , 'register' ) );
		add_action( 'wp_head' , array( 'HayyaThemeCustomize' , 'header_output' ), 7 );
		add_action( 'customize_preview_init' , array( 'HayyaThemeCustomize' , 'live_preview' ) );
	}

	/**
	 *
	 * Include font customize file
	 *
	 */
	private function hayya_fonts_customize() {
		add_action( 'customize_register', array( 'HayyaThemeCustomize', 'register_partials' ) );
		require_once get_template_directory() . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'google-fonts' . DIRECTORY_SEPARATOR . 'class-hayya-fonts.php';
	}

	/**
	 *    HayyaTheme Loader functions
	 *    @method    hayya_loader
	 *    @return    null
	 */
	private function hayya_loader() {
		$includes = get_template_directory() . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;


		if ( defined( 'JETPACK__VERSION' ) ) require $includes . 'jetpack.php';
		if ( class_exists( 'WooCommerce' ) ) require $includes . 'woocommerce.php';
		require_once $includes . 'template-tags.php';
		require_once $includes . 'template-functions.php';

		hayya_register_classes(
			array(
				'Helper' 	=> false,
				'Widgets' 	=> false,
				'Customize' => false,
				'Options' 	=> false
			)
		);

		if ( ! is_admin() ) {
			hayya_register_classes(
				array(
					'Posts' 	=> false,
					'Comments' 	=> false
				)
			);
		}

		/**
		* Load Hayya admin and public CSS and Javascript codes
		*/
		hayya_register_classe( 'Hooks', true );

		/**
		 *    Run HayyaBuild modules
		 */
		hayya_register_classe( 'HayyaBuild', true );
	}
}
