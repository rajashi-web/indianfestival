<?php
/**
 * rasti functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rasti
 */

if ( ! function_exists( 'rasti_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rasti_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rasti, use a find and replace
		 * to change 'rasti-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rasti-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-formats', array(
			'audio',
			'video',
		) );	
		
		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'rasti_image_850_530', 850,530, true );
		add_image_size( 'rasti_image_840_430', 840,430, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rasti-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		/*
		 * Set woocommerce support  
		 * 
		 */
		add_theme_support( 'woocommerce' );		

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rasti_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 80,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
	add_editor_style( array( 'assets/css/editor-style.css' , rasti_fonts_url()) );
endif;
add_action( 'after_setup_theme', 'rasti_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int
 */
function rasti_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rasti_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'rasti_lite_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rasti_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rasti-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rasti-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'rasti-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'rasti-lite' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 %2$s" id="%1$s"><div class="footer_single_sidebar">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3  class="wg_title">',
		'after_title'   => '</h3>',
	) );	
}
add_action( 'widgets_init', 'rasti_widgets_init' );

/*
Register Fonts
*/
function rasti_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'rasti-lite' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open Sans|PT Sans:400,400italic,700italic,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
} 

/**
 * Enqueue scripts and styles.
 */
function rasti_scripts() {
	
	// Load CSS Files
	wp_enqueue_style( 'rasti-fonts', rasti_fonts_url(), array(), '1.0.0' );	
	wp_enqueue_style('bootstrap' , get_template_directory_uri(). '/assets/css/bootstrap.css');	
	wp_enqueue_style('font-awesome' , get_template_directory_uri(). '/assets/fonts/font-awesome.css');		
	wp_enqueue_style('themify-icons' , get_template_directory_uri(). '/assets/fonts/themify-icons.css');	
	
	wp_enqueue_style('meanmenu' , get_template_directory_uri(). '/assets/css/meanmenu.css');	
	wp_enqueue_style('responsive' , get_template_directory_uri(). '/assets/css/responsive.css');	
	wp_enqueue_style('rasti-main-style' , get_template_directory_uri(). '/assets/css/style.css');	

	wp_enqueue_style( 'rasti-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '685972', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '685971', true );	
	wp_enqueue_script( 'scrolltopcontrol', get_template_directory_uri() . '/assets/js/scrolltopcontrol.js', array('jquery'), '685971', true );	
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array('jquery'), '685972', true );
	wp_enqueue_script( 'rasti-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '685971', true );
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rasti_scripts' );


function rasti_main_menu() {
		wp_nav_menu( array(
		'theme_location'    => 'menu-1',
		'depth'             => 5,
		'container'         => false,
		'menu_class'        => 'nav navbar-nav navbar-right',
		
		)
	); 	
}

function rasti_mobile_menu() {
		wp_nav_menu( array(
		'theme_location'    => 'menu-1',
		'depth'             => 5,
		'container'         => false,
		'menu_class'        => ' ',
		
		)
	); 	
}


// modify search widget
function rasti_my_search_form( $form ) {
	$form = '
		
			
			<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
				<div class="input-group">
					<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" class="form-control search_field" placeholder="' . esc_attr__('Enter Keyword ...' , 'rasti-lite') .'">
					<span class="input-group-btn">
						<button class="btn btn-default search_btn" type="submit"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			
		
        ';
	return $form;
}
add_filter( 'get_search_form', 'rasti_my_search_form' );

// comment list modify

function rasti_comments($comment, $args, $depth) {
   ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div class="single_comment">
		<div class="media">
			<div class="comment_avatar">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>

			<div class="media-body text-left comment_single">
				
				<h5 class="media-heading"><?php comment_author_link() ?></h5> 
				
				<div class="com_time"><?php echo esc_html(get_comment_date('F j, Y')); ?> <?php echo esc_html(get_comment_date('g:i')); ?></div> 
				
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','rasti-lite'); ?></em></p>
				<?php endif; ?>
				 <?php comment_text(); ?>	
				<div class="creply_link"> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>				 
			</div>
		</div>
	</div>				
</li>


<?php } 

// comment box title change
add_filter( 'comment_form_defaults', 'rasti_remove_comment_form_allowed_tags' );
function rasti_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	$defaults['comment_notes_before'] = '';
	return $defaults;

}

function rasti_comment_reform ($arg) {

$arg['title_reply'] = esc_html__('Write your comment Here','rasti-lite');
$arg['comment_field'] = '<div class="row"><div class="form-group col-md-12"><textarea id="comment" class="comment_field form-control" name="comment" cols="77" rows="3" placeholder="'. esc_attr__("Write your Comment", "rasti-lite").'" aria-required="true"></textarea></div></div>';


return $arg;

}
add_filter('comment_form_defaults','rasti_comment_reform');

// comment form modify

function rasti_modify_comment_form_fields($fields){
	$commenter = wp_get_current_commenter();
	$req	   = get_option( 'require_name_email' );

	$fields['author'] = '<div class="row"><div class="form-group col-md-4"><input type="text" name="author" id="author" value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. esc_attr__("Your Name *", "rasti-lite").'" size="22" tabindex="1"'. ( $req ? 'aria-required="true"' : '' ).' class="input-name form-control" /></div>';

	$fields['email'] = '<div class="form-group col-md-4"><input type="text" name="email" id="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'.esc_attr__("Your Email *", "rasti-lite").'" size="22" tabindex="2"'. ( $req ? 'aria-required="true"' : '' ).' class="input-email form-control"  /></div>';
	
	$fields['url'] = '<div class="form-group col-md-4"><input type="text" name="url" id="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. esc_attr__("Website", "rasti-lite").'" size="22" tabindex="2"'. ( $req ? 'aria-required="false"' : '' ).' class="input-url form-control"  /></div></div>';

	return $fields;
}
add_filter('comment_form_default_fields','rasti_modify_comment_form_fields');

function rasti_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'rasti_move_comment_field_to_bottom' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/rasti-functions.php';
require get_template_directory() . '/inc/about-theme.php';
require get_template_directory() . '/inc/trt-customizer-pro/class-customize.php';

if ( ! function_exists( 'rasti_readmore_content' ) ) :
/**
 * Prints readmore content
 */
function rasti_readmore_content($word) {
	echo wp_trim_words( get_the_content(), $word, '' );
}
endif;


function rasti_excerpt_length( $length ) {
    return 33;
}
add_filter( 'excerpt_length', 'rasti_excerpt_length', 999 );
