<?php
/**
 * News Feed Block Template.
 *
 */
$params = [ 'post_type' => 'news',
			'posts_per_page' => get_field('post_count')];
$query = new WP_Query($params);
if( $query->have_posts() ) : ?>
<?php if( is_admin() ) : ?><div class="container"><?php endif;?>
<div class="row d-flex align-content-stretch flex-wrap gy-4">
<?php while( $query->have_posts() ) : $query->the_post(); ?>
<?php
$args = [
	'id' => get_the_ID(),
	'datetime' => get_the_date("c"),
	'date' => get_the_date(),
	'title' => get_the_title(),
	'excerpt' => get_the_excerpt(),
	'permalink' => get_the_permalink()
];
?>
	<div class="col-xl-6 news-post-wrapper">
	  <div class="has-ivory-background-color p-5 pb-2 h-100">
	  <?php get_template_part('template-parts/archive-news', 'archive-news', $args);?>
	  </div>
	</div>
<?php endwhile; ?>
</div>
<?php $footer = get_field('news_feed_footer'); if( ! empty( $footer ) ) :?>
<div class="row">
	<div>
		<?php echo $footer;?>
	</div>
</div>
<?php endif;?>
<?php wp_reset_postdata(); endif; ?>
<?php if( is_admin() ) : ?></div><?php endif;?>
