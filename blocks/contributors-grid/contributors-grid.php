<?php
/**
 * Contributors Grid Block Template.
 *

 */
// Support custom "anchor" values.
 $anchor = '';
 if ( ! empty( $block['anchor'] ) ) {
	 $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $class_name = 'contributors-repeater';
 if ( ! empty( $block['className'] ) ) {
	 $class_name .= ' ' . $block['className'];
 }
 if ( ! empty( $block['align'] ) ) {
	 $class_name .= ' align' . $block['align'];
 }

// Set grid array to hold grid elements.
$grid = [];

// Get contributor grid rows.
$field = get_field('contributors_grid');

?>
<div class="d-flex flex-wrap contributors-grid justify-content-center justify-content-xl-start gap-4 px-3 px-lg-0 pb-4">
<?php
// Set contributor rows and sub fields from Contributor post to grid array.
foreach( $field as  $row ) :

	foreach( $row as $key => $card ) :


	$post_id = $row['contributor']->ID;
	$post_status = $row['contributor']->post_status;
	$image = get_field('background_image',$post_id);
	$video = get_field('background_video',$post_id);
	$audio_descriptions = get_field('audio_descriptions',$post_id);
	$curr_lang = get_locale();
	$aria_label = ( isset($image['ID']) ) ? get_post_meta($image['ID'], '_wp_attachment_image_alt', TRUE) : "";

	$data = [	'post_id' => $post_id,
				'permalink' => get_the_permalink($post_id),
					'label' => get_field('label',$post_id),
					'background_image' => ( isset( $image['sizes']['rbn-card']) && !empty( $image['sizes']['rbn-card']))  ? $image['sizes']['rbn-card'] : "",
					'aria_label' => $aria_label,
					'background_video' => $video,
					'audio_descriptions' =>  (isset($audio_descriptions) && is_array($audio_descriptions)) ? $audio_descriptions : [],
				];
// Display contributor grid card
if( $post_status == 'publish') :
if( isset( $data['background_video'] ) && ! empty( $data['background_video'] )  ) : ?>
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 has-background-video" data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	<span class="visually-hidden" role="img" aria-label="<?php echo $data['aria_label'];?>"></span>
	<?php foreach( $data['audio_descriptions'] as $desc ) :?>
	<?php if( isset($desc['language']) && $desc['language'] == $curr_lang )  :?>
	<span class="visually-hidden">
		<a href="<?php echo $desc['audio_file'];?>"><?php echo $desc['instructions'];?></a>
	</span>
	<?php endif; ?>
	<?php endforeach;?>
	 <video class="pause" muted>
		<source src="<?php echo $data['background_video'];?>" type="video/mp4">
	  </video>
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <div class="label"><?php echo $data['label'];?></div>
   </div>
<?php else: ?>
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 " data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <span role="img" aria-label="<?php echo $data['aria_label'];?>"></span>
	 <div class="label"><?php echo $data['label'];?></div>
   </div>
 <?php endif; endif;?>
<?php
	endforeach;
endforeach;
?>
</div><!-- /.row -->





















