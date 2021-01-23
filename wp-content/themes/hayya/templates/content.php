<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hayya
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_single() ) {
		get_template_part( 'templates/single' );
	} else {
		get_template_part( 'templates/posts' );
	}
	?>
</article><!-- #post-## -->
