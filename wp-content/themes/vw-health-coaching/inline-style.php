<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_health_coaching_first_color = get_theme_mod('vw_health_coaching_first_color');

	$vw_health_coaching_custom_css = '';

	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='.view-more, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .scrollup i, .category_main:nth-child(odd), input[type="submit"], #footer .tagcloud a:hover, #footer-2, #sidebar .tagcloud a:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #comments a.comment-reply-link , .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, #footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, .wp-block-button__link{';
			$vw_health_coaching_custom_css .='background-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='#comments input[type="submit"].submit{';
			$vw_health_coaching_custom_css .='background-color: '.esc_attr($vw_health_coaching_first_color).'!important;';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='a, #topbar i, #topbar .custom-social-icons i:hover, #slider .inner_carousel h1 a, .category_main .view-more, .category_main .view-more:hover i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, #footer li a:hover, .main-navigation ul.sub-menu a:hover, .main-navigation a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .post-main-box:hover h2 a, #footer .custom-social-icons i, #sidebar .custom-social-icons i{';
			$vw_health_coaching_custom_css .='color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='#footer .custom-social-icons i, #sidebar .custom-social-icons i, #footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover{';
			$vw_health_coaching_custom_css .='border-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='.post-info hr, .main-navigation ul ul{';
			$vw_health_coaching_custom_css .='border-top-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_health_coaching_custom_css .='.main-navigation ul ul{';
			$vw_health_coaching_custom_css .='border-bottom-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_health_coaching_first_color != false){
			$vw_health_coaching_custom_css .='.search-box i{
			background-color:'.esc_attr($vw_health_coaching_first_color).';
			}';
		}
	$vw_health_coaching_custom_css .='}';

	/*--------------------------Second highlight color-------------------*/

	$vw_health_coaching_second_color = get_theme_mod('vw_health_coaching_second_color');

	if($vw_health_coaching_second_color != false){
		$vw_health_coaching_custom_css .='#topbar, .category_main:nth-child(even), #footer, #comments input[type="submit"].submit:hover,#sidebar input[type="submit"]:hover,.error-btn a:hover,.content-bttn a:hover,#footer input[type="submit"]:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer .woocommerce-product-search button:hover, #sidebar .woocommerce-product-search button:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .wp-block-button .wp-block-button__link:hover{';
			$vw_health_coaching_custom_css .='background-color: '.esc_attr($vw_health_coaching_second_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_second_color != false){
		$vw_health_coaching_custom_css .='h1, h2,h3,h4,h5,h6, .view-more:hover, .view-more:hover i, .post-main-box h2, #sidebar caption, #sidebar h3, .post-navigation a, h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .quantity .qty, .woocommerce-message::before, .post-navigation .meta-nav{';
			$vw_health_coaching_custom_css .='color: '.esc_attr($vw_health_coaching_second_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_second_color != false){
		$vw_health_coaching_custom_css .='.woocommerce .quantity .qty{';
			$vw_health_coaching_custom_css .='border-color: '.esc_attr($vw_health_coaching_second_color).'!important;';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_second_color != false){
		$vw_health_coaching_custom_css .='.woocommerce-message{';
			$vw_health_coaching_custom_css .='border-top-color: '.esc_attr($vw_health_coaching_second_color).';';
		$vw_health_coaching_custom_css .='}';
	}
	if($vw_health_coaching_second_color != false){
		$vw_health_coaching_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($vw_health_coaching_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_health_coaching_theme_lay = get_theme_mod( 'vw_health_coaching_width_option','Full Width');
    if($vw_health_coaching_theme_lay == 'Boxed'){
		$vw_health_coaching_custom_css .='body{';
			$vw_health_coaching_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_health_coaching_custom_css .='width: 97.4%;';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Wide Width'){
		$vw_health_coaching_custom_css .='body{';
			$vw_health_coaching_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_health_coaching_custom_css .='width: 97.6%;';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Full Width'){
		$vw_health_coaching_custom_css .='body{';
			$vw_health_coaching_custom_css .='max-width: 100%;';
		$vw_health_coaching_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_health_coaching_theme_lay = get_theme_mod( 'vw_health_coaching_slider_content_option','Left');
    if($vw_health_coaching_theme_lay == 'Left'){
		$vw_health_coaching_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_health_coaching_custom_css .='text-align:left; left:10%; right:45%;';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Center'){
		$vw_health_coaching_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_health_coaching_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Right'){
		$vw_health_coaching_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_health_coaching_custom_css .='text-align:right; left:45%; right:10%;';
		$vw_health_coaching_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_health_coaching_slider_height = get_theme_mod('vw_health_coaching_slider_height');
	if($vw_health_coaching_slider_height != false){
		$vw_health_coaching_custom_css .='#slider img{';
			$vw_health_coaching_custom_css .='height: '.esc_attr($vw_health_coaching_slider_height).';';
		$vw_health_coaching_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_health_coaching_slider = get_theme_mod('vw_health_coaching_slider_hide_show');
	if($vw_health_coaching_slider == false){
		$vw_health_coaching_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_health_coaching_custom_css .='position: static;';
		$vw_health_coaching_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_health_coaching_theme_lay = get_theme_mod( 'vw_health_coaching_blog_layout_option','Default');
    if($vw_health_coaching_theme_lay == 'Default'){
		$vw_health_coaching_custom_css .='.post-main-box{';
			$vw_health_coaching_custom_css .='';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Center'){
		$vw_health_coaching_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_health_coaching_custom_css .='text-align:center;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.post-info{';
			$vw_health_coaching_custom_css .='margin-top:10px;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.post-info hr{';
			$vw_health_coaching_custom_css .='margin:15px auto;';
		$vw_health_coaching_custom_css .='}';
	}else if($vw_health_coaching_theme_lay == 'Left'){
		$vw_health_coaching_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_health_coaching_custom_css .='text-align:Left;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.post-main-box h2{';
			$vw_health_coaching_custom_css .='margin-top: 10px;';
		$vw_health_coaching_custom_css .='}';
		$vw_health_coaching_custom_css .='.post-info hr{';
			$vw_health_coaching_custom_css .='margin-bottom: 10px;';
		$vw_health_coaching_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_health_coaching_res_topbar = get_theme_mod( 'vw_health_coaching_resp_topbar_hide_show',false);
    if($vw_health_coaching_res_topbar == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#topbar{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_res_topbar == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#topbar{';
			$vw_health_coaching_custom_css .='display:none;';
		$vw_health_coaching_custom_css .='} }';
	}

	$vw_health_coaching_res_stickyheader = get_theme_mod( 'vw_health_coaching_stickyheader_hide_show',false);
    if($vw_health_coaching_res_stickyheader == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.header-fixed{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_res_stickyheader == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.header-fixed{';
			$vw_health_coaching_custom_css .='display:none;';
		$vw_health_coaching_custom_css .='} }';
	}

	$vw_health_coaching_res_slider = get_theme_mod( 'vw_health_coaching_resp_slider_hide_show',false);
    if($vw_health_coaching_res_slider == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#slider{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_res_slider == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#slider{';
			$vw_health_coaching_custom_css .='display:none;';
		$vw_health_coaching_custom_css .='} }';
	}

	$vw_health_coaching_metabox = get_theme_mod( 'vw_health_coaching_metabox_hide_show',true);
    if($vw_health_coaching_metabox == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.post-info{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_metabox == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.post-info{';
			$vw_health_coaching_custom_css .='display:none;';
		$vw_health_coaching_custom_css .='} }';
	}

	$vw_health_coaching_sidebar = get_theme_mod( 'vw_health_coaching_sidebar_hide_show',true);
    if($vw_health_coaching_sidebar == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#sidebar{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_sidebar == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='#sidebar{';
			$vw_health_coaching_custom_css .='display:none;';
		$vw_health_coaching_custom_css .='} }';
	}

	$vw_health_coaching_resp_scroll_top = get_theme_mod( 'vw_health_coaching_resp_scroll_top_hide_show',true);
    if($vw_health_coaching_resp_scroll_top == true){
    	$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='display:block;';
		$vw_health_coaching_custom_css .='} }';
	}else if($vw_health_coaching_resp_scroll_top == false){
		$vw_health_coaching_custom_css .='@media screen and (max-width:575px) {';
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='display:none !important;';
		$vw_health_coaching_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_health_coaching_topbar_padding_top_bottom = get_theme_mod('vw_health_coaching_topbar_padding_top_bottom');
	if($vw_health_coaching_topbar_padding_top_bottom != false){
		$vw_health_coaching_custom_css .='#topbar{';
			$vw_health_coaching_custom_css .='padding-top: '.esc_attr($vw_health_coaching_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_health_coaching_topbar_padding_top_bottom).';';
		$vw_health_coaching_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_health_coaching_sticky_header_padding = get_theme_mod('vw_health_coaching_sticky_header_padding');
	if($vw_health_coaching_sticky_header_padding != false){
		$vw_health_coaching_custom_css .='.header-fixed{';
			$vw_health_coaching_custom_css .='padding: '.esc_attr($vw_health_coaching_sticky_header_padding).';';
		$vw_health_coaching_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_health_coaching_search_font_size = get_theme_mod('vw_health_coaching_search_font_size');
	if($vw_health_coaching_search_font_size != false){
		$vw_health_coaching_custom_css .='.search-box i{';
			$vw_health_coaching_custom_css .='font-size: '.esc_attr($vw_health_coaching_search_font_size).';';
		$vw_health_coaching_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_health_coaching_button_padding_top_bottom = get_theme_mod('vw_health_coaching_button_padding_top_bottom');
	$vw_health_coaching_button_padding_left_right = get_theme_mod('vw_health_coaching_button_padding_left_right');
	if($vw_health_coaching_button_padding_top_bottom != false || $vw_health_coaching_button_padding_left_right != false){
		$vw_health_coaching_custom_css .='.content-bttn .view-more{';
			$vw_health_coaching_custom_css .='padding-top: '.esc_attr($vw_health_coaching_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_health_coaching_button_padding_top_bottom).';padding-left: '.esc_attr($vw_health_coaching_button_padding_left_right).';padding-right: '.esc_attr($vw_health_coaching_button_padding_left_right).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_button_border_radius = get_theme_mod('vw_health_coaching_button_border_radius');
	if($vw_health_coaching_button_border_radius != false){
		$vw_health_coaching_custom_css .='.content-bttn .view-more{';
			$vw_health_coaching_custom_css .='border-radius: '.esc_attr($vw_health_coaching_button_border_radius).'px;';
		$vw_health_coaching_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_health_coaching_single_blog_post_navigation_show_hide = get_theme_mod('vw_health_coaching_single_blog_post_navigation_show_hide',true);
	if($vw_health_coaching_single_blog_post_navigation_show_hide != true){
		$vw_health_coaching_custom_css .='.post-navigation{';
			$vw_health_coaching_custom_css .='display: none;';
		$vw_health_coaching_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_health_coaching_copyright_alingment = get_theme_mod('vw_health_coaching_copyright_alingment');
	if($vw_health_coaching_copyright_alingment != false){
		$vw_health_coaching_custom_css .='.copyright p{';
			$vw_health_coaching_custom_css .='text-align: '.esc_attr($vw_health_coaching_copyright_alingment).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_copyright_padding_top_bottom = get_theme_mod('vw_health_coaching_copyright_padding_top_bottom');
	if($vw_health_coaching_copyright_padding_top_bottom != false){
		$vw_health_coaching_custom_css .='#footer-2{';
			$vw_health_coaching_custom_css .='padding-top: '.esc_attr($vw_health_coaching_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_health_coaching_copyright_padding_top_bottom).';';
		$vw_health_coaching_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_health_coaching_scroll_to_top_font_size = get_theme_mod('vw_health_coaching_scroll_to_top_font_size');
	if($vw_health_coaching_scroll_to_top_font_size != false){
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='font-size: '.esc_attr($vw_health_coaching_scroll_to_top_font_size).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_scroll_to_top_padding = get_theme_mod('vw_health_coaching_scroll_to_top_padding');
	$vw_health_coaching_scroll_to_top_padding = get_theme_mod('vw_health_coaching_scroll_to_top_padding');
	if($vw_health_coaching_scroll_to_top_padding != false){
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='padding-top: '.esc_attr($vw_health_coaching_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_health_coaching_scroll_to_top_padding).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_scroll_to_top_width = get_theme_mod('vw_health_coaching_scroll_to_top_width');
	if($vw_health_coaching_scroll_to_top_width != false){
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='width: '.esc_attr($vw_health_coaching_scroll_to_top_width).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_scroll_to_top_height = get_theme_mod('vw_health_coaching_scroll_to_top_height');
	if($vw_health_coaching_scroll_to_top_height != false){
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='height: '.esc_attr($vw_health_coaching_scroll_to_top_height).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_scroll_to_top_border_radius = get_theme_mod('vw_health_coaching_scroll_to_top_border_radius');
	if($vw_health_coaching_scroll_to_top_border_radius != false){
		$vw_health_coaching_custom_css .='.scrollup i{';
			$vw_health_coaching_custom_css .='border-radius: '.esc_attr($vw_health_coaching_scroll_to_top_border_radius).'px;';
		$vw_health_coaching_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_health_coaching_social_icon_font_size = get_theme_mod('vw_health_coaching_social_icon_font_size');
	if($vw_health_coaching_social_icon_font_size != false){
		$vw_health_coaching_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_health_coaching_custom_css .='font-size: '.esc_attr($vw_health_coaching_social_icon_font_size).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_social_icon_padding = get_theme_mod('vw_health_coaching_social_icon_padding');
	if($vw_health_coaching_social_icon_padding != false){
		$vw_health_coaching_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_health_coaching_custom_css .='padding: '.esc_attr($vw_health_coaching_social_icon_padding).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_social_icon_width = get_theme_mod('vw_health_coaching_social_icon_width');
	if($vw_health_coaching_social_icon_width != false){
		$vw_health_coaching_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_health_coaching_custom_css .='width: '.esc_attr($vw_health_coaching_social_icon_width).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_social_icon_height = get_theme_mod('vw_health_coaching_social_icon_height');
	if($vw_health_coaching_social_icon_height != false){
		$vw_health_coaching_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_health_coaching_custom_css .='height: '.esc_attr($vw_health_coaching_social_icon_height).';';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_social_icon_border_radius = get_theme_mod('vw_health_coaching_social_icon_border_radius');
	if($vw_health_coaching_social_icon_border_radius != false){
		$vw_health_coaching_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_health_coaching_custom_css .='border-radius: '.esc_attr($vw_health_coaching_social_icon_border_radius).'px;';
		$vw_health_coaching_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_health_coaching_products_padding_top_bottom = get_theme_mod('vw_health_coaching_products_padding_top_bottom');
	if($vw_health_coaching_products_padding_top_bottom != false){
		$vw_health_coaching_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_health_coaching_custom_css .='padding-top: '.esc_attr($vw_health_coaching_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_health_coaching_products_padding_top_bottom).'!important;';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_products_padding_left_right = get_theme_mod('vw_health_coaching_products_padding_left_right');
	if($vw_health_coaching_products_padding_left_right != false){
		$vw_health_coaching_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_health_coaching_custom_css .='padding-left: '.esc_attr($vw_health_coaching_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_health_coaching_products_padding_left_right).'!important;';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_products_box_shadow = get_theme_mod('vw_health_coaching_products_box_shadow');
	if($vw_health_coaching_products_box_shadow != false){
		$vw_health_coaching_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_health_coaching_custom_css .='box-shadow: '.esc_attr($vw_health_coaching_products_box_shadow).'px '.esc_attr($vw_health_coaching_products_box_shadow).'px '.esc_attr($vw_health_coaching_products_box_shadow).'px #ddd;';
		$vw_health_coaching_custom_css .='}';
	}

	$vw_health_coaching_products_border_radius = get_theme_mod('vw_health_coaching_products_border_radius');
	if($vw_health_coaching_products_border_radius != false){
		$vw_health_coaching_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_health_coaching_custom_css .='border-radius: '.esc_attr($vw_health_coaching_products_border_radius).'px;';
		$vw_health_coaching_custom_css .='}';
	}