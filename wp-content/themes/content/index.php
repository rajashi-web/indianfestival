<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 */
get_header(); ?>
 <!-- Page Title Section -->
		<section class="page-title-section">		
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
						   <?php					   
								echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>'.esc_html__( 'Home','content' ).'</h1></div>';
						   ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<?php
								echo '<ul class="page-breadcrumb wow bounceInRight animated" ata-wow-delay="0.4s">';
									$content_homelink = home_url('/');
								    echo '<li><a href="'.esc_url($content_homelink).'">'.esc_html__('Home','content').'</a></li>';
								 echo '</ul>'
							?>
						</div>
					</div>
				</div>	
			</div>
		</section>
		<div class="page-seperate"></div>
		<!-- /Page Title Section -->
 
 
<!-- Blog & Sidebar Section -->	
<div id="content">	
<section class="blog-section">
	<div class="container">
		<div class="row">
		<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?> col-sm-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'7' ); ?> col-xs-12">
			<div class="row site-content" id="blog-masonry">
				<?php 
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content. get_post_format
						echo '<div class="item">';
						get_template_part( 'content','');
						echo '</div>';
					endwhile;
				endif;
				
				?>	
			</div>
			<?php
			// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
			?>
		</div>
		
		<?php get_sidebar();?>
		
		</div>
	</div>
</section>
</div>
<!-- /Blog & Sidebar Section -->
<?php get_footer(); ?>