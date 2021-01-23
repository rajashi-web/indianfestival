<?php
// theme sub header breadcrumb functions
function spicepress_curPageURL() {
	$spicepress_page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$spicepress_page_url .= "s";
	}
	$spicepress_page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$spicepress_page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$spicepress_page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $spicepress_page_url;
}

if( !function_exists('spicepress_breadcrumbs') ):
	function spicepress_breadcrumbs() { 
			
		global $post;
		$spicepress_homelink = home_url('/');;
	?>
		<!-- Page Title Section -->
		<section class="page-title-section">		
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
						   <?php 
                           if(is_home() || is_front_page()) {
                                    echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>'; echo esc_html(single_post_title()); echo '</h1></div>';
                           } else{
                                    spicepress_archive_page_title();
                           } 
                           ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<?php
							
							    $allowed_html = array(
									'br'     => array(),
									'em'     => array(),
									'strong' => array(),
									'i'      => array(
										'class' => array(),
									),
									'span'   => array(),
								);	
								echo '<ul class="page-breadcrumb wow bounceInRight animated" ata-wow-delay="0.4s">';
								
								 if (is_home() || is_front_page()) :
								    echo '<li><a href="'.esc_url($spicepress_homelink).'">'.esc_html__('Home','spicepress').'</a></li>';
									echo '<li class="active"><a href="'.esc_url($spicepress_homelink).'">'.esc_html(get_bloginfo( 'name' )).'</a></li>';
								 else:
									echo '<li><a href="'.esc_url($spicepress_homelink).'">'.esc_html__('Home','spicepress').'</a></li>';
									// Blog Category
									if ( is_category() ) {
										echo '<li class="active"><a href="'. esc_url(spicepress_curPageURL()) .'">' . esc_html__('Archive by category','spicepress').' "' . single_cat_title('', false) . '"</a></li>';

									// Blog Day
									} elseif ( is_day() ) {
										echo '<li class="active"><a href="'. esc_url(get_year_link(get_the_time( __( 'Y', 'spicepress' ) ))) . '">'. esc_html(get_the_time( __( 'Y', 'spicepress' ) )) .'</a>';
										echo '<li class="active"><a href="'. esc_url(get_month_link( get_the_time( __( 'Y', 'spicepress' ) ), get_the_time( __( 'm', 'spicepress' ) )) ) .'">'. esc_html(get_the_time( __( 'F', 'spicepress' ) ) ) .'</a>';
										echo '<li class="active"><a href="'. esc_url(spicepress_curPageURL()) .'">'. esc_html(get_the_time( __( 'd', 'spicepress' ) )) .'</a></li>';

									// Blog Month
									} elseif ( is_month() ) {
										echo '<li class="active"><a href="' . esc_url(get_year_link(get_the_time( __( 'Y', 'spicepress' ) ))) . '">' . esc_html(get_the_time( __( 'Y', 'spicepress' ) )) . '</a>';
										echo '<li class="active"><a href="'. esc_url(spicepress_curPageURL()) .'">'. esc_html(get_the_time( __( 'F', 'spicepress' ) )) .'</a></li>';

									// Blog Year
									} elseif ( is_year() ) {
										echo '<li class="active"><a href="'. esc_url(spicepress_curPageURL()) .'">'. esc_html(get_the_time( __( 'Y', 'spicepress' ) )) .'</a></li>';

									// Single Post
									} elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
										
										// Custom post type
										if ( get_post_type() != 'post' ) {
											$spicepress_cat = get_the_category(); 
											$spicepress_cat = $spicepress_cat[0];
											echo '<li>';
												echo get_category_parents($spicepress_cat, TRUE, '');
											echo '</li>';
											echo '<li class="active"><a href="' .esc_url(spicepress_curPageURL()) . '">'. wp_title( '',false ) .'</a></li>';
										} }  
										elseif ( is_page() && $post->post_parent ) {
										$parent_id  = $post->post_parent;
										$breadcrumbs = array();
										while ($parent_id) {
											$page = get_page($parent_id);
											$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID), $allowed_html ) . '</a>';
											$parent_id  = $page->post_parent;
										}
										$breadcrumbs = array_reverse($breadcrumbs);
										foreach ($breadcrumbs as $crumb)
										echo '<li class="active"><a href="' . esc_url(spicepress_curPageURL()) . '">'. esc_html(get_the_title(), $allowed_html ) .'</a></li>';

									
									}
									elseif( is_search() )
									{
										echo '<li class="active"><a href="' . esc_url(spicepress_curPageURL()) . '">'. get_search_query() .'</a></li>';
									}
									elseif( is_404() )
									{
										echo '<li class="active"><a href="' . esc_url(spicepress_curPageURL()) . '">'.esc_html__('Error 404','spicepress').'</a></li>';
									}
									else { 
										// Default
										echo '<li class="active"><a href="' . esc_url(spicepress_curPageURL()) . '">'. esc_html(get_the_title(), $allowed_html ) .'</a></li>';
									}
								endif;
								
								echo '</ul>'
							?>
						</div>
					</div>
				</div>	
			</div>
		</section>
		<div class="page-seperate"></div>
		<!-- /Page Title Section -->

		<div class="clearfix"></div>
	<?php }
endif
?>