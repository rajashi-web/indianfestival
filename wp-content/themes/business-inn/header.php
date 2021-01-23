<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Inn
 */

?>
<?php
	/**
	 * Hook - business_inn_doctype.
	 *
	 * @hooked business_inn_doctype_action - 10
	 */
	do_action( 'business_inn_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - business_inn_head.
	 *
	 * @hooked business_inn_head_action - 10
	 */
	do_action( 'business_inn_head' );
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
	wp_body_open();
} ?>
	<div id="page" class="site">
		<?php
		/**
		 * Hook - business_inn_top_header.
		 *
		 * @hooked business_inn_top_header_action - 10
		 */
		do_action( 'business_inn_top_header' );

		/**
		* Hook - winsone_before_header.
		*
		* @hooked business_inn_before_header_action - 10
		*/
		do_action( 'business_inn_before_header' );

		/**
		* Hook - business_inn_header.
		*
		* @hooked business_inn_header_action - 10
		*/
		do_action( 'business_inn_header' );

		/**
		* Hook - business_inn_nav.
		*
		* @hooked business_inn_nav_action - 10
		*/
		do_action( 'business_inn_nav' );

		/**
		* Hook - business_inn_after_header.
		*
		* @hooked business_inn_after_header_action - 10
		*/
		do_action( 'business_inn_after_header' );

		/**
		* Hook - business_inn_main_content.
		*
		* @hooked business_inn_main_content_for_slider - 5
		* @hooked business_inn_main_content_for_breadcrumb - 7
		* @hooked business_inn_main_content_for_home_widgets - 9
		*/
		do_action( 'business_inn_main_content' );

		/**
		* Hook - business_inn_before_content.
		*
		* @hooked business_inn_before_content_action - 10
		*/
		do_action( 'business_inn_before_content' );