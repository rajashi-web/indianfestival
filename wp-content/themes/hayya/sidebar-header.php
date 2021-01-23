<?php
/**
 * The sidebar containing header widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */


if (! is_active_sidebar( 'header' ) &&
	! is_active_sidebar( 'header-2' ) &&
	! is_active_sidebar( 'header-3' ) &&
	! is_active_sidebar( 'header-4' )
	) {
	return;
}
?>
<div id="header-sidebar">
	<aside class="widget-area container">
		<div class="row">
			<div class="col m3">
				<?php dynamic_sidebar( 'header' );?>
			</div>
			<div class="col m3">
				<?php dynamic_sidebar( 'header-2' );?>
			</div>
			<div class="col m3">
				<?php dynamic_sidebar( 'header-3' );?>
			</div>
			<div class="col m3">
				<?php dynamic_sidebar( 'header-4' );?>
			</div>
		</div>
	</aside><!-- #secondary -->
</div>
