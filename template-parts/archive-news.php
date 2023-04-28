<?php
$id = ( isset(  $args['id'] ) ) ? $args['id'] : get_the_ID();
$fields = get_fields(get_the_ID());
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

?>
<div class="archive-news-wrapper pb-4">
	<p><time datetime="<?php get_the_date($id,"c");?>"><?php echo get_the_date("",$id);?></time></p>
	<h2><?php echo get_the_title($id);?></h2>
	<div class="pb-4"><?php echo get_the_excerpt($id);?></div>
	<a class="readmore" href="<?php echo get_the_permalink($id);?>"><?php _e('Read This News Item');?></a>
</div>
