<?php

	if( isset( $args['id'] ) ) {
		$id = $args['id'];
		//$post = get_post( $id );
	} else {
		$id = get_the_ID();
	}
	$fields = get_fields( $id,true );


	extract($args)
?>
<div class="archive-event has-ivory-buff-background-color p-5 mb-6">
[archive event]
</div><!-- /.archive-event -->

