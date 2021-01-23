<?php
/**
 * Header template file.
 *
 * @package Meridia
 */

 if ( ! defined( 'ABSPATH' ) ) {
	 exit( 'Direct script access denied.' );
 }

$meridia_header_type_setting = get_theme_mod( 'meridia_header_type', 'header-type-1' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 	<?php meridia_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php meridia_head_bottom(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<?php wp_body_open(); ?>
	
	<?php meridia_preloader(); ?>

	<?php meridia_header_before(); ?>

	<?php
		switch ( $meridia_header_type_setting ) {
			case 'header-type-1':
				get_template_part( 'template-parts/header/header-1' );
				break;

			case 'header-type-2':
				get_template_part( 'template-parts/header/pro/header-2' );
				break;

			case 'header-type-3':
				get_template_part( 'template-parts/header/pro/header-3' );
				break;

			case 'header-type-4':
				get_template_part( 'template-parts/header/pro/header-4' );
				break;
			
			default:
				get_template_part( 'template-parts/header/header-1' );
				break;
		}		
	?>

	<?php meridia_header_after(); ?>

	<div id="site-content" class="main-wrapper">