<?php
/**
 * The Template for displaying single events.
 */

get_header(); ?>
<main id="main" class="container">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/event-single', 'event-single' );

	endwhile;
endif;
?>
</main>
<script>
const navItems = document.querySelectorAll('.nav-item a');
navItems.forEach( (item) => {
	if(item.href.indexOf('/events') != -1) {
		item.classList.add('active');
	}
})
</script>
<?php get_footer(); ?>
