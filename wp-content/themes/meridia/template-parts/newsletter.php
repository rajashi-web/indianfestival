<?php
/**
 * Newsletter
 *
 * @package 	Meridia
 * @since 		Meridia 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! is_active_sidebar( 'meridia-below-featured-area' ) ) {
	return;
} ?>

<div class="newsletter-area">
	<div class="container">
		<?php dynamic_sidebar( 'meridia-below-featured-area' ); ?>
	</div>
</div>