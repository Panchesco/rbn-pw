<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();
?>
<div class="row d-flex justify-content-center">
<?php if( have_posts() ) :
		while( have_posts() ) :
			the_post();
			the_content();
	endwhile; endif; ?>
</div><!-- /.row -->
<?php
get_footer();
