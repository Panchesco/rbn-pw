<?php
/**
 * The Template for displaying Event Archive page.
 */

get_header();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$current_datetime = date('Y-m-d H:i:s');


$future_params = array(
	'post_type' => 'events',
	'posts_per_page' => get_option('posts_per_page'),
	'post_status' => 'publish',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'archive_date',
			'value' => $current_datetime,
			'compare' => '>=',
			'type' => 'DATETIME'
		),
	),
	'meta_key' => 'event_start_date',
	'orderby' => 'meta_value',
	'order' => 'ASC'
);

$past_params = array(
	'paged' => $paged,
	'post_type' => 'events',
	'posts_per_page' => get_option('posts_per_page'),
	'post_status' => 'publish',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'archive_date',
			'value' => $current_datetime,
			'compare' => '<',
			'type' => 'DATETIME'
		)
	),
	'meta_key' => 'event_start_date',
	'orderby' => 'meta_value',
	'order' => 'DESC'
);


$future = new WP_Query($future_params);


$past = new WP_Query($past_params);

?>

<div class="container">
	<div class="row">
<?php if( $paged == 1 ) : if( $future->have_posts() ) : ?>
	<?php if ( is_active_sidebar( 'upcoming-events-intro' ) ) : ?>
		<?php dynamic_sidebar( 'upcoming-events-intro' );?>
	<?php endif; while( $future->have_posts() ) : $future->the_post(); ?>
	<?php get_template_part( 'template-parts/event-excerpt', 'event-single' );?>
	<?php endwhile; endif; wp_reset_postdata();?>
<?php endif;?>


	<?php if( $past->have_posts() ) : ?>
	<?php if ( is_active_sidebar( 'past-events-intro' ) ) : ?>
	<?php dynamic_sidebar( 'past-events-intro' );?>
	<?php endif;?>
	<?php while( $past->have_posts() ) : $past->the_post(); ?>
	<?php get_template_part( 'template-parts/event-excerpt', 'event-single' );?>
	<?php endwhile;?>
	<nav id="pagination" class="d-flex justify-content-center pagination"><?php pagination( $paged, $past->max_num_pages);?></nav>

	<?php  endif; wp_reset_postdata(); ?>
		</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
