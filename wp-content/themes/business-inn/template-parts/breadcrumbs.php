<?php
/**
 * Breadcrumbs.
 *
 * @package Business_Inn
 */

// Bail if front page.
if ( is_front_page() || is_page_template( 'templates/home.php' ) ) {
	return;
}

$breadcrumb_type = business_inn_get_option( 'breadcrumb_type' );
if ( 'disable' === $breadcrumb_type ) {
	return;
}

if ( ! function_exists( 'business_inn_breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . '/assets/vendor/breadcrumbs/breadcrumbs.php';
}

$breadcrumb_class 	= 'bg_disabled';
$breadcrumbs_style 	= '';

// Custom image.
$image_url = get_header_image();

if( !empty( $image_url ) ){

	$breadcrumbs_style = 'style="background: url('.esc_url( $image_url ).') top center no-repeat; background-size: cover;"';

	$breadcrumb_class = 'bg_enabled';

}

?>

<div id="breadcrumb" class="<?php echo $breadcrumb_class; ?>" <?php echo $breadcrumbs_style; ?>>
	<div class="container">
		<?php
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		business_inn_breadcrumb_trail( $breadcrumb_args );
		?>
	</div><!-- .container -->
</div><!-- #breadcrumb -->
