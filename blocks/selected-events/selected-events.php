<?php
/**
 * Selected Events Block Template.
 */
$selected_events = get_field('selected_events');
if( $selected_events ){
	foreach( $selected_events as $row ) {
		foreach( $row as $events) {
			foreach( $events as $event) {
				get_template_part('template-parts/event-excerpt','event-excerpt',['id' => $event->ID]);
			}
		}
	}
}
