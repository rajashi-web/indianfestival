 ( function( $ ) {
 	//js
	wp.customize( 'pose_site_info_display_settings', function( value ) {
		value.bind( function( val ) {
			$( '.site-info' ).css('display', val );
		});
	});	

	wp.customize( 'pose_navbar_section_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.nav-outer' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_navbar_section_li_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.theme-nav ul li a' ).css('color', val );
		});
	});

	wp.customize( 'pose_navbar_section_li_logo_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.theme-nav .logo li a' ).css('color', val );
		});
	});

	wp.customize( 'pose_showgrid_date_text_align_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-show .pose-show-items .pose-show-items-content' ).css('text-align', val );
		});
	});

	wp.customize( 'pose_showgrid_date_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-show .pose-show-items .pose-show-items-content .date' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_showgrid_date_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-show .pose-show-items .pose-show-items-content .date' ).css('color', val );
		});
	});	

	wp.customize( 'pose_index_title_section_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_index_title_section_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header h2 a' ).css('color', val );
		});
	});

	wp.customize( 'pose_index_date_section_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .date' ).css('color', val );
		});
	});

	wp.customize( 'pose_index_author_section_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .author a' ).css('color', val );
		});
	});

	wp.customize( 'pose_index_comments_section_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .details-box-inner-title-header .comments a' ).css('color', val );
		});
	});

	wp.customize( 'pose_readmore_text_section_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .read-more' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_readmore_text_section_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .read-more' ).css('color', val );
		});
	});

	wp.customize( 'pose_single_title_header_section_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header' ).css('background-color', val );
		});
	});	

	
	wp.customize( 'pose_single_title_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title' ).css('color', val );
		});
	});

	wp.customize( 'pose_single_title_date_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .date' ).css('color', val );
		});
	});	

	wp.customize( 'pose_single_title_author_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .author' ).css('color', val );
		});
	});	

	wp.customize( 'pose_single_title_author_link_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .author a' ).css('color', val );
		});
	});	
	
	wp.customize( 'pose_single_title_comments_link_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.pose-single .inner .blog-2-col-inner .items .items-inner .img-box .title-header .title-content .comments a' ).css('color', val );
		});
	});	

	wp.customize( 'pose_sidebar_header_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.sidebar .sidebar-inner .sidebar-items h2' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_sidebar_header_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.sidebar .sidebar-inner .sidebar-items h2' ).css('color', val );
		});
	});

	wp.customize( 'pose_search_btn_sidebar_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.sidebar .sidebar-inner .sidebar-items .searchform div #searchsubmit' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_search_btn_sidebar_text_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.sidebar .sidebar-inner .sidebar-items .searchform div #searchsubmit' ).css('color', val );
		});
	});

	wp.customize( 'pose_pagination_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.page-numbers' ).css('background-color', val );
		});
	});	

	wp.customize( 'pose_footer_bg_color_settings', function( value ) {
		value.bind( function( val ) {
			$( '.footer-4-col' ).css('background-color', val );
		});
	});	


} )( jQuery );