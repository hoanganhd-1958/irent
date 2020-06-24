<?php
include_once(dirname(__FILE__) . '/lib/remove-admin-menu.php');
include_once(dirname(__FILE__) . '/lib/remove-adminbar-items.php');
// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

function hatchet_administration() {
    wp_enqueue_style('hatchet_administration', plugins_url('../css/styles.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'hatchet_administration');
add_action('login_enqueue_scripts', 'hatchet_administration');

/* Include Hatchet Custom CSS */
function load_custom_wp_styles(){
	$url = plugin_dir_url(__FILE__);

	wp_register_style( 'custom_wp_css', $url .'../css/styles.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_styles');

/* Remove Hover Text */
function my_login_title() { return get_option('blogname'); }
add_filter('login_headertitle', 'my_login_title');
 
/* change url for login screen */
add_filter('login_headerurl', create_function(false,"return home_url();"));

/* Remove Screen Options from Pages Menu */
function remove_screen_options(){
    return false;
}
add_filter('screen_options_show_screen', 'remove_screen_options');

/* RESTRICTS SUBSCRIBERS FROM ACCESSING WP ADMIN */

function block_dashboard() {
    $file = basename($_SERVER['PHP_SELF']);
    if (is_user_logged_in() && is_admin() && !current_user_can('edit_posts') && $file != 'admin-ajax.php'){
        wp_redirect( home_url() );
        exit();
    }
}

add_action('init', 'block_dashboard');

//RENAME MENU ITEMS

add_filter('gettext', 'rename_admin_menu_items');
add_filter('ngettext', 'rename_admin_menu_items');
/**
 * Replaces wp-admin menu item names
 * 
 * @author Daan Kortenbach
 * 
 * @param array $menu The menu array.
 *
 * @return $menu Menu array with replaced items.
*/
function rename_admin_menu_items( $menu ) {
	
	// $menu = str_ireplace( 'original name', 'new name', $menu );
	$menu = str_ireplace( 'WPBakery Page Builder', 'Hatchet Builder', $menu );
	$menu = str_ireplace( 'Pofo', 'Hatchet', $menu );
	$menu = str_ireplace( 'Portfolio', 'Leased', $menu );
	
	// return $menu array
	return $menu;
}


/* Remove Gravity Forms Page Jump */
// Gravity Forms anchor - disable auto scrolling of forms
add_filter("gform_confirmation_anchor", create_function("","return false;"));
/* End GForm Jump */

/* Remove 'Howdy' in Dashboard on Profile User Name */
function remove_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'remove_howdy',25 );

/* Remove Howdy */
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Welcome', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


/* Remove Recommended Plugins Notice */
add_filter('get_user_metadata', function($val, $object_id, $meta_key, $single)
{
    if($meta_key === 'tgmpa_dismissed_notice')
        return true;
    else
        return null;
 
}, 10, 4);

/* Allow SVG Uploads */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>