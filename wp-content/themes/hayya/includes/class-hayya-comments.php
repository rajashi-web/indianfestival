<?php
/**
 *
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 *
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }


class HayyaThemeComments
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
	public static function pagination() {
		global $wp_query;
		$max_pages = $wp_query->max_num_pages;

		if( get_option('permalink_structure') ) {
			 $format = '&paged=%#%';
		} else {
			 $format = 'page/%#%/';
		}

		$pages = paginate_comments_links( array(
			// 'base' 				=> str_replace( $max_pages, '%#%', esc_url( get_pagenum_link( $max_pages ) ) ),
			// 'base' 				=> user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ),
			// 'format' 			=> $format,
			// 'current' 			=> max( 1, get_query_var('paged') ),
			// 'show_all'		   => false,
			// 'end_size'		   => 2,
			// 'mid_size'		   => 2,
			'prev_next'		  => false,
			'type'			   => 'array',
			// 'add_args'		   => true,
			// 'before_page_number' => '',
			// 'after_page_number'  => '',
			'echo' 				=> false,
		) );
		// print_r($pages);
		if ( is_array( $pages ) && ! empty( $pages ) ) {
			if ( ! is_rtl() ) {
				$chevron1 = '<i class="fa fa-angle-left"></i>';
				$chevron2 = '<i class="fa fa-angle-right"></i>';
			}  else {
				$chevron1 = '<i class="fa fa-angle-right"></i>';
				$chevron2 = '<i class="fa fa-angle-left"></i>';
			}
			echo '<div class="center">';
			// echo '<hr/>';
			echo '<ul class="pagination">';
			echo ( $previous = get_previous_comments_link( $chevron1 ) ) ? '<li class="prev waves-effect">' . wp_kses_post( $previous ) . '</li>' : '<li class="prev disabled">' . wp_kses_post( $chevron1 ) . '</li>';
			echo '<li class=" pages"><ul>';
			foreach( $pages as $k => $v ) {
				echo '<li class="waves-effect">' . wp_kses_post( $v ) . '</li>';
			}
			echo '</li></ul>';
			echo ( $next = get_next_comments_link( $chevron2 ) ) ? '<li class="next waves-effect">' . wp_kses_post( $next ).'</li>' : '<li class="next disabled">' . wp_kses_post( $chevron2 ) . '</li>';
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
	public static function comments( $args = null, $args2 = null, $args3 = null ) {
		if ( null === $args ) {
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			$fields = array(
			'author' =>
				'<div class="input-field">
					<i class="fa fa-user"></i>
					<input placeholder="" id="author" name="author" type="text" class="validate" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' required/>
					<label for="author">
						' . __( 'Name', 'hayya' ) .
						( $req ? ' <span class="required">*</span>' : '' ) . '
					</label>
				</div>',

			'email' =>
				'<div class="input-field">
					<i class="fa fa-at"></i>
					<input placeholder="" id="email" name="email" type="email" class="validate" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' required/>
					<label for="email">
						' . __( 'Email', 'hayya' ) .
						( $req ? ' <span class="required">*</span>' : '' ) . '
					</label>
				</div>',
			'url' =>
				'<div class="input-field">
					<i class="fa fa-laptop"></i>
					<input placeholder="" id="url" name="url" type="url" class="validate" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"/>
					<label for="url">' . __( 'Website', 'hayya' ) . '</label>
				</div>',
			);

			$comment_field =
				'<div class="input-field">
					<i class="fa fa-comment"></i>
					<textarea placeholder="" id="comment" name="comment" cols="45" rows="8" aria-required="true" class="validate materialize-textarea" required></textarea>
					<label for="comment">' .
					__( 'Comment', 'hayya' ) . '
						<span class="required">*</span>
					</label>
				</div>';

			$args = array(
				'fields' => $fields,
				'comment_field' => $comment_field,
				'class_submit' => 'button upper',
			);

			add_filter( 'comment_form_fields', function( $fields ) {
		    $comment_field = $fields['comment'];
		    $cookies_field = $fields['cookies'];
		    unset( $fields['comment'] );
		    unset( $fields['cookies'] );
		    $fields['comment'] = $comment_field;
		    $fields['cookies'] = $cookies_field;
		    return $fields;
			});

			return comment_form( $args );

		} else {

			$comment_link = get_comment_link();
			$date = get_comment_date();
			$time = get_comment_time();

			$comment_approved = ( $args->comment_approved == '0' ) ? '<div class="center-align"><em>' . __( 'Your comment is awaiting moderation.', 'hayya' ) . '</em></div>' : '';

			$edit_comment = ( get_edit_comment_link() ) ? '<span class="edit-link"><a class="comment-edit-link" href="' . get_edit_comment_link() . '">' . __('Edit', 'hayya') . '</a></span>' : '';

			global $comment_depth;

			$depth = ( $comment_depth > 1 ) ? $comment_depth : '1';

			$comment_class = get_comment_class();

			$classes = '';
			if ( ! empty( $comment_class ) ) {
				foreach ( $comment_class as $key => $value ) {
					$classes .= ' ' . $value;
				}
			}

			echo '
				<div id="comment-' . esc_attr( $args->comment_ID ) . '" class="' . esc_attr( $classes ) . '">
					<article id="article-comment-' . esc_attr( $args->comment_ID ) . '" class="comment-body">
						<footer class="comment-meta">
							<div class="comment-author vcard">
								' . get_avatar( $args->comment_author_email , '40' ) . '
							</div><!-- .comment-author -->
							<div class="comment-metadata">
								<div class="fn">
									' . esc_attr( $args->comment_author ) . '
									<span class="says">' . esc_html__( 'says', 'hayya' ) . ':</span>
								</div>
								<div>
									<a href="' . esc_url( $comment_link ) . '">
										<time datetime="' . esc_html(get_comment_date()) . ' ' . esc_html(get_comment_time()) . '">
											' . esc_html(get_comment_date()) . ' ' . esc_html__( 'at',  'hayya' ) . ' ' . get_comment_time() . '
										</time>
									</a>
									' . wp_kses_post($edit_comment) . '
								</div>
							</div><!-- .comment-metadata -->
						</footer><!-- .comment-meta -->
						<div class="comment-content">
							' . wp_kses_post( $comment_approved ) . '
							<p>
								' . wp_kses_post( $args->comment_content ) . '
								' . wp_kses_post(
											get_comment_reply_link( [
												'depth'	 => $depth,
												'max_depth' => 7,
											] )
										) . '
							</p>
						</div><!-- .comment-content -->
					</article><!-- .comment-body -->
				</div><!-- #comment-## -->';
		}
	} // End comments().
}
