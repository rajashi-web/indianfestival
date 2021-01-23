<?php
/**
 * Public scripts output class
 *
 *
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HayyaThemeHooks
{

	/**
	 *
	 * @since	3.0.0
	 * @access   private
	 * @var array
	 */
	private static $JSFiles = array();

	/**
	 *
	 * @since	3.0.0
	 * @access   private
	 * @var array
	 */
	private static $CSSFiles = array();

   	/**
   	 * Initialize the class and set its properties.
   	 *
   	 * @since		3.0.0
   	 * @param	  	string	$plugin_name	   The name of the plugin.
   	 * @param	  	string	$version	The version of this plugin.
   	 */
   	public function __construct() {
		! is_admin() && $this->scripts_start();
   	} // End __construct()

   	/**
   	 *
   	 * @since		3.0.0
   	 */
   	public function scripts_start() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
   	}

   	/**
   	 * This function is provided for demonstration purposes only.
   	 *
   	 * An instance of this class should be passed to the run() function
   	 * defined in Plugin_Name_Loader as all of the hooks are defined
   	 * in that particular class.
   	 *
   	 * The Plugin_Name_Loader will then create the relationship
   	 * between the defined hooks and the functions defined in this
   	 * class.
   	 *
   	 * Register the stylesheets for the public-facing side of the site.
   	 *
   	 * @since	1.0.0
   	 */
   	public function enqueue_styles() {
  		$theme = wp_get_theme('hayya');

  		wp_enqueue_style(
  			'fontawesome',
  			esc_url( get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css' ),
  			[],
  			$theme->get( 'Version' )
  		);

      // wp_enqueue_style(
      //   'hayya-variables',
      //   esc_url( get_template_directory_uri() . '/assets/css/variables.min.css' ),
      //   [],
      //   $theme->get( 'Version' )
      // );

  		wp_enqueue_style(
  			'hayya',
  			 get_stylesheet_uri(),
  			[ 'fontawesome' ],
        // array('fontawesome'),
  			$theme->get( 'Version' )
  		);

  		if ( is_rtl() && file_exists( get_template_directory() . '/assets/css/rtl.min.css') ) {
  			wp_enqueue_style(
  				'hayya-rtl',
  				esc_url( get_template_directory_uri() . '/assets/css/rtl.min.css' ),
  				[],
  				$theme->get( 'Version' )
  			);
  		}

  		// if ( class_exists( 'HayyaThemeOptions' ) ) {
  		$save = get_option('hayya-transients');
  		if ( ! empty( $save['last_save'] ) ) {
  			$v = $save['last_save'];
  		} else {
  			$v = $theme->get( 'Version' );
  		}
  		// }

    } // End enqueue_styles()

   	/**
   	 * This function is provided for demonstration purposes only.
   	 *
   	 * An instance of this class should be passed to the run() function
   	 * defined in Plugin_Name_Loader as all of the hooks are defined
   	 * in that particular class.
   	 *
   	 * The Plugin_Name_Loader will then create the relationship
   	 * between the defined hooks and the functions defined in this
   	 * class.
   	 *
   	 * Register the stylesheets for the public-facing side of the site.
   	 *
   	 * @since	1.0.0
   	 */
   	public function enqueue_scripts() {
		$theme = wp_get_theme('hayya');

		// wp_enqueue_script(
		// 	'hayya-ie',
		// 	get_template_directory_uri() . '/assets/js/html5shiv.min.js',
		// 	array(),
		// 	$theme->get( 'Version' ),
		// 	true
		// );
		// wp_script_add_data( 'hayya-ie', 'conditional', 'lt IE 9' );

		// wp_enqueue_script(
		// 	'colorbox',
		// 	esc_url( get_template_directory_uri() . '/assets/vendor/colorbox/jquery.colorbox-min.js' ),
		// 	array('jquery'),
		// 	$theme->get( 'Version' ),
		// 	true
		// );

		// wp_enqueue_script(
		// 	'owl-carousel',
		// 	esc_url( get_template_directory_uri() . '/assets/vendor/owl.carousel/owl.carousel.min.js' ),
		// 	array('jquery'),
		// 	$theme->get( 'Version' ),
		// 	true
		// );

		// wp_enqueue_script(
		// 	'justified-gallery',
		// 	esc_url( get_template_directory_uri() . '/assets/vendor/Justified-Gallery/jquery.justifiedGallery.min.js' ),
		// 	array('jquery'),
		// 	$theme->get( 'Version' ),
		// 	true
		// );

		// wp_enqueue_script(
		// 	'materialize',
		// 	esc_url( get_template_directory_uri() . '/assets/vendor/materialize/js/materialize.min.js' ),
		// 	[ 'jquery' ],
		// 	$theme->get( 'Version' ),
		// 	true
		// );

		// wp_enqueue_script(
		// 	'skip-link-focus-fix',
		// 	esc_url( get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js' ),
		// 	array('materialize'),
		// 	$theme->get( 'Version' ),
		// 	true
		// );

		wp_enqueue_script(
			'hayya',
			esc_url( get_template_directory_uri() . '/assets/js/hayya.min.js' ),
			[ 'jquery' ],
			$theme->get( 'Version' ),
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script(
				'comment-reply'
			);
		}

   	} // End enqueue_scripts()

} // End HayyaThemeHooks class
