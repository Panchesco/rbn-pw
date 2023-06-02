<?php
/**
 * Selected Events Block Template.
 */

$data = [];
$rows = [];
$selected_events = get_field('selected_events');

foreach($selected_events as $key => $row ) {
	$data[$key] = $row['event'];
	$fields = get_fields($row['event']->ID);
	foreach($fields as $field => $value) {
		$data[$key]->$field = $value;
		$data[$key]->row_count = $key + 1;
		$data[$key]->total_rows = count($selected_events);
	}
	$rows[] = $data[$key];
}

if( $selected_events ){ ?>
	<?php
			foreach( $rows as $row) {

				$id = $row->ID;
				$args = [	'id' => $id,
								'title' => get_the_title($id),
								'permalink' => get_the_permalink($id),
								'date_time_heading' => get_field('date_time_heading',$id),
								'excerpt' => get_the_excerpt($id),
								'event_cta' => get_field('event_cta',$id),
								'cta_text' => get_field('cta_text',$id),
								'groups' => get_field('groups',$id),
								'intro' => get_field('intro',$id),
								'row_count' => $row->row_count,
								'total_rows' => $row->total_rows];

				get_template_part('template-parts/archive-event','archive-event',$args);

	} ?>
<?php $footer = get_field('selected_events_footer'); if( ! empty( $footer ) ) :?>
	<div class="row">
		<div>
			<?php echo $footer;?>
		</div>
	</div>
	<?php endif;?>
<?php
}
