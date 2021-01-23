<?php
function rasti_header(){ 
$rasti_custom_logo_id = get_theme_mod( 'custom_logo' );
$rasti_custom_logo = wp_get_attachment_image_src( $rasti_custom_logo_id , 'full' );

?>

<!-- START NAVBAR -->
<div class="navbar navbar-default navbar-fixed-top menu-top">
	<div class="container">
		<div class="navbar-header">   
			
		<?php if(get_custom_logo()){ ?>
		  
		   <a href="<?php echo esc_url(home_url('/'));?>" class="navbar-brand"><img src="<?php echo esc_url($rasti_custom_logo[0]);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
				<?php }else { ?>
			 <a href="<?php echo esc_url(home_url('/'));?>" class="navbar-brand"><h3><?php bloginfo( 'name' ); ?></h3></a>
		<?php } ?>	
	

		</div>
		
		<div class="menu_wrap">
			<nav id="navigation">
				<?php rasti_main_menu();?>
			</nav>		
			
			<div id="mobile_menu">
				<nav>
					<?php rasti_mobile_menu();?>
				</nav>			
			</div>			
		</div>			
	   
		
	</div><!--- END CONTAINER -->
</div> 
<!-- END NAVBAR -->	

<?php }


function rasti_bannerbg(){
	
	$rasti_banner_default_img = get_template_directory_uri() . '/assets/img/banner_bg.jpg';
	
	if(get_header_image()){
		header_image();
	}else{
		echo esc_url($rasti_banner_default_img);
	}
}

function rasti_blog_banner(){ 

?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;" >
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
			<h2 class="title_blog"><?php esc_html_e('Our Blog' , 'rasti-lite');?></h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a><?php esc_html_e(' Blog' , 'rasti-lite');?></p>
		</div>
	</div>
</div>
<?php }


function rasti_archive_banner(){ 

?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;" >
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
			<h2 class="title_blog"><?php esc_html_e('Archive' , 'rasti-lite');?></h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a><?php the_archive_title();?></p>		
		</div>
	</div>
</div>
<?php }


function rasti_single_banner(){ 


?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;" >
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
			<h2 class="title_blog">
				<?php the_title();?>				
			</h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a><?php the_title();?></p>				
		</div>
	</div>
</div>
<?php }


function rasti_404_banner(){ 

?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;">
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">	
			<h2 class="title_blog">		
				<?php esc_html_e('404 Page' , 'rasti-lite');?>				
			</h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a><?php esc_html_e('Page Not Found' , 'rasti-lite');?></p>				
		</div>
	</div>
</div>
<?php }


function rasti_search_banner(){ 


?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;" >
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">

			<h2 class="title_blog">		
				<?php esc_html_e('Search Results' , 'rasti-lite');?>				
			</h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a><?php printf( esc_html__( 'Search Results for: %s', 'rasti-lite' ), '' . get_search_query() . '' ); ?></p>				
		</div>
	</div>
</div>
<?php }


function rasti_shop_banner(){ 

?>
<div class="main_banner_area banner_image" style="background: url(<?php rasti_bannerbg(); ?>) no-repeat;background-size:cover;  background-position: center center;background-attachment:fixed;" >
	<div class="container">
		<div class="bannar_padding text-center" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
			<h2 class="title_blog">
				
				<?php 
					if(is_shop()){						
						esc_html_e('Shop' ,'rasti-lite');
					}else{
						the_title();
					}
				
				?>				
			</h2>
			<p><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Home - ' , 'rasti-lite');?></a>
				<?php 
				
					if(is_shop()){						
						esc_html_e('Shop' ,'rasti-lite');
					}else{
						the_title();
					}
				?>
			</p>				
		</div>
	</div>
</div>
<?php }

function rasti_footer(){

if(is_active_sidebar('sidebar-2')){	
?>

<!-- START FOOTER -->
<div class="footer_top">
	<div class="container">
		<div class="row">		
			<?php dynamic_sidebar( 'sidebar-2' ); ?>		
		</div><!--- END ROW -->
	</div><!--- END CONTAINER -->	
</div>
<!-- END FOOTER -->		
<?php } ?>


<!-- START FOOTER -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="footer_content">				
					<p><?php echo rasti_wp_kses('Copyright &copy; 2019 Rasti Lite, All rights Reserved.<br>Created by <a href="https://themesvila.com/">Themesvila</a>');?></p>			
				</div>
										
			</div><!--- END COL -->
		</div><!--- END ROW -->
	</div><!--- END CONTAINER -->	
</footer>
<!-- END FOOTER -->		
<?php }

function rasti_social_share_button(){

	$permalink = get_permalink(get_the_ID());
	$title = get_the_title();			
	?>
	
	<div class="social_share_button">
		<span class="pull-left"><?php esc_html_e('Share This Post' , 'rasti-lite');?></span>
		<ul class="list-inline">
			<li><a class="facebook" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink) ;?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink) ;?>"><i class="fa fa-facebook"></i></a></li>
			<li><a class="twitter" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink) ;?>&amp;text=<?php echo esc_attr($title) ;?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink) ;?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>"><i class="fa fa-twitter"></i></a></li>
			<li><a class="google-plus" onClick="window.open('https://plus.google.com/share?url=<?php echo esc_url($permalink) ;?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo esc_url($permalink) ;?>"><i class="fa fa-google-plus"></i></a></li>
			<li><a class="pinterest" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fa fa-pinterest"></i></a></li>
		</ul>
	</div>	
	
<?php			
}

function rasti_social_share_option(){
	rasti_social_share_button();

}