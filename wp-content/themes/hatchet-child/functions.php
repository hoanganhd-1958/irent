<?php
/**
 *
 * [Parent Theme] child theme functions and definitions
 * 
 * @package [Parent Theme]
 * @author  Themezaa <info@themezaa.com>
 * 
 */

if ( ! function_exists( 'pofo_child_style' ) ) :
	function pofo_child_style() {
	    wp_enqueue_style( 'pofo-parent-style', get_template_directory_uri(). '/style.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'pofo_child_style', 11 );


function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
$mimes['ogv'] = 'video/ogg';
 
// Optional. Remove a mime type.
unset( $mimes['exe'] );
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );