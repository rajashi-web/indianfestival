<?php
/**
 * Separator custom control
 *
 * @package WordPress
 * @subpackage inc/customizer
 * @version 1.1.0
 * @author  Denis Žoljom <http://madebydenis.com/>
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link https://github.com/dingo-d/wordpress-theme-customizer-extra-custom-controls
 * @since  1.0.0
 */
if( ! class_exists( 'Masonry_Blog_Separator_Control' ) ) {
	
	class Masonry_Blog_Separator_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'separator';
		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			?>
			<p><hr></p>
			<?php
		}
	}
}