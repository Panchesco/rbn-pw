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
	$post_name = $row['contributor']->post_name;
	$image = get_field('background_image',$post_id);
	$img = rbn_get_attachment($image['ID'],'rbn-card');
	$bg_color = get_field('background_color',$post_id);
	$bg_color = ( !empty($bg_color) ) ? $bg_color : 'transparent';
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
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 has-background-video <?php echo $post_name;?>" data-bg="<?php echo $img->url;?>" style="background-color:<?php echo $bg_color;?>;background-image: url('<?php echo $img->url;?>')">
	<span class="visually-hidden" role="img" alt="<?php echo $img->alt_text;?>"></span>
	<?php foreach( $data['audio_descriptions'] as $desc ) :?>
	<?php if( isset($desc['language']) && $desc['language'] == $curr_lang )  :?>
	<?php endif; ?>
	<?php endforeach;?>
	 <video class="video-thumb pause" muted>
		<source src="<?php echo $data['background_video'];?>" type="video/mp4">
	  </video>
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <div class="label"><?php echo $data['label'];?></div>
   </div>
<?php else: ?>
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 <?php echo $post_name;?>" data-bg="<?php echo $img->url;?>" style="background-color:<?php echo $bg_color;?>;background-image:url('<?php echo $img->url;?>')">
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <span role="img" alt="<?php echo $img->alt_text;?>"></span>
	 <div class="label"><?php echo $data['label'];?></div>
   </div>
 <?php endif; endif;?>
<?php
	endforeach;
endforeach;
?>
</div><!-- /.row -->





















