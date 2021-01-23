<?php
/**
 * The sidebar containing footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */

if (! is_active_sidebar( 'footer' ) &&
	! is_active_sidebar( 'footer-2' ) &&
	! is_active_sidebar( 'footer-3' ) &&
	! is_active_sidebar( 'footer-4' )
	) {
	return;
}

$j = 0;
for ( $i = 0; $i < 5; $i++ ) {
	$n = ( $i === 0 ) ? '' : '-' . $i;
	if ( is_active_sidebar( 'footer' . $n ) ) {
		$j++;
	}
}

$col = ( $j >= 1 && 4 >= $j ) ? 12 / $j : '4' ;

?>
<div id="footer-sidebar">
	<aside class="widget-area container">
		<div class="row">
			<?php
			for ( $i = 0; $i < 5; $i++ ) {
				$n = ( $i === 0 ) ? '' : '-' . $i;
				if ( is_active_sidebar( 'footer' . $n ) ) :?>
					<div class="col l<?php echo esc_attr( $col );?> m<?php echo esc_attr( $col );?> s12"><?php dynamic_sidebar( 'footer' . $n ); ?></div><?php
				endif;
			}
			?>
		</div>
	</aside>
</div>
