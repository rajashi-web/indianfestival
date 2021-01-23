<?php
/*
 * File: tag.php
 * Description: template used to display theme category search results
 *
 * @package responsive-tabs
 *
 *
 */



get_header();

/* set up title for tag search */
$t = get_query_var('tag');

// set up parameters to be passed to ajax call as hidden value if not infinite sroll not disabled ( done in post-list.php)
global $responsive_tabs_infinite_scroll_ajax_parms;
$widget_parms = new Widget_Ajax_Parms ( 
	'non_widget_query', 			// widget_type
	$t,								// $include_string,
	'', 								// $exclude_string,
	2, 								// page 2 is second page; pagination is incremented after retrieval;
	'tag'								// $query_type
);
$responsive_tabs_infinite_scroll_ajax_parms = json_encode( $widget_parms );	

?><!-- responsive-tabs tag.php -->

<div id = "content-header">

	<?php get_template_part('breadcrumbs'); ?> 

 	<h1><?php echo __( 'Posts tagged', 'responsive-tabs' ) . ' "' . esc_html( $tag ); ?>"</h1>

</div> <!-- content-header -->   

<div id = "post-list-wrapper">

	<?php get_template_part( 'post', 'list' ); ?>
	
</div> <!-- post-list-wrapper-->
	
 <!-- empty bar to clear formatting -->
<div class="horbar-clear-fix"></div>

<?php get_footer();