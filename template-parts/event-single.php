<?php
$fields = get_fields(get_the_ID());
$fields['groups'] = ( isset( $fields['groups'] ) && is_array( $fields['groups'] )  )  ? $fields['groups'] : [];
foreach( $fields['groups'] as $key => $group ) {
	$fields['groups'][$key]['profile'] = ( isset( $fields['groups'][$key]['profile'] ) && is_array( $fields['groups'][$key]['profile'] )  )  ? $fields['groups'][$key]['profile'] : [];
	$fields['groups'][$key]['group_heading'] = ( isset( $fields['groups'][$key]['group_heading'] ) ) ? $fields['groups'][$key]['group_heading']: "";
}

$fields['event_embed_code'] = ( ! empty($fields['event_embed_code']) ) ? $fields['event_embed_code'] : false;


$footer_col_count = ( ( isset($fields['map_intro']) && !empty($fields['map_intro']) ) ||  (isset( $fields['map'] ) && !empty( $fields['map']) ) )  ? 2 : 1;

?>
<div class="archive-event columns has-ivory-buff-background-color mb-0 mx-auto justify-content-center p-4 px-xl-5 col-xl-10">
	<div class="row">
		<div class="event-title">
			<h1><?php the_title();?></h1>
		</div><!-- /div -->
	</div><!-- /.row -->
	<?php if( $fields['event_embed_code'])  :?><div class="row px-0 mx-0 py-4">
		<figure id="event-embed-code-wrapper">
			<div  class="<?php echo $fields['event_embed_aspect_ratio'];?> border border-solid border-dark box-shadow">
			<?php echo $fields['event_embed_code'];?>
			</div>
			<figcaption class="fs-5 pt-2">
				<?php echo $fields['event_embed_caption'];?>
			</figcaption>
		</figure>
	</div><!-- ./row --><?php endif;?>
	<div class="row archive-event-header g-0">
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
				<div class="accessibility-statement"><?php echo $fields['accessibility_statement'];?></div>
			</div>
				<?php //echo $fields['map'];?>
		</div>
	</div><!-- /.row -->

	<div class="row g-0 mb-4 border-bottom border-deep-grayish-olive-color">
			<div>
				<?php echo $fields['event_card_columns']['column_one']; ?>
			</div>
	</div>
<div class="grouping">
<?php foreach($fields['groups'] as $group ) : ?>
	<h2><?php echo $group['group_heading']; ?></h2>
	<?php foreach( $group['profile'] as $profile ) :?>
	<div class="row g-0 border-bottom border-deep-grayish-olive-color py-4 mb-4">
	<?php // With copy block ?>
		<div class="headshot-wrapper col-xl-4 pe-xl-4">
			<figure>
		 	<?php if( isset( $profile['headshot'] )  && ! empty( $profile['headshot'] )) :?>
		 		<div class="headshot py-2">
				<?php echo wp_get_attachment_image($profile['headshot'], 'rbn-card', false,['class' => 'img-fluid w-100']); ?>
				</div><!-- /.headshot -->
				<?php endif;?>
		   	<figcaption class="headshot-caption">
				<?php echo $profile['headshot_caption'];?>
		   	</figcaption>
			</figure>
		</div>
		<div class="col-xl-8 copy-block">
				<?php echo $profile['copy_block'];?>
		</div>
	</div>
	<?php endforeach;?>
<?php endforeach; ?>
</div><!-- /.row.grouping-->
<?php if( $footer_col_count == 2 ) : ?>
<div class="row pt-5">
	<div class="col-xl-7 pe-xl-5">
		<?php echo $fields['event_footer']; ?>
	</div>
	<div class="col-xl-5">
			<?php echo $fields['map_intro']; ?>
			<div><?php echo $fields['map']; ?></div>
	</div>
</div>
<?php else: ?>
	<div class="row pt-4">
		<div class="pe-xl-4">
			<?php echo $fields['event_footer']; ?>
		</div>
	</div>

<?php endif;?>
</div><!-- /.has-ivory-background-color -->





