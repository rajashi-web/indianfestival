<?php
/**
 * @since	  1.0.0
 * @package	hayya
 * @subpackage hayya/includes
 * @author	 zintaThemes <>
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }


class HayyaThemeWidgets
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
	public static function right_sidebar( $start = null ) {
		if ( is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'sticky-sidebar' ) ) {
			if ( is_single() && ! HayyaTheme::hayya_options('show-single-sidebar') ) return;
			if ( null != $start ) { ?>
				<div class="row">
					<div id="left-content" class="col l9 m12 s12"> <?php
			} else { ?>
					</div>
					<div id="right-content" class="col l3 m12 s12">
						<div id="right-sidebar-container">
							<?php dynamic_sidebar( 'right-sidebar' );?>
						</div>
						<?php if ( is_active_sidebar( 'sticky-sidebar' ) ) : ?>
							<div id="sticky-sidebar-container">
								<?php dynamic_sidebar( 'sticky-sidebar' );?>
							</div>
						<?php endif;?>
					</div>
				</div> <?php
			}
		}
	}

	/**
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function Widgets() {
		// Right Sidebars
		register_sidebar( array(
			'name'		  	=> esc_html__( 'Right Sidebar', 'hayya' ),
			'id'			=> 'right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'hayya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		) );
		register_sidebar( array(
			'name'		  	=> esc_html__( 'Sticky Sidebar', 'hayya' ),
			'id'			=> 'sticky-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'hayya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		) );

		// Footer Sidebars
		register_sidebars( 4, array(
			 /* The %s will be replaced with the number of Footer */
			'name'		  	=> _x( 'Footer %d', 'the %s will be replaced with the number of Footer', 'hayya' ),
			'id'			=> 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'hayya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		) );

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'		  	=> esc_html__( 'Shop', 'hayya' ),
				'id'			=> 'shop',
				'description'   => esc_html__( 'Add widgets here.', 'hayya' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
				'after_title'   => '</h4></div>',
			) );

			register_sidebar( array(
				'name'		  	=> esc_html__( 'Sticky Shop', 'hayya' ),
				'id'			=> 'sticky-shop',
				'description'   => esc_html__( 'Add widgets here.', 'hayya' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
				'after_title'   => '</h4></div>',
			) );
		}

	}
}
