<?php
$id = ( isset(  $args['id'] ) ) ? $args['id'] : get_the_ID();
$fields = get_fields(get_the_ID());
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
extract($args);
?>
<div class="archive-news-wrapper pb-4">
	<p><time datetime="<?php echo $datetime ;?>"><?php echo $date ;?></time></p>
	<h2><?php echo $title;?></h2>
	<div class="pb-4"><?php echo $excerpt ;?></div>
	<a class="readmore" href="<?php echo $permalink;?>"><?php _e('Read This News Item');?></a>
</div>
