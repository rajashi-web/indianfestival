<?php 
/**
 * The template for displaying index page
 *
 * @version    0.0.36
 * @package    pose
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */
?>

<?php get_header(); ?>

	


<?php

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );


if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'index' ) ) {

?>

<div id="content" class="page-content">

	<div class="flowid pose-index ">

		<div class="pose-show dsply-fl fl-wrap">
			<?php $pose_index_blog_posts = new WP_Query( array( 'posts_per_page' => 2, 'paged' => $paged ) );

                        if ( $pose_index_blog_posts->have_posts() ) : while ( $pose_index_blog_posts->have_posts() ) : $pose_index_blog_posts->the_post(); ?>

                        <div class="wid-50 mobwid-100 pose-show-items relative">
	                        	<?php if ( has_post_thumbnail()) : ?>
				                <a href="<?php the_permalink(); ?>"  >
				                    <?php the_post_thumbnail(); ?>
				                </a>
				                <?php else: ?>
				                	<a href="<?php the_permalink(); ?>"  >
					                    <div class="user-no-img-items">
					                        <div class="user-no-img-items-inner text-center">
					                            <div class=""><?php esc_html_e( 'No Image', 'pose' ); ?></div>
					                        </div>
					                    </div>
				                	</a>
				                <?php endif; ?>
					            <div class="pose-show-items-content">
					                <div class="date"><?php the_time(get_option('date_format')); ?></div>
					                <h5><a href="<?php the_permalink(); ?>"  >
					                        <?php the_title(); ?>
					                    </a>
					                </h5>
					                <p><a class="excerpt" href="<?php the_permalink(); ?>"><?php the_excerpt(__('Read more &raquo;', 'pose')); ?></a></p>
					            </div>
					        
                        </div>

				<?php endwhile; else : ?>
				<h2><?php esc_html__('No posts Found!', 'pose'); ?></h2>

				<?php wp_reset_postdata(); ?>
				
				<?php endif; ?>	
		</div>

	    <div class="mg-auto wid-90 mobwid-90">
	        
	        <div class="inner dsply-fl fl-wrap">
	            
	            <div class="wid-70 mobwid-100 blog-2-col-inner">
	            	
	                <div class="mg-tp jc-sp-btw dsply-fl fl-wrap">
	                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

	                	<?php get_template_part('content', get_post_format());  ?>
	                	 
	                	
	                    <?php endwhile; else : ?>
						<h2><?php esc_html__('No posts Found!', 'pose'); ?></h2>
	                    <?php endif; ?>

	                </div>
	                <ul class="pagination flowid">
					   <?php the_posts_pagination(); ?>
					</ul>
	            </div>
	            <?php get_sidebar(); ?>

	        </div>
	    </div>
	</div>
</div>

<?php } ?>


<?php get_footer(); ?>