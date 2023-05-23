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

	$data = [	'post_id' => $post_id,
				'permalink' => get_the_permalink($post_id),
					'label' => get_field('label',$post_id),
					'background_image' => $image['sizes']['rbn-card'],
					'background_video' => $video,
				];

// Display contributor grid card
if( $post_status == 'publish') :
if( isset( $data['background_video'] ) && ! empty( $data['background_video'] )  ) : ?>
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 has-background-video" data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	 <video class="pause" muted>
		<source src="<?php echo $data['background_video'];?>" type="video/mp4">
	  </video>
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <label><?php echo $data['label'];?></label>
   </div>
<?php else: ?>
 <div class="contributor-grid-card loading col col-12 col-md-6 col-xl-3 " data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <label><?php echo $data['label'];?></label>
   </div>
 <?php endif; endif;?>
<?php
	endforeach;
endforeach;
?>
</div><!-- /.row -->





















