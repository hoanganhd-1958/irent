<?php

// Remove Admin menu items for all Including Administrators
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
$page = remove_submenu_page( 'themes.php', 'theme-editor.php' ); //remove theme editor
  $page = remove_submenu_page( 'themes.php', 'customize.php' ); //remove appearance customize menu
 //$page = remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); //remove plugin editor
 // $page = remove_submenu_page( 'plugins.php', 'plugin-install.php' ); //remove plugin install sub menu
 // $page = remove_submenu_page( 'options-general.php', 'options-permalink.php' ); //remove permalinks submenu
 // $page = remove_submenu_page( 'index.php', 'update-core.php' );
 // $page = remove_menu_page( 'themes.php' ); //remove appearnce menu
 // $page = remove_menu_page( 'tools.php' ); //remove tools menu
 // $page = remove_menu_page( 'plugins.php' ); //remove plugins menu
 // $page = remove_menu_page( 'update-core.php' ); //remove update menu
 
 /*
  
  //REMOVE SETTINGS SUBMENUS
  $page = remove_submenu_page( 'options-general.php', 'wpb_vc_settings' ); //remove visual composer options
  $page = remove_submenu_page( 'options-general.php', 'duplicatepost' ); //remove duplicate post 
  
  
  //REMOVE GRAVITY FORMS SUB MENUS
   $page = remove_submenu_page( 'gf_edit_forms', 'gf_mailchimp' ); //REMOVE GF MAILCHIMP
   $page = remove_submenu_page( 'gf_edit_forms', 'gf_settings' ); //REMOVE GF SETTINGS
   $page = remove_submenu_page( 'gf_edit_forms', 'gf_update' ); //REMOVE GF UPDATES
   $page = remove_submenu_page( 'gf_edit_forms', 'gf_help' ); //REMOVE GF HELP
   $page = remove_submenu_page( 'gf_edit_forms', 'gf_addons' ); //REMOVE GF ADD-ONS
    
    
   //REMOVE THEME SPECIFIC MENUS 
    $page = remove_menu_page( '_options' ); //remove royalslider options'
    
       
   */
    $page = remove_menu_page( 'edit.php?post_type=testimonial' );
    $page = remove_menu_page( 'edit.php?post_type=block' );
    $page = remove_menu_page( 'envato-wordpress-toolkit' );
    $page = remove_menu_page( 'vc-general' );
    
    $page = remove_menu_page( 'edit-comments.php' );
    
    
    /* Remove Hatchet Builder */
    $page = remove_menu_page( 'ct_dashboard_page' );
 
}


/* Remove Meta Box */
function esthetik_remove_metaboxes() {
  remove_meta_box('my-meta-box', 'page', 'normal'); // remove post options from pages
  remove_meta_box('post-meta-box', 'post', 'normal'); // remove post options from posts
  remove_meta_box('mymetabox_revslider_0', 'page', 'normal'); //remove revsslider metabox from pages
  remove_meta_box('mymetabox_revslider_0', 'post', 'normal'); //remove revsslider metabox from posts
  remove_meta_box('revisionsdiv', 'post', 'normal'); //remove revsslider metabox from posts
  remove_meta_box('revisionsdiv', 'page', 'normal'); //remove revsslider metabox from pages
 }
add_action( 'do_meta_boxes', 'esthetik_remove_metaboxes' );

/* Stop Plugin Update Nags */
function filter_plugin_updates( $value ) {
    unset( $value->response['js_composer/js_composer.php'] ); // remove plugin update nags for visual composer
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
?>