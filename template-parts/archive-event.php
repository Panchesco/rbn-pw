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
<div class="archive-event has-ivory-buff-background-color p-5">
	<h2><?php echo $title ?></h2>
	<div class="row">
		<div class="col-xl-6">
			<h3><?php echo $date_time_heading;?></h3>
		</div>
		<div class="col-xl-6">
			<?php if( isset( $event_cta['button_url'] ) && ! empty( $event_cta['button_url'] ) ) :?>
				<div class="d-flex justify-content-center justify-content-lg-start text-center wp-block-button">
					<a class="wp-block-button__link has-vizcaya-palm-background-color" target="_blank" href="<?php echo $event_cta['button_url'];?>"><?php echo $event_cta['button_text'];?></a>
				</div>
			<?php endif;?>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-xl-6">
			<?php echo $excerpt;?>
			<div class="text-center wp-block-button is-style-outline py-4">
				<a class="wp-block-button__link wp-element-button" href="<?php echo $permalink; ?>" title="<?php echo $title;?>"><?php echo $cta_text;?></a>
			</div>
		</div>
		<div class="col-xl-6 grouping">
			<?php if( isset($groups) && is_array( $groups )  ) : foreach( $groups as $group ) : ?>
			<?php if( isset( $group['group_heading'] ) && ! empty( $group['group_heading'] )) :?>
				<h4><?php echo $group['group_heading'];?></h4>
				<div class="d-xl-flex flex-wrap row gx-4">
				<?php if( isset($group['profile']) && is_array( $group['profile']) ) : foreach( $group['profile'] as $profile ) : ?>
					<?php
						// There are two possible layouts for each profile
						// 1. Profile with a copy block.
					if( isset( $profile['copy_block'] ) && ! empty( $profile['copy_block'] )  ) :?>
						<figure class="col-xl col-xl-4">
							<div class="headshot mb-2">
								<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0']); ?>
							</div><!-- /.headshot -->
							<figcaption class="headshot-caption pb-5">
								<?php echo $profile['headshot_caption'];?>
							</figcaption>
						</figure>
						<div class="col-xl col-xl-8 pb-5 copy-block">
								<?php echo $profile['copy_block'];?>
						</div>
					<?php
					// 2. Profile withoutcopy block.
					else: ?>
						<figure class="col-xl col-xl-4">
							<div class="headshot mb-2">
							<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0']); ?>
							</div><!-- /.headshot -->
							<figcaption class="headshot-caption pb-5">
								<?php echo $profile['headshot_caption'];?>
							</figcaption>
						</figure>
					<?php endif;?>

				<?php endforeach; endif; ?>
				</div><!-- /.d-xl-flex -->
			<?php endif;?>
			<?php endforeach; endif;?>
		</div>
	</div>
</div><!-- /.archive-event -->

