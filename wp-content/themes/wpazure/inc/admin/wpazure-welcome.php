<?php
/**
 * Add admin notice
 */

add_action('load-themes.php', 'activation_admin_notice');
 
function activation_admin_notice() {
		global $pagenow;
		if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated'])) {
			add_action('admin_notices', 'wpazure_admin_notice', 99);
		}
}
 
function wpazure_admin_notice() {
	if ( is_admin()) {
		?>
		<div class="admin-welcome-notice wpazure-options-notice notice is-dismissible" data-notice="welcome_box">
			<div class="wpazure-notice-content">
				<div class="wpazure-notice-img">
					<img src="<?php echo esc_url( WPAZURE_THEME_URI . 'images/azure-logo.png' ); ?>" alt="<?php esc_attr_e( 'logo', 'wpazure' ); ?>">
				</div>
				<div class="wpazure-notice-text">
					<div class="wpazure-notice-heading"><?php esc_html_e( 'Thanks for installing Wpazure!', 'wpazure' ); ?></div>
					<p>
						<?php
						printf( // WPCS: XSS OK.
							/* translators: Theme options */
							__( 'To fully take advantage of the best our theme can offer please make sure you visit our <a href="%1$s">Welcome page</a>.', 'wpazure' ),
							esc_url( admin_url( 'admin.php?page=wpazure-welcome' ) )
						);
						?>
					</p>
				</div>
			</div>
		</div>
		<?php
	}
}


function wpazure_admin_style() {
	
		wp_enqueue_style('wpazure-admin-styles', get_template_directory_uri().'/inc/admin/css/wpazure-welcome.css');
	
}
add_action('admin_enqueue_scripts', 'wpazure_admin_style');



add_action('admin_menu', 'wpazure_welcome_page');


// Wpazure welcome page register
function wpazure_welcome_page() {
    add_theme_page('Wpazure', 'Wpazure', 'manage_options', 'wpazure-welcome', 'wpazure_settings_page');
}

function wpazure_settings_page(){
	global $wpazure_active_tab;
	$wpazure_active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'welcome'; ?>
  <div class="wpazure-admin wrap">
    <h1>
    <?php
    $wpazure_theme = wp_get_theme();
    echo $wpazure_theme->get( 'Name' ) . "  v." . $wpazure_theme->get( 'Version' );
    ?>
    </h1>
  	<h2 class="nav-tab-wrapper">
      <a class="nav-tab <?php echo $wpazure_active_tab == 'welcome' || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'themes.php?page=wpazure-welcome&tab=welcome' ) ); ?>"><?php esc_html_e( 'Welcome', 'wpazure' ); ?></a>
  	</h2>
  	<?php	do_action( 'wpazure_settings_content' ); ?>
  </div><!-- /.wrap -->
  <?php
}


add_action( 'wpazure_settings_content', 'wpazure_welcome_render_options_page' );

function wpazure_welcome_render_options_page() {
	global $wpazure_active_tab;
	if ( '' || 'welcome' != $wpazure_active_tab )
		return;
	?>
  <div class="wp-pointer-content">
	<h2 class="wpazure-admin-h2" style="margin-left: 20px;"><?php esc_html_e( 'Thank You for installing Wpazure Theme!', 'wpazure' ); ?></h2>
  <h3><?php esc_html_e( 'With the few clickes to unlock full potential of Wpazure', 'wpazure' ); ?></h3>

    <p><?php esc_html_e( 'Simply complete the steps listed below it only takes a minute  and you will be able to enjoy all functionalities of Wpazure Theme.', 'wpazure' ); ?></p>
    <p><?php esc_html_e( 'So without a further ado let\'s begin!', 'wpazure' ); ?></p>

    <h4><?php esc_html_e( 'Install and Activate all recommended plugins to unlock Wpazure custom features', 'wpazure' ); ?></h4>
    <?php
    $wpazure_installer = TGM_Plugin_Activation::get_instance();
    if ( ! $wpazure_installer->is_tgmpa_complete() ) {
    ?>
    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install and Activate Plugins Now', 'wpazure' ); ?></a><p>
    <?php
    } else {
      ?>
      <p><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Success: All plugins are installed and activated', 'wpazure' ); ?></a><p>
      <?php
    }
    ?>

    <p><?php echo wp_kses_post( '<strong>IMPORTANT:</strong> you need to install all recommended plugins to be able to use all Wpazure theme custom features.', 'wpazure' ); ?></p>
    <p><?php echo wp_kses_post( '<strong>Need help?</strong> Here you can check how to install and import demo in Wpazure theme <a href="' . esc_url( 'https://www.wpazure.com/how-to-import-premade-templates-of-wpazure/' ) . '" target="_blank" style="background: #0085ba;border-color: #0073aa #006799 #006799;box-shadow: 0 1px 0 #006799;color: #fff;text-decoration: none;text-shadow: 0 -1px 1px #006799, 1px 0 1px #006799, 0 1px 1px #006799, -1px 0 1px #006799;padding: 5px 8px;border-radius: 4px;">click here.</a>', 'wpazure' ); ?></p>

   
    <h4><?php esc_html_e( 'Import one of the already created Demo sites', 'wpazure' ); ?></h4>
    <?php
    if ( ! $wpazure_installer->is_tgmpa_complete() ) {
    ?>
    <p><a href="#" class="button"><?php esc_html_e( 'Go to Wpazure Demo Importer', 'wpazure' ); ?></a><p>
    <?php
    } else {
    ?>
    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=wpazure-demo-import' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Wpazure Site Library', 'wpazure' ); ?></a><p>
    <?php
    }
    ?>
	
	<h4><?php esc_html_e( 'Go to Wordpress Customizer to tweak many Wpazure theme options and customize it just how you like!', 'wpazure' ); ?></h4>
    <p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go To Customizer' , 'wpazure' ); ?></a><p>

    <h4><?php esc_html_e( 'Need help with Wpazure Theme?', 'wpazure' ); ?></h4>
    <p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/wpazure/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Post your query' , 'wpazure' ); ?></a><p>

</div>

	<?php
}
