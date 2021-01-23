<?php
/**
 *
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }


class HayyaThemePosts
{

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function __construct() {} // End __construct()

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function posts() {}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function pagination() {
		global $wp_query;
		$max_pages = $wp_query->max_num_pages;

		if( get_option('permalink_structure') ) {
			 $format = '&paged=%#%';
		} else {
			 $format = 'page/%#%/';
		}

		$pages = paginate_links( array(
			// 'base' 				=> str_replace( $max_pages, '%#%', esc_url( get_pagenum_link( $max_pages ) ) ),
			'base' 				=> user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ),
			'format' 			=> $format,
			'current' 			=> max( 1, get_query_var('paged') ),
			'show_all'		   => false,
			'end_size'		   => 2,
			'mid_size'		   => 2,
			'prev_next'		  => false,
			'type'			   => 'array',
			'add_args'		   => true,
			'before_page_number' => '',
			'after_page_number'  => ''
		) );
		// print_r($pages);
		if ( is_array($pages) && ! empty($pages) ) {
			if ( ! is_rtl() ) {
				$chevron1 = '<i class="fa fa-angle-left"></i>';
				$chevron2 = '<i class="fa fa-angle-right"></i>';
			}  else {
				$chevron1 = '<i class="fa fa-angle-right"></i>';
				$chevron2 = '<i class="fa fa-angle-left"></i>';
			}
			echo '<div class="center">';
			echo '<ul class="pagination">';
			echo ( $previous = get_previous_posts_link( $chevron1 ) ) ? '<li class="prev waves-effect">'.wp_kses_post($previous).'</li>' : '<li class="prev disabled">' . wp_kses_post( $chevron1 ) . '</li>';
			echo '<li class=" pages"><ul>';
			foreach( $pages as $k => $v ) {
				echo '<li class="waves-effect">' . wp_kses_post($v) . '</li>';
			}
			echo '</li></ul>';
			echo ( $next = get_next_posts_link( $chevron2 ) ) ? '<li class="next waves-effect">'.wp_kses_post($next).'</li>' : '<li class="next disabled">' . wp_kses_post( $chevron2 ) . '</li>';
			echo '</ul>';
			echo '</div>';
		}
	}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function post_links() {
		$previous 	= get_previous_post_link( '%link', '%title' );
		$next 		= get_next_post_link( '%link', '%title' );
		echo '<div id="post_links">';
		if ( $previous ) echo '<div class="previous">'.wp_kses_post($previous).'</div>';
		if ( $next ) echo '<div class="next">'.wp_kses_post($next).'</div>';
		echo '</div>';
	}


	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function related_posts() {
		global $post;

		$tags = wp_get_post_tags($post->ID);

		if ($tags) {
			$tag_ids = array();

			foreach($tags as $individual_tag) {
				$tag_ids[] = $individual_tag->term_id;
			}
			self::post_content([
				'tag__in' 				=> $tag_ids,
				'post__not_in' 			=> [ $post->ID ],
				'posts_per_page'		=> 4,
				'ignore_sticky_posts'	=> 1
			], 'related_articles' );
		}
		wp_reset_postdata();
	}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function author_posts() {
		global $post;

		$author = get_the_author_meta( 'ID' );

		if ( ! empty($author) ) {
			self::post_content([
				'author' 				=> $author,
				'post__not_in' 			=> [ $post->ID ],
				'posts_per_page'		=> 4,
				'ignore_sticky_posts'	=> 1
			], 'more_from_author' );
		}
		wp_reset_postdata();
	}

	/**
	 * Posts a content.
	 */
	private static function post_content( $args = [], $id = '' ) {
		if ( empty($args) ) {
			return;
		}
		$my_query = new wp_query( $args );

		if( $my_query->have_posts() ) {
			echo '<div id="' . $id . '" class="tabs__content__body related_post active"><div class="row">';
			while( $my_query->have_posts() ) {
				$my_query->the_post();
				?>
				<div class="col s3 m3 l3">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title(); ?>" class="related-post-link">
						<span class="related-post-thumbnail">
						<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'thumbnail' );
						else : ?>
							<img src="<?php echo esc_url( HayyaTheme::hayya_options( 'default-slider-image' ) ); ?>" class="attachment-thumbnail size-thumbnail wp-post-image default-slider-image" alt="<?php the_title();?>" width="150" height="150" />
						<?php
						endif;
						?>
						</span>
						<?php
						the_title( '<span class="related-post-title">', '</span>' );
						?>
					</a>
				</div>
				<?php
			}
			echo '</div></div>';
		}
	}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function media_gallery() {
		global $post;

		$cats = wp_get_post_categories($post->ID);

		if ($cats) {
			$cat_ids = array();

			foreach($cats as $individual_cat) {
				$cat_ids[] = $individual_cat;
			}

			$args = array(
				'category__and' 				=> $cat_ids,
				'post__not_in' 			=> array($post->ID),
				'posts_per_page'		=> 100,
				'ignore_sticky_posts'	=> 1
			);

			$my_query = new wp_query( $args );

			if( $my_query->have_posts() ) {
				while( $my_query->have_posts() ) {
					$my_query->the_post();
					?>
					<div class="col s6 m4 l3">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php

							$youtube_image = get_post_meta($post->ID, 'youtube-image', true);

							if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'thumbnail' );
							elseif ( $youtube_image ) :
								?><img src="https://img.youtube.com/vi/<?php echo esc_attr($youtube_image);?>/hqdefault.jpg" alt="<?php the_title();?>" class="hayya-youtube-image attachment-thumbnail size-thumbnail wp-post-image default-slider-image"/><?php
							else :
								?><img src="<?php echo esc_url( HayyaTheme::hayya_options( 'default-slider-image' ) ); ?>" class="attachment-thumbnail size-thumbnail wp-post-image default-slider-image" alt="<?php the_title();?>" width="150" height="150" /><?php
							endif;
							?>
						</a>
						<?php
						the_title( '<span class="post-title">', '</span>' );
						?>
					</div>
					<?php
				}
			}
		}
		wp_reset_postdata();
	}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function author_card( $id = null ) {
		$author = get_the_author_meta();
		if ( null === $id ) $id = get_the_author_meta( 'ID' );
		$author_url = get_author_posts_url( $id, get_the_author_meta( 'user_nicename' ) );
		?>

		<div class="author-card">
			<div class="author-card__image">
				<?php echo get_avatar(get_the_author_meta('user_email')); ?>
			</div>
			<div class="author-card__content">
				<h3>
					<a href="<?php echo esc_url($author_url);?>"><?php the_author_meta('display_name');?></a>
					<a href="<?php echo esc_url($author_url);?>" class="first-color-text">
						<span class="new badge"  data-badge-caption="<?php esc_attr_e('Posts', 'hayya'); ?>">
							<?php the_author_posts(); ?>
						</span>
					</a>
				</h3>
				<p>
					<?php the_author_meta('description');?>
				</p>
			</div>
		</div>
		<?php
	}
}
