<?php
/**
 * Theme admin functions.
 *
 * @package Meridia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function meridia_theme_admin_menu() {
	add_theme_page(
		__( 'Getting Started', 'meridia' ),
		__( 'Meridia', 'meridia' ),
		'manage_options',
		'getting-started',
		'meridia_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'meridia_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function meridia_admin_page_content() {
	$meridia_urls = array(
		'docs' 									=> 'https://demo.deothemes.com/wp_docs/meridia/index.html',	
		'custom-widgets'				=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#custom-widgets',
		'theme-styles'					=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#demo-import',
		'header-types'					=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#header-types',
		'featured-area-types'		=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#featured-area-types',
		'post-layouts'					=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#post-layouts',
		'acf-pro'								=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#acf-pro',
		'gdpr'									=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#gdpr',
		'socials'								=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#social-profiles',		
		'demo-import'						=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#demo-import',
		'woocommerce' 					=> 'https://demo.deothemes.com/wp_docs/meridia/index.html#woocommerce',
	);

	$meridia_info = array(
		'theme-styles' => array(
			'title'			=> __( '5 Theme Styles', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['theme-styles'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['theme-styles'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'custom-widgets' => array(
			'title'			=> __( 'Custom Widgets', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['custom-widgets'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['custom-widgets'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'header-types' => array(
			'title'			=> __( '4 Header Types', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['header-types'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['header-types'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'featured-area-types' => array(
			'title'			=> __( '5 Featured Area Types', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['featured-area-types'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['featured-area-types'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'post-layouts' => array(
			'title'			=> __( '5 Post Layouts', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['post-layouts'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['post-layouts'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'acf-pro' => array(
			'title'			=> __( 'ACF Pro included (Save $49)', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['acf-pro'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['acf-pro'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'gdpr' => array(
			'title'			=> __( 'GDPR', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['gdpr'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['gdpr'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'socials' => array(
			'title'			=> __( 'Social Media', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['socials'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['socials'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'demo-import' => array(
			'title'			=> __( 'One Click Demo Import', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['demo-import'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['demo-import'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),
		'woocommerce' => array(
			'title'			=> __( 'WooCommerce', 'meridia' ),
			'class'			=> 'deo-addon-list-item',
			'title_url' => $meridia_urls['woocommerce'],
			'links'			=> array(
				array(
					'link_class'	 => 'deo-learn-more',
					'link_url'		 => $meridia_urls['woocommerce'],
					'link_text'    => __( 'Learn More &#187;', 'meridia' ),
					'target_blank' => true
				),
			),
		),		
	);

	?>
		<div class="wrap deo-container">
			<h1 class="deo-title"><?php esc_html_e( 'Getting Started', 'meridia' ); ?></h1>
			<p class="deo-text">
				<?php					
					echo esc_html__( 'Meridia is now installed and ready to use! Get ready to build something beautiful. We hope you enjoy it! Before you get started, install all the required and recommended plugins, without them theme will lack some customizations.', 'meridia' );					
				?>
			</p>
			<a href="https://deothemes.com/wordpress-themes/everse-multi-purpose-elementor-wordpress-theme/?utm_source=themes-admin-banner" target="_blank">
				<img src="<?php echo esc_url( MERIDIA_THEME_URI . '/assets/admin/img/everse_wp_admin_banner.jpg' ); ?>" alt="Everse Multi-Purpose Elementor WordPress Theme">
			</a>
			<h3><?php echo esc_html__( 'What is next?', 'meridia' ); ?></h3>
			<ul class="deo-list">
				<li>
					<?php
						/* translators: %1$s: Docs URL. */
						printf(
							esc_html__( 'Check the %1$s for installation and customization guides.', 'meridia' ),
							sprintf(
								'<a href="%s" target="_blank">%s</a>',
								esc_url( $meridia_urls['docs'] ),
								esc_html__( 'Documentation', 'meridia' )
							)
						);
					?>
				</li>
				<li>
					<?php
						/* translators: %1$s: Customizer URL. */
						printf(
							esc_html__( 'Go to %1$s to modify the look of your site. (requires active Kirki plugin)', 'meridia' ),
							sprintf(
								'<a href="%s" target="_blank">%s</a>',
								esc_url( admin_url( 'customize.php' ) ),
								esc_html__( 'Customizer', 'meridia' )
							)
						);
					?>
				</li>
				<li>
					<?php
						/* translators: %1$s: Contact URL. */
						printf(
							esc_html__( 'Need help? %1$s We\'re happy to help!', 'meridia' ),
							sprintf(
								'<a href="%s">%s</a>',
								esc_url( admin_url( 'themes.php?page=getting-started-contact' ) ),
								esc_html__( 'Get in touch with us.', 'meridia' )
							)
						);
					?>
				</li>
			</ul>
		
			<div class="deo-notification notice notice-info">
				<?php printf( esc_html__( 'Meridia 2.0 changes and %supdate instructions%s', 'meridia' ),
					'<a href="https://deothemes.com/meridia-wordpress-theme-2-0-changes/" target="_blank">',
					'</a>'
				); ?>
			</div>

			<div class="postbox deo-postbox">
				<h2 class="deo-addon-title"><?php echo esc_html__( 'More features with Meridia Pro', 'meridia' ); ?></h2>
				<ul class="deo-addon-list">
					<?php
					foreach ( (array) $meridia_info as $addon => $info ) {
						$title_url     = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? 'href="' . esc_url( $info['title_url'] ) . '"' : '';
						$anchor_target = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? "target='_blank' rel='noopener'" : '';

						echo '<li class="' . esc_attr( $info['class'] ) . '"><a class="deo-addon-item-title"' . $title_url . $anchor_target . ' >' . esc_html( $info['title'] ) . '</a><div class="deo-addon-link-wrapper">';

							foreach ( $info['links'] as $key => $link ) {
								printf(
									'<a class="%1$s" %2$s %3$s> %4$s </a>',
									esc_attr( $link['link_class'] ),
									isset( $link['link_url'] ) ? 'href="' . esc_url( $link['link_url'] ) . '"' : '',
									( isset( $link['target_blank'] ) && $link['target_blank'] ) ? 'target="_blank" rel="noopener"' : '', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									esc_html( $link['link_text'] )
								);
							}

						echo '</div></li>';
					}
					?>
				</ul>
			</div>
		</div>
	<?php
}


/**
* Display admin notice.
*/
function meridia_admin_notice() {
		if ( get_user_meta( get_current_user_id(), 'meridia_dismissed_notice', true ) ) {
			return;
		}
		
    ?>
    <div class="notice notice-info is-dismissible">
			<p><?php echo wp_kses_post( 'Discover a new <strong>Elementor WordPress theme Everse</strong>. One theme, unlimited possibilities.' ); ?>
				<a href="https://deothemes.com/wordpress-themes/everse-multi-purpose-elementor-wordpress-theme/?utm_source=themes-admin-notification" target="_blank"><?php echo esc_html__( 'Learn More &#187;', 'meridia' ); ?></a>
				<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">
					<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'meridia-dismiss', 'dismiss_admin_notices' ), 'meridia-dismiss-' . get_current_user_id() ) ); ?>" class="dismiss-notice" target="_parent">
						<?php echo esc_html__( 'Dismiss', 'meridia' ); ?>
					</a>
				</span>				
			</p>
    </div>
    <?php
}
add_action( 'admin_notices', 'meridia_admin_notice' );


/**
* Register dismissal of admin notices.
*
* Acts on the dismiss link in the admin nag messages.
* If clicked, the admin notice disappears and will no longer be visible to this user.
*
*/
function meridia_admin_dismiss() {
	if ( isset( $_GET['meridia-dismiss'] ) && check_admin_referer( 'meridia-dismiss-' . get_current_user_id() ) ) {
		update_user_meta( get_current_user_id(), 'meridia_dismissed_notice', 1 );
	}
}
add_action( 'admin_head', 'meridia_admin_dismiss' );


/**
* Change theme icon
*
* @since 1.0.0
*/
function meridia_fs_custom_icon() {
  return MERIDIA_THEME_DIR . '/assets/admin/img/theme-icon.jpg';
} 
meridia_fs()->add_filter( 'plugin_icon' , 'meridia_fs_custom_icon' );