<?php 
/**
 * The template for displaying content page
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

<div id="post-<?php the_ID(); ?>" <?php post_class('items wid-100 mobwid-100'); ?> >
        <div class="items-inner dsply-fl fl-wrap">
            <div class="img-box dsply-fl fl-wrap wid-100 relative">
                <div class="img-wrap wid-39 mobwid-100">
            	<?php if ( has_post_thumbnail()) : ?>
            		<a href="<?php the_permalink(); ?>"  >
                		<?php the_post_thumbnail(); ?>
                	</a>
                <?php else: ?>
                    <a class="user-no-img-link" href="<?php the_permalink(); ?>"  >
                        <div class="user-no-img-items">
                            <div class="user-no-img-items-inner text-center">
                                <div class="">
                                    <?php esc_html_e( 'No Image', 'pose' ); ?> 
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>	
                </div>
                <div class="details-box wid-61 mobwid-100">
                    <div class="details-box-inner">
                        <div class="details-box-inner-title-header">
                            <h2>
                            	<a href="<?php the_permalink(); ?>"  >
                            		<?php the_title(); ?>
                            	</a>
                            </h2>
                            <span class="mg-rt-20 date"><?php the_time(get_option('date_format')); ?></span>
                            <span class="mg-rt-20 author"><?php the_author_posts_link(); ?></span>
                            <span class="comments"><a href="<?php comments_link(); ?>"> <?php comments_number(); ?> </a></span>
                        </div>
                        <h3><?php the_excerpt(__('Read more &raquo;', 'pose')); ?></h3>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="pose_link_pages">
            <?php wp_link_pages(); ?>
        </div>
</div>
