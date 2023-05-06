<?php
/**
 * Contributors Grid Block Template.
 *

 */
 error_reporting(E_ALL);
 error_reporting(-1);
 ini_set('error_reporting', E_ALL);
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
<div class="d-flex flex-wrap contributors-grid justify-content-start gap-4 px-3 px-lg-0">
<?php
// Set contributor rows and sub fields from Contributor post to grid array.
foreach( $field as  $row ) :
	foreach( $row as $key => $card ) :
	$post_id = $row['contributor']->ID;
	$image = get_field('background_image',$post_id);
	$video = get_field('background_video',$post_id);

	$data = [	'post_id' => $post_id,
				'permalink' => get_the_permalink($post_id),
					'label' => get_field('label',$post_id),
					'background_image' => $image['sizes']['rbn-card'],
					'background_video' => $video,
				];
// Display contributor grid card
if( isset( $data['background_video'] ) && ! empty( $data['background_video'] )  ) : ?>
 <div class="contributor-grid-card loading has-background-video col-lg-4" data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	 <video muted>
		<source src="<?php echo $data['background_video'];?>" type="video/mp4">
	  </video>
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <label><?php echo $data['label'];?></label>
   </div>
<?php else: ?>
 <div class="contributor-grid-card loading col-lg-4" data-bg="<?php echo $data['background_image'];?>" style="background-image: url('<?php echo $data['background_image'];?>')">
	 <a href="<?php echo $data['permalink'];?>" class="sr" aria-label="<?php echo $data['label'];?>"></a>
	 <label><?php echo $data['label'];?></label>
   </div>
 <?php endif;?>
<?php
	endforeach;
endforeach;
?>
</div><!-- /.row -->





















