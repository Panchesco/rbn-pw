<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();
?>
<main id="main" class="container">
<div class="row d-flex justify-content-center">
<?php if( have_posts() ) :
		while( have_posts() ) :
			the_post();
			the_content();
	endwhile; endif; ?>
</div><!-- /.row -->
</main>
<?php
get_footer();
