<?php

function pose_customizer_settings( $wp_customize ){


	//ADD PANEL
	$wp_customize->add_panel('pose_site_layout_option_panel',
		array(
			'title'      => esc_html__('Pose Theme - Customize Layout', 'pose'),
			'priority'   => 2,
			'capability' => 'edit_theme_options',
		)
	);


	//BEGIN SITE INFO SECTION
	$wp_customize->add_section('pose_site_info_section', array(
		'title' => __('Pose Theme - Site Info', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));


	$wp_customize->add_setting('pose_site_info_display_settings', array(
	    'default' => __('none', 'pose'),
	    'sanitize_callback'  => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pose_site_info_display_control', array(
	    'label'    => __('Site Info Section', 'pose'),
	    'section'  => 'pose_site_info_section',
	    'settings' => 'pose_site_info_display_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => __('Yes', 'pose'),
	    				'none' 	=> __('No', 'pose'),
	    			   )
	)));


	//BEGIN NAVIGATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_navbar_section', array(
		'title' => __('Pose Theme - Navbar BG Color', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//NAVBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_navbar_section_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_navbar_section_bg_color_control', array(
	    'label'    => __('Navbar Background Color', 'pose'),
	    'section'  => 'pose_navbar_section',
	    'settings' => 'pose_navbar_section_bg_color_settings',
	)));

	//NAVBAR SECTION TEXT COLOR
	$wp_customize->add_setting('pose_navbar_section_li_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_navbar_section_li_color_control', array(
	    'label'    => __('Navbar Text Color', 'pose'),
	    'section'  => 'pose_navbar_section',
	    'settings' => 'pose_navbar_section_li_color_settings',
	)));

	//NAVBAR SECTION LOGO TEXT COLOR
	$wp_customize->add_setting('pose_navbar_section_li_logo_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_navbar_section_li_logo_color_control', array(
	    'label'    => __('Navbar Site Name Text Color', 'pose'),
	    'section'  => 'pose_navbar_section',
	    'settings' => 'pose_navbar_section_li_logo_color_settings',
	)));

	//BEGIN POSE SHOW GRID DATE BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_showgrid_date_section', array(
		'title' => __('Pose Theme - Pose ShowGrid Content', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//POSE SHOW GRID DATE SECTION TEXT ALIGN
	$wp_customize->add_setting('pose_showgrid_date_text_align_settings', array(
	    'default' => __('center', 'pose'),
	    'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pose_showgrid_date_text_align_control', array(
	    'label'    => __('Show Grid Date Align Text', 'pose'),
	    'section'  => 'pose_showgrid_date_section',
	    'settings' => 'pose_showgrid_date_text_align_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'left' 		=> __('Left', 'pose'),
	    				'center' 	=> __('Center', 'pose'),
	    				'right'		=> __('Right', 'pose'),
	    			   )
	)));
	
	//POSE SHOW GRID DATE SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_showgrid_date_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_showgrid_date_bg_color_control', array(
	    'label'    => __('Show Grid Date Background Color', 'pose'),
	    'section'  => 'pose_showgrid_date_section',
	    'settings' => 'pose_showgrid_date_bg_color_settings',
	)));

	//POSE SHOW GRID DATE SECTION TEXT COLOR
	$wp_customize->add_setting('pose_showgrid_date_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_showgrid_date_text_color_control', array(
	    'label'    => __('Show Grid Date Text Color', 'pose'),
	    'section'  => 'pose_showgrid_date_section',
	    'settings' => 'pose_showgrid_date_text_color_settings',
	)));


	//BEGIN INDEX POSTS BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_index_title_section', array(
		'title' => __('Pose Theme - Posts Header BG Color', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//INDEX TITLE  BACKGROUND COLOR
	$wp_customize->add_setting('pose_index_title_section_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_index_title_section_bg_color_control', array(
	    'label'    => __('Index Title Background Color', 'pose'),
	    'section'  => 'pose_index_title_section',
	    'settings' => 'pose_index_title_section_bg_color_settings',
	)));
	
	//INDEX TITLE  TEXT COLOR
	$wp_customize->add_setting('pose_index_title_section_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_index_title_section_text_color_control', array(
	    'label'    => __('Index Title Text Color', 'pose'),
	    'section'  => 'pose_index_title_section',
	    'settings' => 'pose_index_title_section_text_color_settings',
	)));


	//INDEX DATE  TEXT COLOR
	$wp_customize->add_setting('pose_index_date_section_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_index_date_section_text_color_control', array(
	    'label'    => __('Index Date Text Color', 'pose'),
	    'section'  => 'pose_index_title_section',
	    'settings' => 'pose_index_date_section_text_color_settings',
	)));

	//INDEX AUTHOR  TEXT COLOR
	$wp_customize->add_setting('pose_index_author_section_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_index_author_section_text_color_control', array(
	    'label'    => __('Index Author Text Color', 'pose'),
	    'section'  => 'pose_index_title_section',
	    'settings' => 'pose_index_author_section_text_color_settings',
	)));

	//INDEX COMMENTS  TEXT COLOR
	$wp_customize->add_setting('pose_index_comments_section_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_index_comments_section_text_color_control', array(
	    'label'    => __('Index Comments Text Color', 'pose'),
	    'section'  => 'pose_index_title_section',
	    'settings' => 'pose_index_comments_section_text_color_settings',
	)));

	//BEGIN READMORE TEXT BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_readmore_text_section', array(
		'title' => __('Pose Theme - Read More Text BG Color', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//READMORE TEXT  BACKGROUND COLOR
	$wp_customize->add_setting('pose_readmore_text_section_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_readmore_text_section_bg_color_control', array(
	    'label'    => __('Read More Text Background Color', 'pose'),
	    'section'  => 'pose_readmore_text_section',
	    'settings' => 'pose_readmore_text_section_bg_color_settings',
	)));

	//READMORE TEXT   COLOR
	$wp_customize->add_setting('pose_readmore_text_section_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_readmore_text_section_text_color_control', array(
	    'label'    => __('Read More Text Color', 'pose'),
	    'section'  => 'pose_readmore_text_section',
	    'settings' => 'pose_readmore_text_section_text_color_settings',
	)));

	//BEGIN SINGLE TITLE HEADER BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_single_title_header_section', array(
		'title' => __('Pose Theme - Single Title Header BG Color', 'pose'),
		'priority' => 10,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//SINGLE TITLE HEADER  BACKGROUND COLOR
	$wp_customize->add_setting('pose_single_title_header_section_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_header_section_bg_color_control', array(
	    'label'    => __('Single Title Header Background Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_header_section_bg_color_settings',
	))); 

		
	//SINGLE TITLE TEXT COLOR
	$wp_customize->add_setting('pose_single_title_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_text_color_control', array(
	    'label'    => __('Single Title Text Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_text_color_settings',
	)));


	//SINGLE TITLE DATE TEXT COLOR
	$wp_customize->add_setting('pose_single_title_date_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_date_text_color_control', array(
	    'label'    => __('Single Title Date Text Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_date_text_color_settings',
	)));

	//SINGLE TITLE AUTHOR TEXT COLOR
	$wp_customize->add_setting('pose_single_title_author_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_author_text_color_control', array(
	    'label'    => __('Single Title Author Text Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_author_text_color_settings',
	)));

	//SINGLE TITLE AUTHOR LINK TEXT COLOR
	$wp_customize->add_setting('pose_single_title_author_link_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_author_link_text_color_control', array(
	    'label'    => __('Single Title Author Link Text Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_author_link_text_color_settings',
	)));

	//SINGLE TITLE COMMENTS LINK TEXT COLOR
	$wp_customize->add_setting('pose_single_title_comments_link_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_single_title_comments_link_text_color_control', array(
	    'label'    => __('Single Title Comments Link Text Color', 'pose'),
	    'section'  => 'pose_single_title_header_section',
	    'settings' => 'pose_single_title_comments_link_text_color_settings',
	)));

	//BEGIN SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_sidebar_section', array(
		'title' => __('Pose Theme - Sidebar Header BG Color', 'pose'),
		'priority' => 11,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_sidebar_header_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_sidebar_header_bg_color_control', array(
	    'label'    => __('Sidebar Header Background Color', 'pose'),
	    'section'  => 'pose_sidebar_section',
	    'settings' => 'pose_sidebar_header_bg_color_settings',
	)));
	
	//SIDEBAR SECTION TEXT COLOR
	$wp_customize->add_setting('pose_sidebar_header_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_sidebar_header_text_color_control', array(
	    'label'    => __('Sidebar Header Text Color', 'pose'),
	    'section'  => 'pose_sidebar_section',
	    'settings' => 'pose_sidebar_header_text_color_settings',
	)));


	//BEGIN POSE PAGINATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_pagination_section', array(
		'title' => __('Pose Theme - Pagination BG Color', 'pose'),
		'priority' => 11,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//POSE PAGINATION SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_pagination_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_pagination_bg_color_control', array(
	    'label'    => __('Page Numbers Background Color', 'pose'),
	    'section'  => 'pose_pagination_section',
	    'settings' => 'pose_pagination_bg_color_settings',
	)));


	//BEGIN POSE SEARCH BUTTON SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_search_btn_sidebar_section', array(
		'title' => __('Pose Theme - Search Button BG Color', 'pose'),
		'priority' => 11,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//POSE SEARCH BUTTON SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_search_btn_sidebar_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_search_btn_sidebar_bg_color_control', array(
	    'label'    => __('Search Button Sidebar Background Color', 'pose'),
	    'section'  => 'pose_search_btn_sidebar_section',
	    'settings' => 'pose_search_btn_sidebar_bg_color_settings',
	)));
	
	//POSE SEARCH BUTTON SIDEBAR SECTION TEXT COLOR
	$wp_customize->add_setting('pose_search_btn_sidebar_text_color_settings', array(
	    'default' => '#fff',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_search_btn_sidebar_text_color_control', array(
	    'label'    => __('Search Button Sidebar Text Color', 'pose'),
	    'section'  => 'pose_search_btn_sidebar_section',
	    'settings' => 'pose_search_btn_sidebar_text_color_settings',
	)));


	//BEGIN FOOTER BACKGROUND COLOR SECTION
	$wp_customize->add_section('pose_footer_section', array(
		'title' => __('Pose Theme - Footer BG Color', 'pose'),
		'priority' => 11,
		'panel' => 'pose_site_layout_option_panel',
	));

	
	//FOOTER SECTION BACKGROUND COLOR
	$wp_customize->add_setting('pose_footer_bg_color_settings', array(
	    'default' => '#e05333',
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pose_footer_bg_color_control', array(
	    'label'    => __('footer Header Background Color', 'pose'),
	    'section'  => 'pose_footer_section',
	    'settings' => 'pose_footer_bg_color_settings',
	)));


	$wp_customize->get_setting('pose_site_info_display_settings')->transport 					= 	'postMessage';
    $wp_customize->get_setting('pose_navbar_section_bg_color_settings')->transport        		= 	'postMessage';
    $wp_customize->get_setting('pose_navbar_section_li_logo_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('pose_navbar_section_li_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('pose_showgrid_date_text_align_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('pose_showgrid_date_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('pose_showgrid_date_text_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('pose_index_title_section_bg_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('pose_index_title_section_text_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('pose_index_date_section_text_color_settings')->transport 		= 	'postMessage'; 
    $wp_customize->get_setting('pose_index_author_section_text_color_settings')->transport 		= 	'postMessage'; 
    $wp_customize->get_setting('pose_index_comments_section_text_color_settings')->transport 	= 	'postMessage';
    $wp_customize->get_setting('pose_readmore_text_section_bg_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('pose_readmore_text_section_text_color_settings')->transport 	= 	'postMessage';
    $wp_customize->get_setting('pose_single_title_header_section_bg_color_settings')->transport = 	'postMessage';

    $wp_customize->get_setting('pose_single_title_text_color_settings')->transport = 	'postMessage';
    $wp_customize->get_setting('pose_single_title_date_text_color_settings')->transport = 	'postMessage';
    $wp_customize->get_setting('pose_single_title_author_text_color_settings')->transport = 	'postMessage';
    $wp_customize->get_setting('pose_single_title_author_link_text_color_settings')->transport = 	'postMessage';
    $wp_customize->get_setting('pose_single_title_comments_link_text_color_settings')->transport = 	'postMessage';


    $wp_customize->get_setting('pose_sidebar_header_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('pose_sidebar_header_text_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('pose_search_btn_sidebar_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('pose_search_btn_sidebar_text_color_settings')->transport 		=	'postMessage';
    $wp_customize->get_setting('pose_pagination_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('pose_footer_bg_color_settings')->transport 				= 	'postMessage';


}


function pose_theme_customizer_live_preview()
{
	wp_enqueue_script( 
		  'pose-theme-portfolio-page-customizer',			
		  get_template_directory_uri().'/js/pose-customizer.js',
		  array( 'jquery','customize-preview' ),	
		  '',						
		  true						
	);
}



add_action('customize_register', 'pose_customizer_settings');
add_action( 'customize_preview_init', 'pose_theme_customizer_live_preview' );


