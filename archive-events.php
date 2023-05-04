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
<?php if( $paged == 1 ) : if( $future->have_posts() ) : ?>
	<?php if ( is_active_sidebar( 'upcoming-events-intro' ) ) : ?>
	<div class="mb-4">
		<?php dynamic_sidebar( 'upcoming-events-intro' );?>
	</div>
	<?php endif; $i=1; while( $future->have_posts() ) : $future->the_post(); ?>
	<?php $args = [	'id' => get_the_ID(),
					'title' => get_the_title(),
					'permalink' => get_the_permalink(),
					'date_time_heading' => get_field('date_time_heading'),
					'excerpt' => get_the_excerpt(),
					'event_cta' => get_field('event_cta'),
					'cta_text' => get_field('cta_text'),
					'groups' => get_field('groups'),
					'total_rows' => $future->post_count,
					'row_count' => $i];?>
	<?php get_template_part( 'template-parts/archive-event', 'archive-event',$args );?>
	<?php $i++; endwhile; endif; wp_reset_postdata();?>
<?php endif;?>
	<?php if( $past->have_posts() ) : ?>
	<div class="mt-6">
	<?php if ( is_active_sidebar( 'past-events-intro' ) ) : ?>
	<?php dynamic_sidebar( 'past-events-intro' );?>
	</div>
	<?php endif;?>
	<div class="mb-6">
	<?php $i=1; while( $past->have_posts() ) : $past->the_post(); ?>
	<?php $args = [	'id' => get_the_ID(),
						'title' => get_the_title(),
						'permalink' => get_the_permalink(),
						'date_time_heading' => get_field('date_time_heading'),
						'excerpt' => get_the_excerpt(),
						'event_cta' => get_field('event_cta'),
						'cta_text' => get_field('cta_text'),
						'groups' => get_field('groups'),
						'total_rows' => $past->post_count,
						'row_count' => $i];?>
	<?php get_template_part( 'template-parts/archive-event', 'archive-event',$args );?>
	<?php $i++; endwhile;?>
	</div><!-- /.mb-6 -->
	<nav id="pagination" class="d-flex justify-content-center pagination"><?php pagination( $paged, $past->max_num_pages);?></nav>
<?php  endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>
