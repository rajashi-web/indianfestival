<?php

require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function vw_health_coaching_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Ibtana Visual Editor', 'vw-health-coaching' ),
			'slug'             => 'ibtana-visual-editor',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vw_health_coaching_register_recommended_plugins' );