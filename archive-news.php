<?php
/**
 * The Template for displaying News Archive page.
 */

get_header();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$params = [
				'post_type' => 'news',
				'post_status' => 'publish',
				'paged' => $paged,
				'posts_per_page' => get_option('posts_per_page')
			];
$query = new WP_Query($params);
?>
<main id="main" class="container">
<?php  if( $query->have_posts() ) : ?>
<div class="row d-flex align-content-stretch flex-wrap pb-6">
	<div class="px-4"><?php if ( $paged==1 && is_active_sidebar( 'news-archive-intro' ) ) : ?><?php dynamic_sidebar( 'news-archive-intro' );?><?php endif;?></div>
	<?php while( $query->have_posts() ) : $query->the_post(); ?>
	<div class="news-post-wrapper col-xl-6 p-4">
		<div class="has-ivory-background-color p-5 h-100">

		<?php
		$args = [	'id' => get_the_ID(),
					'title' => get_the_title(),
					'datetime' => get_the_date("c"),
					'date' => get_the_date(),
		   		 	'excerpt' => get_the_excerpt(),
		  		  	'permalink' => get_the_permalink()
				];

		get_template_part( 'template-parts/archive-news', 'archive-news', $args);?>
	</div>
	</div>
<?php endwhile; endif; wp_reset_postdata();?>
</div><!-- /.row -->

<nav id="pagination" class="d-flex justify-content-center pagination" aria-label="<?php _e("News number links","rbn-pw");?>"><?php pagination( $paged, $query->max_num_pages);?></nav>
</main>
<?php get_footer(); ?>
