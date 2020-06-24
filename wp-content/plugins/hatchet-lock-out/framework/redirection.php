<?php


add_action( 'get_header', 'hatchet_lock_out' );



function hatchet_lock_out() {



	if ( ! is_user_logged_in() ) {

  

		wp_redirect( wp_login_url(), 302 );

		

	}
}


?>