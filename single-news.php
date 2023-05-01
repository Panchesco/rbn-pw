<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<?php

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>
<div class="row">
		<p><time datetime="<?php echo get_the_date("c");?>"><?php the_date();?></time></p>
		<h1><?php the_title();?></h1>
</div>
<div class="row d-flex justify-content-center">
	<div class="col-xl-8">
		<?php the_content();?>
	</div>
</div>
<?php
	endwhile;
endif;
 ?>
 <div class="row d-flex justify-content-center pb-6">
	 <div class="col col-xl-8 py-6">
	 <h3 class="left-arrow"><a class="returnto" href="/news"><?php _e('View all News','rbn-pw');?></a></h3>
	 </div>
</div>

<script>
const navItems = document.querySelectorAll('.nav-item a');
navItems.forEach( (item) => {
	if(item.href.indexOf('/news') != -1) {
		item.classList.add('active');
	}
})
</script><?php
get_footer();
