<?php
/**
 * The Template for displaying Archive pages.
 */

get_header();


<h2><?php _e('Upcoming Events','rbn-pw');></h2>

if ( have_posts() ) :
?>

<?php
	get_template_part( 'template-parts/event-excerpt', 'event-excerpt' );
else :
	// 404.
	get_template_part( 'content', 'none' );
endif;

wp_reset_postdata(); // End of the loop.

<h2><?php _e('Past Events','rbn-pw');></h2>

get_footer();
