<?php 
/**
 * The template for functions 
 *
 * @version    0.0.36
 * @package    pose
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */


if ( ! defined( 'ABSPATH' ) ) { exit; }


require_once("inc/pose-customizer.php");
require_once("inc/pose-options.php");

function pose_setup(){


	// ADD THEME SUPPORT
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support('woocommerce');


	//ADD IMAGE SIZES
	add_image_size( 'pose-large', 590, 9999 );
	add_image_size('pose-featured', 400, 250);
	add_image_size( 'pose-medium', 800, 240 );

	// ADD EDITOR STYLE
	

	register_nav_menus(
	    array(
	      'primary-menu' => esc_attr__( 'Primary Menu', 'pose' ),
	    )
	  );


	// SET CONTENT WIDTH
	if ( ! isset( $content_width ) ) $content_width = 600;

}

add_action('after_setup_theme', 'pose_setup');

// Load styles
function pose_load_styles_scripts(){
	// NOTE:   SOME OF THESE SCRIPTS ARE HOSTED ON A CDN AND ARE NOT STORED LOCALLY... SO THIS THEME MAY NOT RENDER PROPERLY IF YOU ARE NOT CONNECTED TO THE INTERNET
	
		wp_enqueue_style( 'pose-style', get_template_directory_uri() . '/style.css');

		wp_enqueue_style( 'pose-google-noto-font', 'https://fonts.googleapis.com/css?family=Noto+Sans');

		wp_enqueue_script('pose-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js' );

		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		
		//from here
		wp_enqueue_style('pose-custom-style-css', get_template_directory_uri() . '/css/pose_customize_style.css');

	$pose_site_info_display 					=	get_theme_mod('pose_site_info_display_settings');
	$pose_nav_outer_color 						= 	get_theme_mod('pose_navbar_section_bg_color_settings'); 
	$pose_theme_nav_logo_li_a 					= 	get_theme_mod('pose_navbar_section_li_logo_color_settings');
	$pose_theme_ul_li_a 						=	get_theme_mod('pose_navbar_section_li_color_settings');
	$pose_show_items_content					=	get_theme_mod('pose_showgrid_date_text_align_settings');
	$pose_show_date 							= 	get_theme_mod('pose_showgrid_date_bg_color_settings');
	$pose_showgrid_date_text_color 				=	get_theme_mod('pose_showgrid_date_text_color_settings');
	$pose_index_details_box_inner_title_header 	= 	get_theme_mod('pose_index_title_section_bg_color_settings');
	$pose_index_title_text_color 				= 	get_theme_mod('pose_index_title_section_text_color_settings');
	$pose_index_date_text_color					=	get_theme_mod('pose_index_date_section_text_color_settings');
	$pose_index_author_section_text_color 		=	get_theme_mod('pose_index_author_section_text_color_settings');
	$pose_index_comments_section_text_color 	=	get_theme_mod('pose_index_comments_section_text_color_settings');
	$pose_readmore_text_section_color  			=	get_theme_mod('pose_readmore_text_section_text_color_settings');
	$pose_single_title_text_col 				= 	get_theme_mod('pose_single_title_text_color_settings');
	$pose_single_title_datetext_text_color 		=	get_theme_mod('pose_single_title_date_text_color_settings');
	$pose_single_title_authortext_color 		=	get_theme_mod('pose_single_title_author_text_color_settings');
    $pose_single_title_authorlinktext_color 	=   get_theme_mod('pose_single_title_author_link_text_color_settings');
    $pose_single_title_commentslinktext_color 	=   get_theme_mod('pose_single_title_comments_link_text_color_settings');
	$pose_index_read_more 						= 	get_theme_mod('pose_readmore_text_section_bg_color_settings');
	$pose_single_title_header 					= 	get_theme_mod('pose_single_title_header_section_bg_color_settings') ;
	$pose_sidebar_h2 							= 	get_theme_mod('pose_sidebar_header_bg_color_settings');
	$pose_sidebar_searchform_button 			= 	get_theme_mod('pose_search_btn_sidebar_bg_color_settings');
    $pose_sidebar_headertext_color 				=   get_theme_mod('pose_sidebar_header_text_color_settings');
    $pose_sidebar_searchbtntext_color 			=   get_theme_mod('pose_search_btn_sidebar_text_color_settings');
	$pose_page_numbers 							= 	get_theme_mod('pose_pagination_bg_color_settings');
	$pose_footer_4_col 							= 	get_theme_mod('pose_footer_bg_color_settings');


	$pose_style_customizer = "

	.site-info {
	    display: " . esc_attr( $pose_site_info_display ) . " ;
	}


	.nav-outer {
		background: " . esc_attr( $pose_nav_outer_color ) . " ;
	}

	.theme-nav .logo li a {
		color: " . esc_attr($pose_theme_nav_logo_li_a) . " ;
	}

	.theme-nav ul li a {
		color: " . esc_attr($pose_theme_ul_li_a) . " ;
	}

	.pose-show .pose-show-items .pose-show-items-content {
		text-align: " . esc_attr($pose_show_items_content) . " ;
	}

	.pose-show .pose-show-items .pose-show-items-content .date {
		background:  " . esc_attr( $pose_show_date ) . ";
		color: " . esc_attr($pose_showgrid_date_text_color) . " ; 
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header {
		background: " . esc_attr( $pose_index_details_box_inner_title_header ) . ";
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header h2 a {
		color: " . esc_attr($pose_index_title_text_color) . " ;
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .date {
		color: " . esc_attr($pose_index_date_text_color) . " ;
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .author a {
		color: " . esc_attr($pose_index_author_section_text_color) . " ;
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .comments a {
		color: " . esc_attr($pose_index_comments_section_text_color) . " ;
	}

	.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .read-more {
		background: " . esc_attr( $pose_index_read_more) . ";
		color: " . esc_attr( $pose_readmore_text_section_color ) . " ;
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header {
		background: " . esc_attr( $pose_single_title_header) . ";
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title {
		color: " . esc_attr( $pose_single_title_text_col ) . " ;
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .date {
		color: " . esc_attr( $pose_single_title_datetext_text_color ) . " ;
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .author {
		color: " . esc_attr($pose_single_title_authortext_color) . " ;
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .author a {
		color: " . esc_attr($pose_single_title_authorlinktext_color ) . " ;
	}

	.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .comments a {
		color: " . esc_attr( $pose_single_title_commentslinktext_color ) . " ;
	}

	.sidebar .sidebar-inner .sidebar-items h2 {
		background: " . esc_attr( $pose_sidebar_h2) . ";
		color: " . esc_attr( $pose_sidebar_headertext_color  ) . " ;
	}

	.sidebar .sidebar-inner .sidebar-items .searchform div #searchsubmit {
		background: " . esc_attr( $pose_sidebar_searchform_button) . ";
		color: " . esc_attr( $pose_sidebar_searchbtntext_color ) . " ;
	}

	.page-numbers {
		background: " . esc_attr( $pose_page_numbers ) . ";	
	}

	.footer-4-col {
		background: " . esc_attr( $pose_footer_4_col ) . "; 
	}

";	

	wp_add_inline_style('pose-custom-style-css', $pose_style_customizer);
		


		
		
	
}

add_action('wp_enqueue_scripts', 'pose_load_styles_scripts');


function pose_pingback_wrap() {

		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}

}
add_action( 'wp_head', 'pose_pingback_wrap' );




if (!function_exists('pose_admin_style')) {
	function pose_admin_style($hook) {
		
		if ('appearance_page_pose_theme_options' === $hook) {
			wp_enqueue_style('pose-admin-script-style', get_template_directory_uri() . '/css/pose-admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'pose_admin_style');


// Creating the sidebar
function pose_menu_init() {


register_sidebar(
		array(
                'name' 			=> esc_html__('Sidebar Widgets', 'pose'),
                'id'    		=> 'sidebar_id',
                'class'       	=> '',
				'description' 	=> esc_html__('Add sidebar widgets here', 'pose'),
				'before_widget' => '<div class="sidebar-items">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));

	register_sidebar(array(
                'name' 			=> esc_html__('Left Footer', 'pose'),
                'id'    		=> 'left_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'pose'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));
	
	register_sidebar(array(
                'name' 			=> esc_html__('Middle Footer', 'pose'),
                'id'    		=> 'middle_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'pose'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title'	=> '<h2>',
				'after_title' 	=> '</h2>',
	));
	
	register_sidebar(array(
                'name' 			=> esc_html__('Right Footer', 'pose'),
                'id'    		=> 'right_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'pose'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));
	
	register_sidebar(array(
                'name' 			=> esc_html__('Fourth Footer', 'pose'),
                'id'    		=> 'fourth_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'pose'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));

	register_sidebar(array(
                'name' 			=> esc_html__('Full Width Footer', 'pose'),
                'id'    		=> 'full_width_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'pose'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));

}
add_action('widgets_init', 'pose_menu_init');

// this increases or decreaes the length of the excerpt on the index page
function pose_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'pose_excerpt_length', 999 );

function pose_excerpt_more( $more ) {
    //return 'More';
    return ' <a class="read-more" href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . esc_html('Read More', 'pose') . '</a>';
}
add_filter( 'excerpt_more', 'pose_excerpt_more' );



/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function pose_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'pose_skip_link_focus_fix' );
