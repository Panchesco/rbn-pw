<?php
$fields = get_fields(get_the_ID(),true);

?>
<div class="event container has-ivory-buff-background-color p-5 mb-6">
	<div class="row">
		<div class="col col-xl-6 p-xl-0">
			<h2><?php the_title();?></h2>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-xl-6 pb-5 p-xl-0 pe-xl-4">
		<h3><?php echo $fields['date_time_heading']; ?></h3>
		</div>
	<div class="col-xl-6 pb-5 p-xl-0 pe-xl-4">
	<?php if( isset( $fields['event_cta']['button_url'] ) && ! empty( $fields['event_cta']['button_url'] ) ) :?>
		<div class="d-flex justify-content-center justify-content-lg-start text-center wp-block-button">
			<a class="wp-block-button__link has-vizcaya-palm-background-color" target="_blank" href="<?php echo $fields['event_cta']['button_url'];?>"><?php echo $fields['event_cta']['button_text'];?></a>
		</div>
	<?php endif;?>
	</div>
	</div>
	<div class="row">
		<div class="col-xl-6 pb-5 p-xl-0 pe-xl-4">

			<?php the_excerpt();?>

			<div class="text-center wp-block-button is-style-outline py-4">
				<a class="wp-block-button__link wp-element-button" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_field('cta_text');?></a>
			</div>
		</div>
		<div class="col-xl-6 groups">

			<?php foreach($fields['groups'] as $group ) : ?>
				<h4 class="pb-2"><?php echo $group['group_heading']; ?></h4>
				<div class="row pb-4">
				<?php foreach( $group['profile'] as $profile ) :?>
				<?php // With copy block ?>
				<?php if( $profile['copy_block'] != "" ) :?>
				<div class="d-xl-flex">
					<figure class="col-xl-4 d-flex d-xl-block flex-column">
						<div class="headshot">
							<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0 has-raw-sienna-background-color']); ?>
						</div>
						<figcaption class="headshot-caption pt-2 pb-5">
							<?php echo $profile['headshot_caption'];?>
						</figcaption>
					</figure>
					<div class="col-xl-8 pb-5 copy-block">
							<?php echo $profile['copy_block'];?>
					</div>
				</div>

				<?php else: ?>
				<?php // Without copy block ?>
				<div class="d-flex flex-column flex-lg-row col-xl-4 pb-2">
					<figure class="d-flex d-xl-block flex-column">
						<div class="headshot">
						<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0 has-raw-sienna-background-color ']); ?>
						</div>
						<figcaption class="headshot-caption pt-2 pb-5">
							<?php echo $profile['headshot_caption'];?>
						</figcaption>
					</figure>
				</div>
				<?php endif;?>

				<?php endforeach;?>
				</div>
			<?php endforeach; ?>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->

