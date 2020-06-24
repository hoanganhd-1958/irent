<?php

/*
Hatchet - Remove WP Admin Bar LInks
http://hatchetagency.com
*/

function hatchet_admin_bar() {
    global $wp_admin_bar;
	
	// Remove Global Items
    $wp_admin_bar->remove_menu('wp-logo');            // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');              // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');              // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');      // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');     // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');           // Remove the feedback link
    //$wp_admin_bar->remove_menu('site-name');          // Remove the site name menu
    //$wp_admin_bar->remove_menu('view-site');          // Remove the view site link
    //$wp_admin_bar->remove_menu('updates');            // Remove the updates link
    //$wp_admin_bar->remove_menu('comments');           // Remove the comments link
    //$wp_admin_bar->remove_menu('new-content');        // Remove the content link
    //$wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
	
	// Remove "Add New Submenus"
	//$wp_admin_bar->remove_menu('new-post');      		 // Remove New Post Option
	//$wp_admin_bar->remove_menu('new-media');      		 // Remove New Media Option
	$wp_admin_bar->remove_menu('new-page');      		 // Remove New Page Option
	$wp_admin_bar->remove_menu('new-portfolio');      	 // Remove New Portfolio Option
	$wp_admin_bar->remove_menu('new-user');      		 // Remove New User Option
	
	
	// Remove Submenus Under SITE NAME
	$wp_admin_bar->remove_menu('themes');      		 // Remove Themes Option
	$wp_admin_bar->remove_menu('widgets');     		 // Remove Widgets Option
	$wp_admin_bar->remove_menu('customize');     	 // Remove Customize Option
	$wp_admin_bar->remove_menu('menus');       		 // Remove Menus Option
	$wp_admin_bar->remove_menu('background');        // Remove Background Option
	$wp_admin_bar->remove_menu('header');       	 // Remove Header Option

	
	// Plugin Specific 
	
	$wp_admin_bar->remove_menu('wpseo-menu');        // Remove YOAST SEO Plugin Options
	$wp_admin_bar->remove_menu('w3tc');              // If you use w3 total cache remove the performance link
    
    // Theme Specific
    $wp_admin_bar->remove_menu('_options');              // Theme Options
	
}
add_action( 'wp_before_admin_bar_render', 'hatchet_admin_bar' );

?>