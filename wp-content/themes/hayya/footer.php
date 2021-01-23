<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since	  1.0.0
 * @package	hayya
 * @author	 zintaThemes <>
 */

?>
	</div><!-- #content -->

	<?php

	/**
	 * Call HayyaBuild function
	 */
	if ( !function_exists( 'hayyabuild' ) || !HayyaTheme::hayya_options( 'hayyabuild-footer' ) || false === hayyabuild() ) :
	?>

	<footer id="site-footer" class="site-footer page-footer first-color second-color-text">
		<?php
		if ( HayyaTheme::hayya_options( 'show-footer-widgets' ) ) {
			get_sidebar( 'footer' );
		}
		?>

		<?php
		if ( $footer_text = HayyaTheme::hayya_options( 'footer-text' ) ) : ?>
		<div id="footer-content" class="footer-content">
			<?php echo do_shortcode( $footer_text );?>
		</div>
		<?php endif;

		if ( HayyaTheme::hayya_options( 'show-copyright' ) && ( $footer_copyright_text = HayyaTheme::hayya_options( 'footer-copyright-text' ) ) ) :?>
			<div id="footer-copyright" class="footer-copyright">
			<?php $copyright_align = ( $copyright_alignment = HayyaTheme::hayya_options( 'copyright-alignment' ) ) ? $copyright_alignment . '-align' : ''; ?>
			<div class="container <?php echo esc_attr( $copyright_align ); ?>">
				<?php echo wp_kses_post( $footer_copyright_text ); ?>
			</div>
		</div>
		<?php endif;?>

	</footer>

	<?php

	endif;

	?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
