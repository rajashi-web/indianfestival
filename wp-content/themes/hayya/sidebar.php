<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */

if (! is_active_sidebar( 'footer-1' ) &&
	! is_active_sidebar( 'footer-2' ) &&
	! is_active_sidebar( 'footer-3' ) &&
	! is_active_sidebar( 'footer-4' )
	) {
	return;
}
?>
<div id="footer-sidebar">
	<aside id="secondary" class="widget-area container">
		<div class="row">
			<div class="col s3">
				<?php dynamic_sidebar( 'footer-1' );?>
			</div>
			<div class="col s3">
				<?php dynamic_sidebar( 'footer-2' );?>
			</div>
			<div class="col s3">
				<?php dynamic_sidebar( 'footer-3' );?>
			</div>
			<div class="col s3">
				<?php dynamic_sidebar( 'footer-4' );?>
			</div>
		</div>
	</aside><!-- #secondary -->
</div>
