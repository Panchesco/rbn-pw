<?php


	if( isset( $args['id'] ) ) {
		$id = $args['id'];
		$post = get_post( $id );
	} else {
		$id = get_the_ID();
	}
	$fields = get_fields( $id,true );

	extract($args)

?>
<div class="archive-event has-ivory-buff-background-color p-5 <?php if( $total_rows != $row_count ) : ?>  mb-6<?php endif;?>">
	<div class="event-title"><h2 class="h1"><?php echo $title;?></h2></div>
	<div class="row">
		<div class="col-xl-6 pe-xl-5">
			<?php echo $date_time_heading;?>
			<?php echo $intro;?>
			<div class="d-flex justify-content-center justify-content-lg-start wp-block-button is-style-outline py-4">
				<a class="wp-block-button__link  wp-element-button w-100 w-xl-auto" href="<?php echo $permalink; ?>" title="<?php echo $title;?>"><?php echo $cta_text;?></a>
			</div>
		</div>
		<div class="col-xl-6">
			<?php if( isset( $event_cta['button_url'] ) && ! empty( $event_cta['button_url'] ) ) :?>
				<div class="d-flex justify-content-lg-start wp-block-button">
					<a class="wp-block-button__link w-100 w-xl-auto has-vizcaya-palm-background-color mb-6" target="_blank" href="<?php echo $event_cta['button_url'];?>"><?php echo $event_cta['button_text'];?></a>
				</div>
			<?php endif;?>
			<div class="grouping">
					<?php if( isset($groups) && is_array( $groups )  ) : foreach( $groups as $group ) : ?>
					<?php if( isset( $group['group_heading'] ) && ! empty( $group['group_heading'] )) :?>
						<h4><?php echo $group['group_heading'];?></h4>
						<div class="d-xl-flex flex-wrap row gx-4 mb-4 border-bottom border-deep-grayish-olive-color">
						<?php if( isset($group['profile']) && is_array( $group['profile']) ) : foreach( $group['profile'] as $profile ) : ?>
								<figure class="col-xl col-xl-4">
									<div class="headshot has-mineral-gray-background-color one-one">
									<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0']); ?>
									</div><!-- /.headshot -->
									<figcaption class="headshot-caption pt-2 pb-5">
										<?php echo $profile['headshot_caption'];?>
									</figcaption>
								</figure>
						<?php endforeach; endif; ?>
						</div><!-- /.d-xl-flex -->
					<?php endif;?>
					<?php endforeach; endif;?>
				</div>
			</div>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-xl-6 pe-lg-5">

		</div>

</div><!-- /.archive-event -->

