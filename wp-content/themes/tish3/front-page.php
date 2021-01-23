<?php
/**
 * Site Front Page
 *
 * This is a traditional static HTML site model with a fixed front page and
 * content placed in Pages, rarely if ever using posts, categories, or tags. 
 *
 * @link https://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 */

/**
 * If front page is set to display the blog posts index, include home.php;
 * otherwise, display static front page content
 */
if ( 'posts' == get_option( 'show_on_front' ) ) :

    get_template_part( 'home' );

else :

	get_header();
?>
	<?php get_sidebar('home'); ?>

 	<div class="clear">
	</div><!-- .clear -->

<?php

	get_footer();

endif; ?>
