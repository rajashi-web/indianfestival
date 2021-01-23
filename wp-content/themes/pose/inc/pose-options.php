<?php
//OPTONS

function pose_theme_info_menu() {

	add_theme_page( 
		esc_html__('Welcome To Pose WordPress Theme', 'pose'), 
		esc_html__('Pose Theme Info', 'pose'), 
		'manage_options', 
		'pose_theme_options', 
		'pose_theme_info_display' 
	);

}


add_action( 'admin_menu', 'pose_theme_info_menu' );



function pose_theme_info_display() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html_e( 'You do not have sufficient permissions to access this page.', 'pose' ) );
	}
	
	?>
	<div class="wrap pose-adm">
		<h1 class="header-welcome"><?php esc_html_e('Welcome to Pose - 0.0.36', 'pose'); ?></h1>
		<div class="pose-adm-dsply-fl pose-adm-fl-wrap pose-adm-jc-sp-btw">

			<div class="pose-adm-wid-49 theme-para theme-doc pose-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Documentation','pose'); ?></h4>
				<p><?php esc_html_e('Documentation for this theme includes all theme information that is needed to get your site up and running', 'pose'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://zidithemes.com/pose-free/'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Theme Documentation', 'pose'); ?>
					</a>
				</p>
			</div>

			<div class="pose-adm-wid-49 theme-para theme-opt pose-adm-mobwid-100">
				<h4><?php esc_html_e('Pose Pro','pose'); ?></h4>
				<p class="">
					<?php esc_html_e('Pose Pro includes portfolio page templates, additional features and more options to customize your website.',  'pose'); ?>
				</p>
				<p>
					<a href="<?php echo esc_url('https://zidithemes.com/pose-pro/'); ?>" class="button button-primary" target="_blank">
						<?php esc_html_e('Upgrade to Pose Pro', 'pose'); ?>
					</a>
				</p>
			</div>

			<div class="pose-adm-wid-49 theme-para theme-opt pose-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Options','pose'); ?></h4>
				<p class="">
					<?php esc_html_e('pose Theme supports Theme Customizer. Click "Go To Customizer" to open the Customizer now.',  'pose'); ?>
				</p>
				<p>
					<a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Go To Customizer', 'pose'); ?>
					</a>
				</p>
			</div>

			<div class="pose-adm-wid-49 theme-para theme-review pose-adm-mobwid-100">
				<h4><?php esc_html_e('Leave us a review','pose'); ?></h4>
				<p><?php esc_html_e('We would love to hear your feedback.', 'pose'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/pose/reviews/#new-post'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Submit a review', 'pose'); ?>
					</a>
				</p>
			</div>


			<div class="pose-adm-wid-49 theme-para theme-support pose-adm-mobwid-100">
				<h4><?php esc_html_e('Support','pose'); ?></h4>
				<p><?php esc_html_e('Reach out in the theme support forums on WordPress.org.', 'pose'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/pose/'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Support Forum', 'pose'); ?>
					</a>
				</p>
			</div>


			<div class="theme-upgrade pose-adm-wid-100">
				<table class="pose-adm-wid-100">
					<thead class="theme-table-head">
						<tr>
							<th class="feature"><h3><?php esc_html_e('Features', 'pose'); ?></h3></th>
							<th class="pose-adm-wid-33"><h3><?php esc_html_e('Pose', 'pose'); ?></h3></th>
							<th class="pose-adm-wid-33"><h3><?php esc_html_e('Pose Pro', 'pose'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="feature-items-title">
								<h3><?php esc_html_e('Theme Price', 'pose'); ?></h3>
							</td>
							<td class="free-btn"><?php esc_html_e('Free', 'pose'); ?></td>
							<td>
								<a class="pro-link-btn" href="<?php echo esc_url('https://zidithemes.com/pose-pro/'); ?>" target="_blank">
									<?php esc_html_e('View Pricing', 'pose'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Responsive Design', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Portfolio Page Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Testimonials Page Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Team Page Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Gallery Page Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Pricing Page Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('One Column Post Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('3 News Grid Image Styles', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Full Width Template', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Footer Credits Options', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Color Options', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Gutenberg Compatible', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Elementor Compatible', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Major Browser Compatible', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Woocommerce Compatible', 'pose'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class=""></td>
							<td class=""></td>
							<td class="go-pro">
								<span class="">
									<a class="link" href="<?php echo esc_url('https://zidithemes.com/pose-pro/'); ?>" target="_blank">
										<?php esc_html_e('View Pro', 'pose'); ?>
									</a>
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<?php
}
?>
