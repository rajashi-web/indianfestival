<?php
/**
 * About configuration
 *
 * @package Business_Inn
 */

$config = array(
	'menu_name' => esc_html__( 'About Business Inn', 'business-inn' ),
	'page_name' => esc_html__( 'About Business Inn', 'business-inn' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'business-inn' ), 'Business Inn' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'business-inn' ), 'Business Inn' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','business-inn' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/business-inn/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','business-inn' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/demo/business-inn/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','business-inn' ),
			'url'    => 'http://www.prodesigns.com/wordpress-themes/documentation/business-inn/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','business-inn' ),
			'url'  => 'https://wordpress.org/support/theme/business-inn/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'business-inn' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'business-inn' ),
		'support'             => esc_html__( 'Support', 'business-inn' ),
		'upgrade_to_pro'      => esc_html__( 'Team Plugin', 'business-inn' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'business-inn' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'business-inn' ),
			'button_label'        => esc_html__( 'View documentation', 'business-inn' ),
			'button_link'         => 'http://www.prodesigns.com/wordpress-themes/documentation/business-inn/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'business-inn' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'business-inn' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'business-inn' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=business-inn-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'business-inn' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'business-inn' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'business-inn' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','business-inn' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'business-inn' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'business-inn' ) . '</a>',
			),

			'team-view' => array(
				'title'       => esc_html__( 'Team View', 'business-inn' ),
				'description' => esc_html__( 'Please install and activate Team View plugin before you import demo content. You can skip it if you do not like to add team widget and page.', 'business-inn' ),
				'check'       => class_exists( 'Team_View_Admin' ),
				'plugin_slug' => 'team-view',
				'id'          => 'team-view',
			),

			
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'business-inn' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'business-inn' ),
			'button_label' => esc_html__( 'Contact Support', 'business-inn' ),
			'button_link'  => esc_url( 'https://www.prodesigns.com/wordpress-themes/support/forum/business-inn' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'business-inn' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'business-inn' ),
			'button_label' => esc_html__( 'View Documentation', 'business-inn' ),
			'button_link'  => 'http://www.prodesigns.com/wordpress-themes/documentation/business-inn/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'business-inn' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has no premium version. Feel free to contact us any time if you need any customization service.', 'business-inn' ),
			'button_label' => esc_html__( 'Customization Request', 'business-inn' ),
			'button_link'  => 'https://www.prodesigns.com/contact-us/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Child Theme', 'business-inn' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'business-inn' ),
			'button_label' => esc_html__( 'About child theme', 'business-inn' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' 	=> array(
		'description'   => esc_html__( 'This theme is using Team View plugin to add team members. Please install and activate this plugin before you import demo data.', 'business-inn' ),
		'button_label' 	=> esc_html__( 'Visit Plugin Page', 'business-inn' ),
		'button_link'  	=> 'https://wordpress.org/plugins/team-view/',
		'is_new_tab'   	=> true,
	),

);
Business_Inn_About::init( apply_filters( 'business_inn_about_filter', $config ) );