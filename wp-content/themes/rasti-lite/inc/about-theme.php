<?php
/**
 * rasti Lite about theme
 *
 * @package rasti Lite about theme
 */
 
define('RASTILITE_THEME_URL','https://www.templatemonster.com/wordpress-themes/rasti-digital-agency-one-page-wordpress-theme-100096.html','rasti-lite');
define('RASTILITE_LIVE_DEMO','https://www.templatemonsterpreview.com/demo/100096.html?_gl=1*dvk6z9*_ga*MjAwOTI3MDA4OS4xNjA3NzQ5OTk2*_ga_FTPYEGT5LY*MTYwNzc0OTk5NS4xLjEuMTYwNzc1MDE0OC41MQ..&_ga=2.39879778.174141634.1607749999-2009270089.1607749996','rasti-lite');
 
//about theme info
add_action( 'admin_menu', 'bhost_abouttheme' );
function bhost_abouttheme() {    	
	add_theme_page( __('About Theme', 'rasti-lite'), __('About Theme', 'rasti-lite'), 'edit_theme_options', 'bhost_theme_guide', 'bhost_theme_mostrar_guide');   
} 

//guidline for about theme
function bhost_theme_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_html_e('About Theme Info', 'rasti-lite'); ?>
		   </div>
          <h4><?php esc_html_e('Rasti Pro - Digital Agency WordPress Theme ','rasti-lite'); ?></h4>
		  <p>
			<?php esc_html_e('Rasti Pro is a Responsive Digital Agency One page WordPress Theme fresh and clean Design.It makes for corporate, creative agencies and other businesses website. It looks excellent on all major browsers, tablets and phones. Just take the best WordPress Theme of your choice, change the content, add your images and done!' , 'rasti-lite');?> 
		  </p>
		  
			<h3><?php esc_html_e('Rasti Pro Features', 'rasti-lite'); ?></h3>
		<?php $rasti_features = "
			<ul>
				<li>Clean and <strong>Professional</strong> Design</li>
				<li>Cross Browser Compatible</li>
				<li>Fully Responsive</li>
				<li>Home Slider</li>
				<li>SEO Friendly</li>
				<li>Elementor - Drag and Drop Page Builder</li>
				<li>Unlimited Theme Colors</li>
				<li>WooCommerce Supported</li>        
				<li>Free Support &#38; Updates</li>    
				<li>Contact Form 7</li>
				<li>Video Documentaion</li>
				<li>Well Documented</li>
				<li>Wow Animation</li>
				<li>And Much More..</li>
			</ul>
		  ";
		  
		  echo $rasti_features;
		  ?>
		  
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo RASTILITE_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'rasti-lite'); ?></a> | 
				<a href="<?php echo RASTILITE_THEME_URL; ?>"><?php esc_attr_e('Buy Pro Version', 'rasti-lite'); ?></a> 
                <div style="height:5px"></div>
				<hr />                
			</div>	
			
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>