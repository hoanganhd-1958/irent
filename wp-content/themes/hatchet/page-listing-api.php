<?php
/* 
  Template Name: API LISTING
*/
get_header();
	if (have_posts()) : while ( have_posts() ) : the_post();
?>
<?php endwhile;endif;?>
<?php get_footer();?>