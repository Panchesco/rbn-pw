<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
<main id="main" class="container">
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
 <?php if( current_user_can( 'edit_posts' ) && !empty(get_the_excerpt())) :?>
	 <div class="alert alert-info" role="alert">
		 <h2><?php _e('News Item Excerpt Translation','rbn-pw');?></h2>
		 <p><em><?php _e('Note: You are seeing this block because you are logged in and are able to edit news items. In the block below, please provide the translation for the news item excerpt. The excerpt is the summary that appears on the cards linking to the news item. Non-editors will not see this block when they visit the page.','rbn-pw');?></em></p>
		 <?php the_excerpt();?>
	 </div>
 <?php endif;?>
 <div class="row d-flex justify-content-center pb-6">
	 <div class="col col-xl-8 py-6">
	 <h3 class="left-arrow"><a class="returnto" href="/news"><?php _e('View all News','rbn-pw');?></a></h3>
	 </div>
</div>
</main>
<script>
const navItems = document.querySelectorAll('.nav-item a');
navItems.forEach( (item) => {
	if(item.href.indexOf('/news') != -1) {
		item.classList.add('active');
	}
})
</script><?php
get_footer();
