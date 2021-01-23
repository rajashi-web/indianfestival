<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Hayya
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function hayya_woocommerce_setup() {
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'hayya_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function hayya_woocommerce_scripts() {
	$theme = wp_get_theme('hayya');

	wp_enqueue_style(
		'hayya-woocommerce-style',
		get_template_directory_uri() . '/assets/css/woocommerce.min.css',
		array(),
		$theme->get( 'Version' )
	);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'hayya-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'hayya_woocommerce_scripts', 11 );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function hayya_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'hayya_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function hayya_woocommerce_products_per_page() {
	return HayyaTheme::hayya_options( 'shop-products-per-page' );
}
add_filter( 'loop_shop_per_page', 'hayya_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function hayya_woocommerce_thumbnail_columns() {
	return HayyaTheme::hayya_options( 'shop-gallery-thumnbail-columns' );
}
add_filter( 'woocommerce_product_thumbnails_columns', 'hayya_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function hayya_woocommerce_loop_columns() {
	return HayyaTheme::hayya_options( 'shop-number-of-columns' );
}
add_filter( 'loop_shop_columns', 'hayya_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function hayya_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => HayyaTheme::hayya_options( 'shop-number-of-related' ),
		'columns'		=> HayyaTheme::hayya_options( 'shop-related-columns' ),
	);
	$args = wp_parse_args( $defaults, $args );
	return $defaults;
}
add_filter( 'woocommerce_output_related_products_args', 'hayya_woocommerce_related_products_args' );
add_filter( 'woocommerce_upsell_display_args', 'hayya_woocommerce_related_products_args' );

// if ( ! function_exists( 'hayya_woocommerce_product_columns_wrapper' ) ) {
// 	/**
// 	 * Product columns wrapper.
// 	 *
// 	 * @return  void
// 	 */
// 	function hayya_woocommerce_product_columns_wrapper() {
// 		$columns = hayya_woocommerce_loop_columns();
// 		echo '<div class="columns-' . absint( $columns ) . '">';
// 	}
// }
// add_action( 'woocommerce_before_shop_loop', 'hayya_woocommerce_product_columns_wrapper', 40 );

// if ( ! function_exists( 'hayya_woocommerce_product_columns_wrapper_close' ) ) {
// 	/**
// 	 * Product columns wrapper close.
// 	 *
// 	 * @return  void
// 	 */
// 	function hayya_woocommerce_product_columns_wrapper_close() {
// 		echo '</div>';
// 	}
// }
// add_action( 'woocommerce_after_shop_loop', 'hayya_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'hayya_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function hayya_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		hayya_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'hayya_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'hayya_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function hayya_woocommerce_cart_link() {
		?>
			<a class="cart-contents medium-radius" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'hayya' ); ?>">
				<i class="fas fa-shopping-cart"></i> <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
			</a>
		<?php
	}
}


/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 *
 *		if ( function_exists( 'hayya_woocommerce_header_cart' ) ) {
 *			hayya_woocommerce_header_cart();
 *		}
 *
 */
if ( ! function_exists( 'hayya_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function hayya_woocommerce_header_cart() {
		$class = is_cart() ? 'current-menu-item': '';
		hayya_woocommerce_cart_link();
		$instance = array(
			'title' => '',
		);
		the_widget( 'WC_Widget_Cart', $instance );
	}
}

if ( ! function_exists( 'hayya_woocommerce_form_field' ) ) {

	/**
	 * Outputs a checkout/address form field.
	 *
	 * @param string $key Key.
	 * @param mixed  $args Arguments.
	 * @param string $value (default: null).
	 * @return string
	 */
	function hayya_woocommerce_form_field( $key, $args, $value = null ) {
		$defaults = array(
			'type'              => 'text',
			'label'             => '',
			'description'       => '',
			'placeholder'       => '',
			'maxlength'         => false,
			'required'          => false,
			'autocomplete'      => false,
			'id'                => $key,
			'class'             => array(),
			'label_class'       => array(),
			'input_class'       => array(),
			'return'            => false,
			'options'           => array(),
			'custom_attributes' => array(),
			'validate'          => array(),
			'default'           => '',
			'autofocus'         => '',
			'priority'          => '',
		);

		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required        = ' <abbr class="required" title="' . esc_attr__( 'required', 'hayya' ) . '">*</abbr>';
		} else {
			$required = '';
		}

		if ( is_string( $args['label_class'] ) ) {
			$args['label_class'] = array( $args['label_class'] );
		}

		if ( is_null( $value ) ) {
			$value = $args['default'];
		}

		// Custom attribute handling.
		$custom_attributes         = array();
		$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

		if ( $args['maxlength'] ) {
			$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
		}

		if ( ! empty( $args['autocomplete'] ) ) {
			$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
		}

		if ( true === $args['autofocus'] ) {
			$args['custom_attributes']['autofocus'] = 'autofocus';
		}

		if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
			foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
				$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
			}
		}

		if ( ! empty( $args['validate'] ) ) {
			foreach ( $args['validate'] as $validate ) {
				$args['class'][] = 'validate-' . $validate;
			}
		}

		switch ( esc_attr( $key ) ) {
			case 'billing_first_name':
			case 'shipping_first_name':
				$icon 	 = 'account_box';
				break;

			case 'billing_last_name':
			case 'shipping_last_name':
				$icon 	 = 'account_box';
				break;

			case 'billing_company':
			case 'shipping_company':
				$icon 	 = 'business';
				break;

			case 'billing_country':
			case 'shipping_country':
				$icon 	 = 'public';
				break;

			case 'billing_address_1':
			case 'shipping_address_1':
				$icon 	 = 'pin_drop';
				break;

			case 'billing_address_2':
			case 'shipping_address_2':
				$icon 	 = 'pin_drop';
				break;

			case 'billing_city':
			case 'shipping_city':
				$icon 	 = 'home';
				break;

			case 'billing_state':
			case 'shipping_state':
				$icon 	 = 'map';
				break;

			case 'billing_postcode':
			case 'shipping_postcode':
				$icon 	 = 'turned_in_not';
				break;

			case 'billing_phone':
			case 'shipping_phone':
				$icon 	 = 'contact_phone';
				break;

			case 'billing_email':
			case 'shipping_email':
				$icon 	 = 'contact_mail';
				break;

			case 'account_password':
			case 'shipping_password':
				$icon 	 = 'security';
				break;

			case 'order_comments':
				$icon 	 = 'insert_comment';
				break;

			default:
				$icon 	 = '';
				break;
		}
		$icon 			 = '<i class="material-icons prefix second-color-text">' . $icon . '</i>';

		$field           = '';
		$label_id        = $args['id'];
		$sort            = $args['priority'] ? $args['priority'] : '';
		$col 			 = 'm12 s12 %1$s';
		if (
			'billing_first_name' === esc_attr( $key ) ||
			'billing_last_name' === esc_attr( $key ) ||
			'billing_address_1' === esc_attr( $key ) ||
			'billing_address_2' === esc_attr( $key ) ||
			'shipping_first_name' === esc_attr( $key ) ||
			'shipping_last_name' === esc_attr( $key ) ||
			'shipping_address_1' === esc_attr( $key ) ||
			'shipping_address_2' === esc_attr( $key )
		) {
			$col = 'm6 s12';
		}
		$placeholder = '';
		if ( empty( $args['label'] ) && ! empty( $args['placeholder'] ) ) {
			$placeholder = ' placeholder="' . $args['placeholder'] . '"';
		}

		$field_container = '<div class="form-row input-field col ' . $col . '" id="%2$s" data-priority="' . esc_attr( $sort ) . '">' . $icon . '%3$s</div>';

		// if ( 'checkbox' === $args['type'] ) {
		// 	$field_container = '';
		// }

		switch ( $args['type'] ) {
			case 'country':
				$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

				if ( 1 === count( $countries ) ) {

					$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

					$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

				} else {

					$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '><option value="">' . esc_html__( 'Select a country&hellip;', 'hayya' ) . '</option>';

					foreach ( $countries as $ckey => $cvalue ) {
						$flag = '';
						// $flag = ' data-icon="' . get_template_directory_uri() . '/assets/images/flags/' . $ckey . '.jpg"';
						$field .= '<option' . $flag . ' value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

					$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'hayya' ) . '">' . esc_html__( 'Update country', 'hayya' ) . '</button></noscript>';

				}

				break;
			case 'state':
				/* Get country this state field is representing */
				$for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
				$states      = WC()->countries->get_states( $for_country );

				if ( is_array( $states ) && empty( $states ) ) {

					$field_container = '<div class="input-field %1$s" id="%2$s" style="display: none">%3$s</div>';

					$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' readonly="readonly" />';

				} elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

					$field .= '
						<select
							name="' . esc_attr( $key ) . '"
							id="' . esc_attr( $args['id'] ) . '"
							class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"
							' . implode( ' ', $custom_attributes ) . '
							data-placeholder="' . esc_attr( $args['placeholder'] ) . '"
						>
						<option value="">' . esc_html__( 'Select a state&hellip;', 'hayya' ) . '</option>';

					foreach ( $states as $ckey => $cvalue ) {
						$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

				} else {

					$field .= '<input type="text" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

				}

				break;
			case 'textarea':
				$field .= '<textarea name="' . esc_attr( $key ) . '" data-length="200" class="materialize-textarea ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="5"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

				break;
			case 'checkbox':
				$field = '<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' />
						<label for="' . esc_attr( $args['id'] ) . '" class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>'. $args['label'] . $required . '</label>';

				break;
			case 'password':
			case 'text':
			case 'email':
			case 'tel':
			case 'number':
				$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . $placeholder . ' />';

				break;
			case 'select':
				$field   = '';
				$options = '';

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						if ( '' === $option_key ) {
							// If we have a blank option, select2 needs a placeholder.
							if ( empty( $args['placeholder'] ) ) {
								$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'hayya' );
							}
							$custom_attributes[] = 'data-allow_clear="true"';
						}
						$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
					}

					$field .= '
						<select
							name="' . esc_attr( $key ) . '"
							id="' . esc_attr( $args['id'] ) . '"
							class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"
							' . implode( ' ', $custom_attributes ) . '
							data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
							' . $options . '
						</select>';
				}

				break;
			case 'radio':
				$label_id = current( array_keys( $args['options'] ) );

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
						$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
					}
				}

				break;
		}

		if ( ! empty( $field ) ) {
			$field_html = '';

			if ( $args['label'] && 'checkbox' !== $args['type'] && 'country' !== $args['type']) {
				$field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
			}

			$field_html .= $field;

			if ( $args['description'] ) {
				$field_html .= '<span class="description">' . esc_html( $args['description'] ) . '</span>';
			}

			$container_class = esc_attr( implode( ' ', $args['class'] ) );
			$container_id    = esc_attr( $args['id'] ) . '_field';
			$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
		}

		$field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

		if ( $args['return'] ) {
			return $field;
		} else {
			echo $field; // WPCS: XSS ok.
		}
	}
}
