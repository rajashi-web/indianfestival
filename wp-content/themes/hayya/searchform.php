<?php
/**
 *
 * @since      1.0.0
 * @package    hayya
 * @author     zintaThemes <>
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) );

?>

<form method="get" role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input id="<?php echo esc_attr( $unique_id ); ?>" type="text" value="<?php the_search_query(); ?>" name="s" class="s" placeholder="<?php esc_attr_e( 'Search', 'hayya' ); ?>"/>
	<button type="submit" class="button" >
		<i class="fa fa-search"></i>
	</button>
</form>
