<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Hayya 1.0
 */

 if ( ! defined( 'ABSPATH' ) ) { exit; }

class HayyaThemeCustomize {

	/**
	 * { var_description }
	 *
	 * @var        array
	 */
	private static $options = [];
	
	/**
	 * { var_description }
	 *
	 * @var        array
	 */
	private static $defaults = [];

	/**
	 *
	 */
	public static $fonts_list = array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'smaller', 'small', 'regular', 'large', 'larger' );

	/**
	 * This hooks into 'customize_register' (available as of WP 3.4) and allows
	 * you to add new sections and controls to the Theme Customize screen.
	 *
	 * Note: To enable instant preview, we have to actually write a bit of custom
	 * javascript. See live_preview() for more.
	 *
	 * @see add_action('customize_register',$func)
	 * @param \WP_Customize_Manager $wp_customize
	 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 * @since Hayya 1.0
	 */
	public static function register( $wp_customize ) {

		$transport = ( $wp_customize->selective_refresh ? 'postMessage' : 'refresh' );

		$defaults = HayyaTheme::defaults();

		// Layout Section
		$wp_customize->add_section( 'ht-layout',
			array(
				'title'	   => __( 'Layout', 'hayya' ),
				'priority'	=> 1,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Customize Hayya Layout.', 'hayya' ), //Descriptive tooltip
			)
		);

		// layout mode
		$wp_customize->add_setting(
			'layout-mode' ,
			array(
				'default' => $defaults['layout-mode'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			'layout-mode',
			array(
				'type'	   => 'radio',
				'label'	  => __( 'Layout Mode', 'hayya' ),
				'settings'   => 'layout-mode',
				'section'	=> 'ht-layout',
				'choices'  => array(
					'layout-wide'  => __( 'Wide', 'hayya' ),
					'layout-boxed' => __( 'Boxed', 'hayya' ),
				),
				'priority'   => 1,
			)
		);

		// Layout width
		$wp_customize->add_setting(
			'layout-width',
			array(
				'default' => $defaults['layout-width'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'layout-width',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Layout Width (vw)', 'hayya' ),
				'description' 	=> __( 'For boxed mode only.', 'hayya' ),
				'section'		=> 'ht-layout',
				'settings'   	=> 'layout-width',
			)
		);

		// container width
		$wp_customize->add_setting(
			'container-width',
			array(
				'default' => $defaults['container-width'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'container-width',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Container Width (%)', 'hayya' ),
				'section'		=> 'ht-layout',
				'settings'   	=> 'container-width',
			)
		);

		// layout background color
		$wp_customize->add_setting(
			'body-bg-color' ,
			array(
				'default' => $defaults['body-bg-color'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'body-bg-color',
			array(
				'label'	  => __( 'Background Color', 'hayya' ),
				'settings'   => 'body-bg-color',
				'section'	=> 'ht-layout',
			)
		) );

		// layout background image
		$wp_customize->add_setting(
			'body-bg-image' ,
			array(
				'default' => $defaults['body-bg-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'body-bg-image',
			array(
				'label'	  => __( 'Background Image', 'hayya' ),
				'settings'   => 'body-bg-image',
				'section'	=> 'ht-layout',
			)
		) );

		// Color Schemes
		$wp_customize->add_section( 'ht-colors',
			array(
				'title'	   => __( 'Color Schemes', 'hayya' ), //Visible title of section
				'priority'	=> 2, //Determines what order this appears in
				'capability'  => 'edit_theme_options', //Capability needed to tweak
				'description' => __( 'customize Hayya colors.', 'hayya' ), //Descriptive tooltip
			)
		);

		$colors = [
			'first-color'   => [
				'label' => __( 'First Color', 'hayya' ),
				'value' => $defaults['first-color'],
				'desc' => __( 'Text color, tabs background color, ', 'hayya' )
			],
			'second-color'  => [
				'label' => __( 'Second Color', 'hayya' ),
				'value' => $defaults['second-color'],
				'desc' => __( 'Buttons', 'hayya' )
			],
			'third-color'   => [
				'label' => __( 'Third Color', 'hayya' ),
				'value' => $defaults['third-color'],
				// 'desc' => __( 'commants', 'hayya' )
			],
			'fourth-color'  => [
				'label' => __( 'Fourth Color', 'hayya' ),
				'value' => $defaults['fourth-color'],
				'desc' => __( 'Main background colors', 'hayya' )
			],
			'fifth-color'   => [
				'label' => __( 'Fifth Color', 'hayya' ),
				'value' => $defaults['fifth-color'],
				// 'desc' => __( 'Fifth Color Description', 'hayya' )
			],
			'sixth-color'   => [
				'label' => __( 'Sixth Color', 'hayya' ),
				'value' => $defaults['sixth-color'],
				// 'desc' => __( 'Sixth Color Description', 'hayya' )
			],
			'seventh-color' => [
				'label' => __( 'Seventh Color', 'hayya' ),
				'value' => $defaults['seventh-color'],
				// 'desc' => __( 'Seventh Color Description', 'hayya' )
			],


			'red-color' => [
				'label' => __( 'Red Color', 'hayya' ),
				'value' => $defaults['red-color'],
			],
			'green-color' => [
				'label' => __( 'Green Color', 'hayya' ),
				'value' => $defaults['green-color'],
			],
			'blue-color' => [
				'label' => __( 'Blue Color', 'hayya' ),
				'value' => $defaults['blue-color'],
			],
			'orange-color' => [
				'label' => __( 'Orange Color', 'hayya' ),
				'value' => $defaults['orange-color'],
			],


			'yellow-color' => [
				'label' => __( 'Yellow Color', 'hayya' ),
				'value' => $defaults['yellow-color'],
				'desc' => __( 'Yellow Color Description', 'hayya' )
			],
		];

		foreach ( $colors as $key => $value ) {
			$wp_customize->add_setting(
				$key ,
				array(
					'default' => $value['value'],
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize,
				$key,
				array(
					'label'	  => $value['label'],
					'settings'   => $key,
					'section'	=> 'ht-colors',
					'description' => isset($value['desc']) ? $value['desc'] : ''
				)
			) );
		} // End foreach().


		if ( class_exists( 'HayyaFonts' ) ) {

			if ( isset( self::$fonts_list ) && ! empty( self::$fonts_list ) && is_array( self::$fonts_list ) ) {

				// Typography Settings
				$wp_customize->add_section( 'ht-typography',
					array(
						'title'	   => __( 'Typography Settings', 'hayya' ), //Visible title of section
						'priority'	=> 3, //Determines what order this appears in
						'capability'  => 'edit_theme_options', //Capability needed to tweak
						'description' => __( 'customize Hayya typography.', 'hayya' ), //Descriptive tooltip
					)
				);

				foreach ( self::$fonts_list as $k ) {
					$wp_customize->add_setting(
						$k.'-font',
						array(
							'default' => $defaults[$k . '-font'],
							'transport' => 'postMessage',
							'sanitize_callback' => 'sanitize_text_field',
						)
					);
					$wp_customize->add_setting(
						$k.'-size',
						array(
							'default' => $defaults[$k . '-size'],
							'transport' => 'postMessage',
							'sanitize_callback' => 'sanitize_text_field',
						)
					);
				}
			}

			$setting = array();
			foreach ( self::$fonts_list as $k ) {
				$setting[$k . '-font-link'] = $k . '-font';
				$setting[$k . '-size-link'] = $k . '-size';
			}

			$wp_customize->add_control( new HayyaFonts(
				$wp_customize,
				'font_family_control',
				array(
					'section'			=> 'ht-typography',
					'settings'			=> $setting,
				)
			) );
		}

		// Header Section
		$wp_customize->add_section( 'ht-header',
			array(
				'title'	   => __( 'Header', 'hayya' ),
				'priority'	=> 4,
				'capability'  => 'edit_theme_options',
				'description' => __( 'customize Hayya Header.', 'hayya' ), //Descriptive tooltip
		   )
		);

		// hayyaBuild Header
		$wp_customize->add_setting(
			'hayyabuild-header' ,
			array(
				'default'   => $defaults['hayyabuild-header'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'hayyabuild-header',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'HayyaBuild Header', 'hayya' ),
				'description' => __( 'You have to install HayyaBuild plugin.', 'hayya' ),
				'settings'   => 'hayyabuild-header',
				'section'	=> 'ht-header',
				'priority'   => 1,
			)
		);

		// header height
		$wp_customize->add_setting(
			'header-height',
			array(
				'default' => $defaults['header-height'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'header-height',
			array(
				'type' 			=> 'text',
				'label'			=> __( 'Header Height', 'hayya' ),
				'section'		=> 'ht-header',
				'settings'   	=> 'header-height',
				'priority'	   => 2,
			)
		);

		// Header Logo
		$wp_customize->add_setting(
			'header-logo' ,
			array(
				'default' => $defaults['header-logo'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'header-logo',
			array(
				'label'	  => __( 'Header Logo', 'hayya' ),
				'settings'   => 'header-logo',
				'section'	=> 'ht-header',
				'priority'   => 3,
			)
		) );

		// Header Background
		$wp_customize->add_setting(
			'header-bg-color' ,
			array(
				'default' => $defaults['header-bg-color'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'header-bg-color',
			array(
				'label'	  => __( 'Background Color', 'hayya' ),
				'settings'   => 'header-bg-color',
				'section'	=> 'ht-header',
			)
		) );

		// header background image
		$wp_customize->add_setting(
			'header-bg-image' ,
			array(
				'default' => $defaults['header-bg-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'header-bg-image',
			array(
				'label'	  => __( 'Background Image', 'hayya' ),
				'settings'   => 'header-bg-image',
				'section'	=> 'ht-header',
			)
		) );

		// Header Text
		$wp_customize->add_setting(
			'header-text' ,
			array(
				'default' => $defaults['header-text'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'header-text',
			array(
				'type'	   => 'textarea',
				'label'	  => __( 'Header Text', 'hayya' ),
				'settings'   => 'header-text',
				'section'	=> 'ht-header',
				'priority'   => 5,
			)
		);

		// Footer Section
		$wp_customize->add_section( 'ht-footer',
			array(
				'title'	   => __( 'Footer', 'hayya' ),
				'priority'	=> 5,
				'capability'  => 'edit_theme_options',
				'description' => __( 'customize Hayya Footer.', 'hayya' ), //Descriptive tooltip
		   )
		);

		// hayyaBuild Footer
		$wp_customize->add_setting(
			'hayyabuild-footer' ,
			array(
				'default'   => $defaults['hayyabuild-footer'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'hayyabuild-footer',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'HayyaBuild Footer', 'hayya' ),
				'description' => __('You have to install HayyaBuild plugin.', 'hayya' ),
				'settings'   => 'hayyabuild-footer',
				'section'	=> 'ht-footer',
				'priority'   => 1,
			)
		);

		// Footer Widgets
		$wp_customize->add_setting(
			'show-footer-widgets' ,
			array(
				'default'   => $defaults['show-footer-widgets'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'show-footer-widgets',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Display Footer Widgets', 'hayya' ),
				'settings'   => 'show-footer-widgets',
				'section'	=> 'ht-footer',
				'priority'   => 2,
			)
		);

		// Footer Background
		$wp_customize->add_setting(
			'footer-bg-color' ,
			array(
				'default' => $defaults['footer-bg-color'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'footer-bg-color',
			array(
				'label'	  => __( 'Background Color', 'hayya' ),
				'settings'   => 'footer-bg-color',
				'section'	=> 'ht-footer',
			)
		) );

		// footer background image
		$wp_customize->add_setting(
			'footer-bg-image' ,
			array(
				'default' => $defaults['footer-bg-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'footer-bg-image',
			array(
				'label'	  => __( 'Background Image', 'hayya' ),
				'settings'   => 'footer-bg-image',
				'section'	=> 'ht-footer',
			)
		) );

		// Footer Text
		$wp_customize->add_setting(
			'footer-text' ,
			array(
				'default' => $defaults['footer-text'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'footer-text',
			array(
				'type'	   => 'textarea',
				'label'	  => __( 'Footer Text', 'hayya' ),
				'settings'   => 'footer-text',
				'section'	=> 'ht-footer',
				'priority'   => 3,
			)
		);

		// Footer copyrights
		$wp_customize->add_setting(
			'show-copyright' ,
			array(
				'default'   => $defaults['show-copyright'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'show-copyright',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Display Copyright', 'hayya' ),
				'section'	=> 'ht-footer',
				'priority'   => 4,
			)
		);

		// copyright Text
		$wp_customize->add_setting(
			'footer-copyright-text' ,
			array(
				'default' => $defaults['footer-copyright-text'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'footer-copyright-text',
			array(
				'type'	   => 'textarea',
				'label'	  => __( 'Copyright Text', 'hayya' ),
				'settings'   => 'footer-copyright-text',
				'section'	=> 'ht-footer',
				'priority'   => 5,
			)
		);

		$wp_customize->add_setting(
			'copyright-alignment' ,
			array(
				'default' => $defaults['copyright-alignment'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			'copyright-alignment',
			array(
				'type'	   => 'select',
				'label'	  => __( 'Copyright Alignment', 'hayya' ),
				'settings'   => 'copyright-alignment',
				'section'	=> 'ht-footer',
				'choices'	=> array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
				'priority'   => 6,
			)
		);

		// Blog Section
		$wp_customize->add_section( 'ht-blog',
		   array(
			  'title'	   => __( 'Blog', 'hayya' ),
			  'priority'	=> 6,
			  'capability'  => 'edit_theme_options',
			  'description' => __( 'customize Hayya Blog.', 'hayya' ), //Descriptive tooltip
		   )
		);

		$wp_customize->add_setting(
			'show-post-image' ,
			array(
				'default'   => $defaults['show-post-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'show-post-image',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Show post image in posts list page', 'hayya' ),
				'section'	=> 'ht-blog',
				'priority'   => 1,
			)
		);

		$wp_customize->add_setting(
			'image-zoom-effect' ,
			array(
				'default'   => $defaults['image-zoom-effect'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'image-zoom-effect',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Featured image zoom effect', 'hayya' ),
				'section'	=> 'ht-blog',
				'priority'   => 1,
			)
		);

		$wp_customize->add_setting(
			'show-single-sidebar' ,
			array(
				'default'   => $defaults['show-single-sidebar'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox'),
			)
		);
		$wp_customize->add_control(
			'show-single-sidebar',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Show Right Sidebar', 'hayya' ),
				'settings'   => 'show-single-sidebar',
				'section'	=> 'ht-blog',
				'priority'   => 2,
			)
		);

		$wp_customize->add_setting(
			'show-related-and-author' ,
			array(
				'default'   => $defaults['show-related-and-author'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox'),
			)
		);
		$wp_customize->add_control(
			'show-related-and-author',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Show Related Posts', 'hayya' ),
				'settings'   => 'show-related-and-author',
				'section'	=> 'ht-blog',
				'priority'   => 3,
			)
		);

		$wp_customize->add_setting(
			'show-author-card' ,
			array(
				'default'   => $defaults['show-related-and-author'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'show-author-card',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Show Author card', 'hayya' ),
				'settings'   => 'show-author-card',
				'section'	=> 'ht-blog',
				'priority'   => 4,
			)
		);

		$wp_customize->add_setting(
			'default-posts-image' ,
			array(
				'default' => $defaults['default-posts-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'default-posts-image',
			array(
				'label'	  => __( 'Default Posts Image', 'hayya' ),
				'settings'   => 'default-posts-image',
				'section'	=> 'ht-blog',
				'priority'   => 5,
			)
		) );

		$wp_customize->add_setting(
			'default-slider-image' ,
			array(
				'default' => $defaults['default-slider-image'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'default-slider-image',
			array(
				'label'	  => __( 'Default Slider Image', 'hayya' ),
				'settings'   => 'default-slider-image',
				'section'	=> 'ht-blog',
				'priority'   => 6,
			)
		) );

		// Shop Settings
		$wp_customize->add_section( 'ht-shop',
			array(
				'title'	   => __( 'Hayya Settings', 'hayya' ), //Visible title of section
				'priority'	=> 1, //Determines what order this appears in
				'capability'  => 'edit_theme_options', //Capability needed to tweak
				'description' => __( 'Shop Settings.', 'hayya' ), //Descriptive tooltip
				'panel' => 'woocommerce',
			)
		);

		$wp_customize->add_setting(
			'shop-show-header-cart' ,
			array(
				'default'   => $defaults['shop-show-header-cart'],
				'transport' => 'postMessage',
				'sanitize_callback' => array( 'HayyaThemeCustomize', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'shop-show-header-cart',
			array(
				'type'	   => 'checkbox',
				'label'	  => __( 'Show cart in menu', 'hayya' ),
				'settings'   => 'shop-show-header-cart',
				'section'	=> 'ht-shop',
				'priority'   => 1,
			)
		);

		$wp_customize->add_setting(
			'shop-products-per-page',
			array(
				'default' => $defaults['shop-products-per-page'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'shop-products-per-page',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Number of products per page', 'hayya' ),
				'section'		=> 'ht-shop',
				'settings'   	=> 'shop-products-per-page',
				'priority'	   => 2,
				'input_attrs' => [
					'min' => 5,
					'max' => 50,
					'step'  => 1
				]
			)
		);

		$wp_customize->add_setting(
			'shop-number-of-columns',
			array(
				'default' => $defaults['shop-number-of-columns'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'shop-number-of-columns',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Number of columns', 'hayya' ),
				'section'		=> 'ht-shop',
				'settings'   	=> 'shop-number-of-columns',
				'priority'	   => 3,
				'input_attrs' => [
					'min' => 2,
					'max' => 6,
					'step'  => 1
				]
			)
		);

		$wp_customize->add_setting(
			'shop-number-of-related',
			array(
				'default' => $defaults['shop-number-of-related'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'shop-number-of-related',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Number of related products', 'hayya' ),
				'section'		=> 'ht-shop',
				'settings'   	=> 'shop-number-of-related',
				'priority'	   => 4,
				'input_attrs' => [
					'min' => 1,
					'max' => 5,
					'step'  => 1
				]
			)
		);

		$wp_customize->add_setting(
			'shop-related-columns',
			array(
				'default' => $defaults['shop-related-columns'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'shop-related-columns',
			array(
				'type' 			=> 'number',
				'label'			=> __( 'Related products columns', 'hayya' ),
				'section'		=> 'ht-shop',
				'settings'   	=> 'shop-related-columns',
				'priority'	   => 5,
				'input_attrs' => [
					'min' => 1,
					'max' => 5,
					'step'  => 1
				]
			)
		);

	   /*
	   * /- end hayya settings -/
	   */
   }

	/**
	* This will output the custom WordPress settings to the live theme's WP head.
	*
	* Used by hook: 'wp_head'
	*
	* @see add_action('wp_head',$func)
	* @since Hayya 1.0
	*/
	public static function header_output() {
		?><style id="hayya-style"><?php self::fonts(); ?>:root {<?php self::css_variables(); ?>}</style><?php
	}

	/**
	 * { function_description }
	 */
	private static function fonts() {
		$fonts = self::google_font();
		if ( ! empty( $fonts ) && is_array( $fonts ) ) {
			foreach ( $fonts as $key ) {
				$font = urlencode( $key );
				$font = esc_url( '//fonts.googleapis.com/css?family='.$font.':300,400,700,900' );
				echo esc_attr( '@import url(' . $font . ');' );
			}
		}
	}

	/**
	 * generate CSS code
	 * @since Hayya 1.0
	 */
	private static function css_variables() {

		$layout_mode = self::get_value('layout-mode');
		$layout_width = 100;
		if ( $layout_mode === 'layout-boxed' ) {
			$layout_width = self::get_value('layout-width');
		}
		echo esc_html( "--hayya-layout-width:{$layout_width}vw;" );

		$container_width = self::get_value('container-width');
		if ( $container_width ) {
			echo esc_html( "--hayya-container-width:{$container_width}%;" );
		}

		if ( $layout_background_color = self::get_value('body-bg-color') ) {
			echo esc_html( "--hayya-body-bg-color:{$layout_background_color};" );
		}
		if ( $layout_bg_image = self::get_value('body-bg-image') ) {
			echo sanitize_text_field( '--hayya-body-bg-image:url("' . esc_url( $layout_bg_image) . '");' );
		}

		if ( $header_bg_color = self::get_value('header-bg-color') ) {
			echo esc_html( "--hayya-header-bg-color:{$header_bg_color};" );
		}
		if ( $header_background_image = self::get_value( 'header-bg-image' ) ) {
			echo sanitize_text_field( '--hayya-header-bg-image: url("' . esc_url( $header_background_image) . '");' );
		}

		if ( $header_height = self::get_value( 'header-height' ) ) {
			echo esc_html( '--hayya-header-height: ' . esc_attr( $header_height) . ';' );
		}

		if ( $footer_bg_color = self::get_value( 'footer-bg-color' ) ) {
			echo esc_html( "--hayya-footer-bg-color:{$footer_bg_color};" );
		}
		if ( $footer_bg_image = self::get_value( 'footer-bg-image' ) ) {
			echo sanitize_text_field( '--hayya-footer-bg-image: url("' . esc_url( $footer_bg_image) . '");' );
		}

		$colors_list = [ 'first-color', 'second-color', 'third-color', 'fourth-color', 'fifth-color', 'sixth-color', 'seventh-color', 'red-color', 'green-color', 'blue-color', 'orange-color', 'yellow-color' ];

		foreach ( $colors_list as $key ) {
			$value = self::get_value($key);
			$colors = HayyaThemeHelper::color( $value );
			$color = $colors['color'];
			$light = $colors['light'];
			$dark = $colors['dark'];
			echo esc_html( "--hayya-{$key}: {$color};");
			echo esc_html( "--hayya-{$key}-light: {$light};");
			echo esc_html( "--hayya-{$key}-dark: {$dark};");
		}

		foreach ( self::$fonts_list as $font ) {
			if ( $value = self::get_value( $font . '-size' ) ) {
				echo esc_html( "--hayya-{$font}-size: {$value}rem;");
			}
			if ( $value = self::get_value( $font . '-font' ) ) {
				echo sanitize_text_field( "--hayya-{$font}-font: {$value};");
			}
		}
	}

	/**
	 * Gets the value.
	 *
	 * @param      string  $mod    The modifier
	 *
	 * @return     <type>  The value.
	 */
	private static function get_value( $mod = '' ) {
		if ( empty(self::$options) && empty(self::$defaults) ) {
			self::$options = HayyaTheme::hayya_options();
			self::$defaults = HayyaTheme::defaults();
		}
		return isset(self::$options[$mod]) && '' !== self::$options[$mod] ? self::$options[$mod] : self::$defaults[$mod];
	}

	/**
	* This outputs the javascript needed to automate the live settings preview.
	* Also keep in mind that this function isn't necessary unless your settings
	* are using 'transport'=>'postMessage' instead of the default 'transport'
	* => 'refresh'
	*
	* Used by hook: 'customize_preview_init'
	*
	* @see add_action('customize_preview_init',$func)
	* @since Hayya 1.0
	*/
	public static function live_preview() {
		$theme = wp_get_theme('hayya');
		wp_enqueue_script(
			'hayya-theme-customizer',
			get_template_directory_uri() . '/assets/admin/js/hayya-customizer.min.js',
			array( 'jquery','customize-preview' ),
			$theme->get( 'Version' ),
			true
		);
	}

	/**
	 * This will generate a line of CSS google font
	 * @since Hayya 1.0
	 */
	public static function google_font() {
		$list = self::$fonts_list;
		$fonts = array();

		foreach ( $list as $font ) {
			if ( HayyaTheme::hayya_options( $font.'-font' ) ) {
				 if( false === strpos( HayyaTheme::hayya_options( $font . '-font' ), ',' ) ) {
				 	$fonts[] = HayyaTheme::hayya_options( $font . '-font' );
				 }
			}
		}
		return array_unique( $fonts );
	}

	/**
	 * register partials
	 * @since Hayya 1.0
	 */
	public static function register_partials( WP_Customize_Manager $wp_customize ) {

		// Abort if selective refresh is not available.
		if ( ! isset( $wp_customize->selective_refresh ) ) {
			return;
		}
		$wp_customize->selective_refresh->add_partial( 'header-logo', array(
			'selector' => '#main-logo',
			'settings' => array(
				'header-logo',
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'header-text', array(
			'selector' => '#header-content',
			'settings' => array(
				'header-text',
			)
		) );

		$wp_customize->selective_refresh->add_partial( 'show-footer-widgets', array(
			'selector' => '#site-footer',
			'settings' => array(
				'show-footer-widgets',
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'footer-text', array(
			'selector' => '#footer-content',
			'settings' => array(
				'footer-text',
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'footer-copyright-text', array(
			'selector' => '#footer-copyright',
			'settings' => array(
				'footer-copyright-text',
			)
		) );

		$wp_customize->selective_refresh->add_partial( 'show-single-sidebar', array(
			'selector' => '#right-content',
			'settings' => array(
				'show-single-sidebar',
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'show-related-and-author', array(
			'selector' => '#related_posts',
			'settings' => array(
				'show-related-and-author',
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'show-author-card', array(
			'selector' => '#author_card',
			'settings' => array(
				'show-author-card',
			)
		) );

		$wp_customize->selective_refresh->add_partial( 'first-color', array(
			'selector'			=> 'head > #hayya-style',
			'settings'			=> [
				'first-color',
				'second-color',
				'third-color',
				'fourth-color',
				'fifth-color',
				'sixth-color',
				'seventh-color',
			],
			'fallback_refresh'	=> false,
			'render_callback'	 => array( 'HayyaThemeCustomize', 'css' ),
		) );

	}

	/**
	 *
	 * sanitize checkbox
	 * @since Hayya 1.0
	 */
	public static function sanitize_checkbox( $input ) {
		return ( isset( $input ) && true === (bool) $input ? true : false );
	}
}
