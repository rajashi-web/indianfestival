<?php
/*
 * File: category.php
 * Description: template used to display theme category search results
 *
 * @package responsive-tabs
 *
 *
 */



get_header();
?>
<!-- responsive-tabs category.php -->

<div id = "content-header">  
	
	<?php get_template_part( 'breadcrumbs' ); ?> 
   
   <h1><?php single_cat_title(); ?></h1> 

 	<h4><?php  
 	
 	
 		// parameters to be passed to ajax call as hidden value if not infinite sroll not disabled ( done in post-list.php)
		global $responsive_tabs_infinite_scroll_ajax_parms;
		$widget_parms = new Widget_Ajax_Parms ( 
			'non_widget_query', 	// widget_type
			$cat, 					// $include_string,
			'', 						// $exclude_string,
			2, 						// page 2 is second page; pagination is incremented after retrieval;
			'cat'						// $query_type
		);
		$responsive_tabs_infinite_scroll_ajax_parms = json_encode( $widget_parms );	

		// category query header output
		$subargs = array(
		  'orderby'		=> 'name',
		  'order' 		=> 'ASC',
	     'hide_empty' => 0,
		  'parent' 		=> $cat, 
		);	 
		$subcategories = get_categories( $subargs );
		if ( $subcategories ) {		
			$sc_count = 0;		 
			foreach( $subcategories as $subcategory ) {
			 	  if ( $sc_count > 0 ) {
			 	  		echo ', ';
			 	  } 
		        echo '<a href="' . get_category_link( $subcategory->term_id ) . '" 
		        title="' . sprintf( esc_attr__( "View all posts in %s", 'responsive-tabs' ), $subcategory->name ) . '" ' . '>' . esc_html( strtolower( $subcategory->name ) ).'</a>';
			 	  $sc_count = $sc_count + 1; 
			}		
		} ?>
	</h4>
	
</div> <!-- content-header -->   

<div id = "post-list-wrapper">
	
	<?php get_template_part( 'post', 'list' ); ?>
	
</div> <!-- post-list-wrapper-->
	
 <!-- empty bar to clear formatting -->
<div class="horbar-clear-fix"></div>

<?php get_footer();