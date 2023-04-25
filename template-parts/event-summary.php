<?php
$fields = get_fields(get_the_ID(),true);
?>
<div class="event container has-ivory-buff-background-color p-5 mb-6">
	<div class="row">
		<div class="col col-xl-6 p-xl-0">
			<h3 class="h2"><?php the_title();?></h3>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-xl-6 pb-5 p-xl-0 pe-xl-4">
			<?php echo $fields['intro']; ?>
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
				<div class="d-xl-flex pb-4">
					<figure class="col-xl-4 d-flex d-xl-block flex-column">
						<div class="headshot">
							<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid m-auto m-xl-0 has-raw-sienna-background-color']); ?>
						</div>
						<figcaption class="headshot-caption pt-2">
							<?php echo $profile['headshot_caption'];?>
						</figcaption>
					</figure>
					<div class="col-xl-8 pb-4 copy-block">
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
						<figcaption class="headshot-caption pt-2">
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

