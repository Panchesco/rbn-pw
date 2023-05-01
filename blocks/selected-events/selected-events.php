<?php
/**
 * Selected Events Block Template.
 */
$selected_events = get_field('selected_events');
if( $selected_events ){
	foreach( $selected_events as $row ) {
		foreach( $row as $events) {
			foreach( $events as $event) {
				$id = $event->ID;
				$args = [	'id' => $id,
								'title' => get_the_title($id),
								'permalink' => get_the_permalink($id),
								'date_time_heading' => get_field('date_time_heading',$id),
								'excerpt' => get_the_excerpt($id),
								'event_cta' => get_field('event_cta',$id),
								'cta_text' => get_field('cta_text',$id),
								'groups' => get_field('groups',$id)];
				get_template_part('template-parts/archive-event','archive-event',$args);
			}
		}
	}
}
