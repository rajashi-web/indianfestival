<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rasti
 */
$rasti_lite_categories_list = get_the_category_list( esc_html__( ', ', 'rasti-lite' ) );
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="home_single_blog">
		<?php if(has_post_thumbnail()){?>
			<div class="post_img">	
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('rasti_lite_image_850_530', array('class' => 'img-responsive blog-photo', ));?>
				</a>	
			</div>
		
		<?php } ?>
		<div class="home_blog_text">
			<div class="post_meta">
				<?php if(is_sticky()){ ?>
					<span class="sticky_meta"><i class="ti-pin stiky_icon"></i> <?php esc_html_e('Sticky' , 'rasti-lite');?></span>
				<?php } ?>
				<span><i class="ti-timer"></i> <?php echo esc_html(get_the_time( get_option('date_format')));?></span>
				<span><i class="ti-user"></i> <?php esc_html_e('by' , 'rasti-lite');?> <?php rasti_author(); ?></span>
				<?php if($rasti_lite_categories_list){ ?>
				<span><i class="ti-files"></i> <?php echo rasti_wp_kses($rasti_lite_categories_list); ?></span>
				<?php } ?>
			</div>	
			<?php 
			
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); 
			
			?>

			<div class="entry-content">				
				<?php the_excerpt();?>
				<?php 
					
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rasti-lite' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
					
			<a class="blog_btn" href="<?php the_permalink();?>"><?php esc_html_e('Learn More' , 'rasti-lite');?></a>	
			
		</div>
	</div>
</article>