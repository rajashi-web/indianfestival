<?php
/**
 * Extra functions for this theme.
 *
 * @package Concept Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function concept_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'concept_page_menu_args' );

/**
* Defines new blog excerpt length and link text.
*/
if (!is_admin()) {
function concept_new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'concept_new_excerpt_length');

function concept_new_excerpt_more($more) {
	global $post;
	return '<a class="more-link" href="'.esc_url(get_permalink($post->ID)) . '">'. esc_html__('Read More', 'concept-lite') .'<span>&#8594;</span></a>';
}
add_filter('excerpt_more', 'concept_new_excerpt_more');
}
/**
* Adds excerpt support for pages.
*/
add_post_type_support( 'page', 'excerpt');

/**
* Manages display of archive titles.
*/
function concept_get_the_archive_title( $title ) {
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( __( 'Y', 'concept-lite' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( __( 'F Y','concept-lite' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( __( 'F j, Y', 'concept-lite' ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'concept-lite' );
    }
    return $title;
};
add_filter( 'get_the_archive_title', 'concept_get_the_archive_title', 10, 1 );

// display custom admin notice
function concept_admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Thanks for installing Concept Lite! Want more features?','concept-lite'); ?> <a href="https://www.vivathemes.com/wordpress-theme/concept/" target="blank"><?php esc_html_e( 'Check out the Pro Version  &#8594;','concept-lite'); ?></a></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'concept_admin_notice__success' );