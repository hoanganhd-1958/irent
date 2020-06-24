<?php
/**
	Plugin Name: Hatchet Custom Login
	Plugin URI: http://hatchetagency.com
	Description: Custom Login Styles by Hatchet
	Author: Hatchet Agency
	Project Manager: hi@hatchetagency.com
	Version: 0.1
	Author URI: http://hatchetagency.com
**/
// Load Login Stylesheet
function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" media="all" href="' .plugins_url('/assets/css/login-styles.css', __FILE__). '">';
}
add_action('login_head', 'custom_login_css');

// Load Admin Stylesheet
function admin_css() {
	echo '<link rel="stylesheet" type="text/css" media="all" href="' .plugins_url('/assets/css/admin.css', __FILE__). '">';
}
add_action('admin_print_styles', 'admin_css' );

// Load Style Sheet for Frontend Admin Bar

function adminbar_frontend_css() {
    echo '<link rel="stylesheet" type="text/css" media="all" href="' .plugins_url('/assets/css/admin_frontend.css', __FILE__). '">';
}
add_action('wp_head', 'adminbar_frontend_css');

// Custom WordPress Footer
function remove_footer_admin () {
    $img_link = site_url('/wp-content/mu-plugins/hatchet-admin/framework/login/assets/your_logo/hatchet-login.png');
	echo '<a href="//hatchetagency.com" target="_blank" title="Hatchet Agency" rel="nofollow" class="htc-db-logo"><img src="' . $img_link . '" title="Hatchet Agency"></a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Load Custom JS File
function advanced_login_form_plugin() {

	wp_enqueue_script( 'advanced_login_js', plugins_url( '/assets/js/custom.js', __FILE__ ), array('jquery'));
	wp_enqueue_style( 'advanced_font_css', plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ));
	//wp_enqueue_style( 'advanced_login_css', plugins_url( '/assets/css/advanced-login-form.css', __FILE__ ));
}
add_action('login_head', 'advanced_login_form_plugin');
// Hide Dashboard Widgets
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	// Today widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// Last comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['via_posts']);
}

// Custom RSS Feed's in Dashboard

add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets() {
     global $wp_meta_boxes;
     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
     wp_add_dashboard_widget( 'dashboard_custom_feed', 'Thoughts from Hatchet' , 'dashboard_custom_feed_output' );
}
function dashboard_custom_feed_output() {
     echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
          'url' => 'https://rss.app/feeds/Qzg3BJx5llny2zKY.xml',
          'title' => 'Thoughts from Hatchet',
          'items' => 4,
          'show_summary' => 1,
          'show_author' => 0,
          'show_date' => 1
     ));
     echo '</div>';
}