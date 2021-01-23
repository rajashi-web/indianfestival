<?php 
/**
 * The template for displaying widgets in the sidebar
 *
 * @version    0.0.36
 * @package    pose
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.com All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */

if ( is_active_sidebar( 'sidebar-widgets' ) ) {
	return;
}
?>
<aside class="mobwid-100 no-show-mob sidebar wid-30">
	<div class="sidebar-inner">
		<?php dynamic_sidebar('sidebar-widgets'); ?>
	</div>
</aside>