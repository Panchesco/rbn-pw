<?php
$fields = get_fields(get_the_ID());

?>
<div class="archive-event columns has-ivory-buff-background-color mb-6 mx-auto justify-content-center p-4 p-xl-5 col-xl-10">
	<div class="row">
		<div class="event-title">
			<h1><?php the_title();?></h1>
		</div><!-- /.col -->
	</div><!-- /.row -->
	<div class="row">
		<div class="col-xl-7 ">
			<?php echo $fields['date_time_heading']; ?>
		</div>
		<div class="col-xl-5">
		<?php if( isset( $fields['event_cta']['button_url'] ) && ! empty( $fields['event_cta']['button_url'] ) ) :?>
				<div class="text-center wp-block-button pb-3">
				<a class="wp-block-button__link has-vizcaya-palm-background-color w-100 fs-4" target="_blank" href="<?php echo $fields['event_cta']['button_url'];?>"><?php echo $fields['event_cta']['button_text'];?></a>
				</div>
		<?php endif;?>
			<div id="col-2" class="pb-4">
			<?php echo $fields['event_card_columns']['column_two']; ?>
			</div>
				<?php //echo $fields['map'];?>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div>
			<?php echo $fields['event_card_columns']['column_one'];?>
		</div>
	</div>
<div class="row grouping">
<?php foreach($fields['groups'] as $group ) : ?>
	<h2 class="pb-2"><?php echo $group['group_heading']; ?></h2>
	<div class="row m-0 p-0 pb-0">
	<?php foreach( $group['profile'] as $profile ) :?>
	<?php // With copy block ?>
	<div class="headshot-wrapper col-xl-4 pb-xl-5">
		<figure class="p-0 mb-2">
		 <?php if( isset( $profile['headshot'] )  && ! empty( $profile['headshot'] )) :?>
		 	<div class="headshot pb-2 pb-xl-2">
			<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid']); ?>
			</div><!-- /.headshot -->
			<?php endif;?>
		   <figcaption class="headshot-caption pb-xl-4">
			<?php echo $profile['headshot_caption'];?>
		   </figcaption>
		</figure>
	</div>
	<div class="col-xl-8 pb-6 copy-block fs-1">
			<?php echo $profile['copy_block'];?>
	</div>

	<?php endforeach;?>
	</div>
<?php endforeach; ?>
</div><!-- /.row.grouping-->
<hr class="p-0 m-0">
<div class="row pt-5">

	<div class="col-xl-7 pe-xl-5">
		<?php echo $fields['event_footer']; ?>
	</div>
	<div class="col-xl-5">
			<?php echo $fields['map_intro']; ?>
			<div><?php echo $fields['map']; ?></div>
	</div>
</div>
</div><!-- /.has-ivory-background-color -->





