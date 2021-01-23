<?php
//about theme info
add_action( 'admin_menu', 'vw_health_coaching_gettingstarted' );
function vw_health_coaching_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Health Coaching', 'vw-health-coaching'), esc_html__('About VW Health Coaching', 'vw-health-coaching'), 'edit_theme_options', 'vw_health_coaching_guide', 'vw_health_coaching_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_health_coaching_admin_theme_style() {
   wp_enqueue_style( 'vw-health-coaching-font', vw_health_coaching_admin_font_url(), array() );
   wp_enqueue_style('vw-health-coaching-custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
}
add_action('admin_enqueue_scripts', 'vw_health_coaching_admin_theme_style');

// Theme Font URL
function vw_health_coaching_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_health_coaching_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-health-coaching' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Health Coaching Theme', 'vw-health-coaching' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-health-coaching'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Health Coaching at 20% Discount','vw-health-coaching'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-health-coaching'); ?> ( <span><?php esc_html_e('vwpro20','vw-health-coaching'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_HEALTH_COACHING_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-health-coaching' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
	  		<button class="tablinks" data-tab="lite_theme"><?php esc_html_e( 'Getting Started', 'vw-health-coaching' ); ?></button>
	  		<button class="tablinks" data-tab="gutenberg_editor"><?php esc_html_e( 'Ibtana Gutenberg Editor', 'vw-health-coaching' ); ?></button>
	  		<button class="tablinks" data-tab="pro_theme"><?php esc_html_e( 'Get Premium', 'vw-health-coaching' ); ?></button>
	  		<button class="tablinks" data-tab="lite_pro"><?php esc_html_e( 'Support', 'vw-health-coaching' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="lite_theme" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-health-coaching' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Health Coaching is a clean, sophisticated, versatile and resourceful WordPress fitness theme for health trainers, yoga instructors, gym coach, lifestyle coach, fitness trainers, personal trainers, health consultants, nutritionists, physiotherapists and similar businesses and professionals. It can be used as a health blog. It has a beautiful design to clearly list out your services in the most professional manner. The theme is fully responsive, multi-browser compatible, translation ready and retina ready. It has a pleasing gallery layout to put alluring images of your training institute; testimonial section can be added to get feedback from customers to improve your services; subscription form is provided to keep in touch with clients. This health and fitness WordPress theme has various layout options to choose from. It comes with full screen slider area in the homepage and necessary call to action (CTA) buttons. It offers user-friendly interface which facilitates easy website usage for all people irrespective of their coding skills. Social media icons embedded in the theme is useful to make your brand popular and with search engine optimized code, your website will get a good Google ranking. It is based on Bootstrap framework. It has smooth navigation, light in weight and various customizable inner pages predesigned.','vw-health-coaching'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-health-coaching' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-health-coaching' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-health-coaching' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-health-coaching'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-health-coaching'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-health-coaching'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-health-coaching'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-health-coaching' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-health-coaching'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-health-coaching'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_service_section') ); ?>" target="_blank"><?php esc_html_e('Services Section','vw-health-coaching'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_content_section') ); ?>" target="_blank"><?php esc_html_e('Customize Home Page','vw-health-coaching'); ?></a>
							</div>
							
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-health-coaching'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-health-coaching'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-health-coaching'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-cart"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-health-coaching'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-health-coaching'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-health-coaching'); ?></a>
							</div> 
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-health-coaching'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-health-coaching'); ?></p>
                <ul>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-health-coaching'); ?></span><?php esc_html_e(' Go to ','vw-health-coaching'); ?>
				  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-health-coaching'); ?></b></p>

                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-health-coaching'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-health-coaching'); ?></span><?php esc_html_e(' Go to ','vw-health-coaching'); ?>
				  	<b><?php esc_html_e(' Settings >> Reading ','vw-health-coaching'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-health-coaching'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-health-coaching'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-health-coach/" target="_blank"><?php esc_html_e('Documentation','vw-health-coaching'); ?></a></p>
                </ul>
		  	</div>
		</div>	

		<div id="gutenberg_editor" class="tabcontent">
		  	<h3><?php esc_html_e( 'Ibtana Visual Editor', 'vw-health-coaching' ); ?></h3>
			<hr class="h3hr">
			<p><?php esc_html_e('Follow these instructions to setup Ibtana Visual Editor.','vw-health-coaching'); ?></p>
			<p><span class="strong"><?php esc_html_e('1. Click on notice bar( Begin activating plugin ) to install Ibtana Visual Editor Plugin','vw-health-coaching'); ?></p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/install-plugin.png" alt="" />

           	<p><span class="strong"><?php esc_html_e('2. Create a new page :','vw-health-coaching'); ?></span><?php esc_html_e(' Go to ','vw-health-coaching'); ?>
		  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-health-coaching'); ?></b></p>

          	<p><?php esc_html_e('Name it as "Home" then Click on "Ibtana Block Template" button on right side panal.','vw-health-coaching'); ?></p>
          	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/ibtana-page-editor.png" alt="" />
          	<p><span class="strong"><?php esc_html_e('3. Click on the import button to import free templates.','vw-health-coaching'); ?></span></p>
          	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/template-import.png" alt="" />
		</div>

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-health-coaching' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('TAs people are becoming more health conscious, there is an increase in the number of fitness centres popping up around every corner. To stand out among them, you need an attention grabbing website which is built on advanced technology and has an elegant layout design. This health coaching WordPress theme will give you just that. It is a great fit for gym trainers, yoga instructors, fitness centres, health consultants, physiotherapists, personal trainers, lifestyle coach and all the people concerned with giving health and fitness coaching to public. The theme has so many layout options from boxed, full screen to full-width that can be chosen for your website. The backend interface of this health coaching WordPress theme is extremely easy to understand so that a person with minimal knowledge of WordPress can also make the most out of it. It comes with detailed documentation to help you install, configure and make small changes to it on your own.','vw-health-coaching'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_HEALTH_COACHING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-health-coaching'); ?></a>
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-health-coaching'); ?></a>
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-health-coaching'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-health-coaching' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-health-coaching'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-health-coaching'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-health-coaching'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-health-coaching'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-health-coaching'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-health-coaching'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'vw-health-coaching'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-health-coaching'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-health-coaching'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-health-coaching'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-health-coaching'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-health-coaching'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-health-coaching'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-health-coaching'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_HEALTH_COACHING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-health-coaching'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="lite_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-health-coaching'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-health-coaching'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-health-coaching'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-health-coaching'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-health-coaching'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-health-coaching'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_HEALTH_COACHING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-health-coaching'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function vw_health_coaching_parse_query_string(query) {
	  var vars = query.split("&");
	  var query_string = {};
	  for (var i = 0; i < vars.length; i++) {
	    var pair = vars[i].split("=");
	    var key = decodeURIComponent(pair[0]);
	    var value = decodeURIComponent(pair[1]);
	    // If first entry with this name
	    if (typeof query_string[key] === "undefined") {
	      query_string[key] = decodeURIComponent(value);
	      // If second entry with this name
	    } else if (typeof query_string[key] === "string") {
	      var arr = [query_string[key], decodeURIComponent(value)];
	      query_string[key] = arr;
	      // If third or later entry with this name
	    } else {
	      query_string[key].push(decodeURIComponent(value));
	    }
	  }
	  return query_string;
	}

	window.addEventListener('load', function() {
    jQuery('.tablinks').on('click', function() {
        var cityName = jQuery(this).attr('data-tab');
        var $tabContent = jQuery('.tabcontent[id="'+cityName+'"]');

        jQuery('.tablinks').removeClass('active');
        jQuery(this).addClass('active');

        jQuery('.tabcontent').removeClass('open');
        $tabContent.addClass('open');

        jQuery('.tabcontent').hide();
        $tabContent.show();
    });

    var query_string = window.location.search;
    var parsed_qs = vw_health_coaching_parse_query_string(query_string);
    var $get_params = parsed_qs.tab;
    if ($get_params != '' && $get_params == 'gutenberg_editor') {
        jQuery('.tablinks[data-tab="gutenberg_editor"]').trigger('click');
    }
}, false);

</script>

<?php } ?>