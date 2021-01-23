<?php
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Color Control class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Control
 */

if( ! class_exists('HayyaFonts') && class_exists( 'WP_Customize_Control' ) ):

	class HayyaFonts extends WP_Customize_Control {


		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'font';

		/**
		 *
		 * @var string
		 */
		public $fonts = array();

		/**
		 * Enqueue scripts/styles for the color picker.
		 *
		 * @since 3.4.0
		 */
		public function enqueue() {
			$theme = wp_get_theme('hayya');
			wp_enqueue_script(
				'chosen',
				get_template_directory_uri() . '/includes/extensions/google-fonts/assets/chosen.jquery.min.js',
				array('jquery'),
				$theme->get( 'Version' ),
				true
			);
			wp_enqueue_script(
				'hayya-fonts',
				get_template_directory_uri() . '/includes/extensions/google-fonts/assets/hayya-fonts.min.js',
				array('chosen'),
				$theme->get( 'Version' ),
				true
			);

			wp_enqueue_style(
				'chosen',
				get_template_directory_uri() . '/includes/extensions/google-fonts/assets/chosen.min.css',
				array(),
				$theme->get( 'Version' )
			);
			wp_enqueue_style(
				'hayya-fonts',
				get_template_directory_uri() . '/includes/extensions/google-fonts/assets/hayya-fonts.min.css',
				array('chosen'),
				$theme->get( 'Version' )
			);
		}

		/**
		 * Don't render the control content from PHP, as it's rendered via JS on load.
		 *
		 * @since 3.4.0
		 */
		public function render_content() {
			?>
			<div style="padding-bottom: 100px;">
				<strong><?php echo esc_html( $this->label ); ?></strong>
				<hr/>
				<div class="hayya-fonts">

					<div>
						<label for="body-font"><?php esc_html_e('Body Font', 'hayya') ?></label>
						<select name="body-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('body-font-link'); ?>>
							<?php $this->font_options( $this->value('body-font-link') ); ?>
						</select>
						<label for="body-size"><?php esc_html_e('Body Font Size', 'hayya') ?></label>
						<input type="range" name="body-size" value="<?php echo esc_attr($this->value('body-size-link')); ?>" <?php $this->link('body-size-link'); ?> min="0.8" max="2" step="0.01" class="range-slide" />
						<div id="body-size-value" class="range-value"><?php echo esc_html($this->value('body-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h1-font"><?php esc_html_e('H1 Font', 'hayya') ?></label>
						<select name="h1-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h1-font-link'); ?>>
							<?php $this->font_options( $this->value('h1-font-link') ); ?>
						</select>
						<label for="h1-size"><?php esc_html_e('H1 Font Size', 'hayya') ?></label>
						<input type="range" id="h1-size" name="h1-size" value="<?php echo esc_attr($this->value('h1-size-link')); ?>" <?php $this->link('h1-size-link'); ?> min="1" max="6" step="0.01" class="range-slide" />
						<div id="h1-size-value" class="range-value"><?php echo esc_html($this->value('h1-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h2-font"><?php esc_html_e('H2 Font', 'hayya') ?></label>
						<select name="h2-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h2-font-link'); ?>>
							<?php $this->font_options( $this->value('h2-fon-linkt') ); ?>
						</select>
						<label for="h2-size"><?php esc_html_e('H2 Font Size', 'hayya') ?></label>
						<input type="range" name="h2-size" value="<?php echo esc_attr($this->value('h2-size-link')); ?>" <?php $this->link('h2-size-link'); ?> min="0.5" max="5" step="0.01" class="range-slide" />
						<div id="h2-size-value" class="range-value"><?php echo esc_html($this->value('h2-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h3-font"><?php esc_html_e('H3 Font', 'hayya') ?></label>
						<select name="h3-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h3-font-link'); ?>>
							<?php $this->font_options( $this->value('h3-font-link') ); ?>
						</select>
						<label for="h3-size"><?php esc_html_e('H3 Font Size', 'hayya') ?></label>
						<input type="range" name="h3-size" value="<?php echo esc_attr($this->value('h3-size-link')); ?>" <?php $this->link('h3-size-link'); ?> min="0.5" max="4" step="0.01" class="range-slide" />
						<div id="h3-size-value" class="range-value"><?php echo esc_html($this->value('h3-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h4-font"><?php esc_html_e('H4 Font', 'hayya') ?></label>
						<select name="h4-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h4-font-link'); ?>>
							<?php $this->font_options( $this->value('h4-font-link') ); ?>
						</select>
						<label for="h4-size"><?php esc_html_e('H4 Font Size', 'hayya') ?></label>
						<input type="range" name="h4-size" value="<?php echo esc_attr($this->value('h4-size-link')); ?>" <?php $this->link('h4-size-link'); ?> min="0.4" max="4" step="0.01" class="range-slide" />
						<div id="h4-size-value" class="range-value"><?php echo esc_html($this->value('h4-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h5-font"><?php esc_html_e('H5 Font', 'hayya') ?></label>
						<select name="h5-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h5-font-link'); ?>>
							<?php $this->font_options( $this->value('h5-font-link') ); ?>
						</select>
						<label for="h5-size"><?php esc_html_e('H5 Font Size', 'hayya') ?></label>
						<input type="range" name="h5-size" value="<?php echo esc_attr($this->value('h5-size-link')); ?>" <?php $this->link('h5-size-link'); ?> min="0.3" max="4" step="0.01" class="range-slide" />
						<div id="h5-size-value" class="range-value"><?php echo esc_html($this->value('h5-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="h6-font"><?php esc_html_e('H6 Font', 'hayya') ?></label>
						<select name="h6-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('h6-font-link'); ?>>
							<?php $this->font_options( $this->value('h6-font-link') ); ?>
						</select>
						<label for="h6-size"><?php esc_html_e('H6 Font Size', 'hayya') ?></label>
						<input type="range" name="h6-size" value="<?php echo esc_attr($this->value('h6-size-link')); ?>" <?php $this->link('h6-size-link'); ?> min="0.3" max="4" step="0.01"  class="range-slide" />
						<div id="h6-size-value" class="range-value"><?php echo esc_html( $this->value('h6-size-link') ); ?>rem</div>
					</div>

					<hr/>

					<div>
						<label for="smaller-font"><?php esc_html_e('Smaller Font', 'hayya') ?></label>
						<select name="smaller-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('smaller-font-link'); ?>>
							<?php $this->font_options( $this->value('smaller-font-link') ); ?>
						</select>
						<label for="smaller-size"><?php esc_html_e('Smaller Font Size', 'hayya') ?></label>
						<input type="range" id="smaller-size" name="smaller-size" value="<?php echo esc_attr($this->value('smaller-size-link')); ?>" <?php $this->link('smaller-size-link'); ?> min="0.1" max="1" step="0.01" class="range-slide" />
						<div id="smaller-size-value" class="range-value"><?php echo esc_html($this->value('smaller-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="small-font"><?php esc_html_e('Small Font', 'hayya') ?></label>
						<select name="small-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('small-font-link'); ?>>
							<?php $this->font_options( $this->value('small-font-link') ); ?>
						</select>
						<label for="small-size"><?php esc_html_e('Small Font Size', 'hayya') ?></label>
						<input type="range" id="small-size" name="small-size" value="<?php echo esc_attr($this->value('small-size-link')); ?>" <?php $this->link('small-size-link'); ?> min="0.5" max="1.5" step="0.01" class="range-slide" />
						<div id="small-size-value" class="range-value"><?php echo esc_html($this->value('small-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="regular-font"><?php esc_html_e('Regular Font', 'hayya') ?></label>
						<select name="regular-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('regular-font-link'); ?>>
							<?php $this->font_options( $this->value('regular-font-link') ); ?>
						</select>
						<label for="regular-size"><?php esc_html_e('Regular Font Size', 'hayya') ?></label>
						<input type="range" id="regular-size" name="regular-size" value="<?php echo esc_attr($this->value('regular-size-link')); ?>" <?php $this->link('regular-size-link'); ?> min="0.75" max="2" step="0.01" class="range-slide" />
						<div id="regular-size-value" class="range-value"><?php echo esc_html($this->value('regular-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="large-font"><?php esc_html_e('Large Font', 'hayya') ?></label>
						<select name="large-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('large-font-link'); ?>>
							<?php $this->font_options( $this->value('large-font-link') ); ?>
						</select>
						<label for="large-size"><?php esc_html_e('large Font Size', 'hayya') ?></label>
						<input type="range" id="large-size" name="large-size" value="<?php echo esc_attr($this->value('large-size-link')); ?>" <?php $this->link('large-size-link'); ?> min="1" max="4" step="0.01" class="range-slide" />
						<div id="large-size-value" class="range-value"><?php echo esc_html($this->value('large-size-link')); ?>rem</div>
					</div>

					<div>
						<label for="larger-font"><?php esc_html_e('Larger Font', 'hayya') ?></label>
						<select name="larger-font" class="chosen-select" data-placeholder="<?php esc_attr_e('Select Font Famly', 'hayya');?>" <?php $this->link('larger-font-link'); ?>>
							<?php $this->font_options( $this->value('larger-font-link') ); ?>
						</select>
						<label for="larger-size"><?php esc_html_e('Larger Font Size', 'hayya') ?></label>
						<input type="range" id="larger-size" name="larger-size" value="<?php echo esc_attr($this->value('larger-size-link')); ?>" <?php $this->link('larger-size-link'); ?> min="1" max="5" step="0.01" class="range-slide" />
						<div id="larger-size-value" class="range-value"><?php echo esc_html($this->value('larger-size-link')); ?>rem</div>
					</div>


				</div>
			  </div>
			<?php
		}

		private function font_options( $value = '' ) {
			global $wp_filesystem;

			$sFonts = array(
				"Arial, Helvetica, sans-serif"						 => "Arial, Helvetica, sans-serif",
				"'Arial Black', Gadget, sans-serif"					=> "'Arial Black', Gadget, sans-serif",
				"'Bookman Old Style', serif"						   => "'Bookman Old Style', serif",
				"'Comic Sans MS', cursive"							 => "'Comic Sans MS', cursive",
				"Courier, monospace"								   => "Courier, monospace",
				"Garamond, serif"									  => "Garamond, serif",
				"Georgia, serif"									   => "Georgia, serif",
				"Impact, Charcoal, sans-serif"						 => "Impact, Charcoal, sans-serif",
				"'Lucida Console', Monaco, monospace"				  => "'Lucida Console', Monaco, monospace",
				"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
				"'MS Sans Serif', Geneva, sans-serif"				  => "'MS Sans Serif', Geneva, sans-serif",
				"'MS Serif', 'New York', sans-serif"				   => "'MS Serif', 'New York', sans-serif",
				"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
				"Tahoma,Geneva, sans-serif"							=> "Tahoma, Geneva, sans-serif",
				"'Times New Roman', Times,serif"					   => "'Times New Roman', Times, serif",
				"'Trebuchet MS', Helvetica, sans-serif"				=> "'Trebuchet MS', Helvetica, sans-serif",
				"Verdana, Geneva, sans-serif"						  => "Verdana, Geneva, sans-serif",
			);

			$gFile = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'google-fonts.min.json';

			WP_Filesystem();

			$json = json_decode(
				$wp_filesystem->get_contents($gFile),
				true
			);

			$gFonts = [];
			if ( isset( $json ) && ! empty( $json ) && is_array( $json ) ) {
				foreach ( $json as $k => $v ) {
					$gFonts[] = $k;
				}
			}
			?>

			<option value=""></option>
			<optgroup label="<?php esc_attr_e('Standard Fonts', 'hayya'); ?>">
			<?php
			if ( isset($sFonts) && ! empty($sFonts) && is_array($sFonts) ) {
				foreach ( $sFonts as $v ) {
					if ( ! empty($v) && ! is_array($v) ) {
						if ( $value ===  $v ) $selected = 'selected';
						else $selected = '';
						echo '<option vlaue="'.esc_attr($v).'" '.esc_attr($selected),'>'.esc_attr($v).'</option>';
					}
				}
				unset($v);
			}
			?>
			</optgroup>
			<optgroup label="<?php esc_attr_e('Google WebFonts', 'hayya'); ?>">
			<?php
			if ( isset($gFonts) && ! empty($gFonts) && is_array($gFonts) ) {
				foreach ( $gFonts as $v ) {
					if ( ! empty($v) && ! is_array($v) ) {
						if ( $value ===  $v ) $selected = 'selected';
						else $selected = '';
						echo '<option vlaue="'.esc_attr($v).'" '.esc_attr($selected),'>'.esc_attr($v).'</option>';
					}
				}
			}
			?>
			</optgroup>
			<?php
		}

	}

endif;
