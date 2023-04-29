<?php
/**
 * Contributor Thumbnail Block Template.
 */
$fields = get_fields($post->ID);
if( $fields['has_background_video'] == 1 && isset( $fields['background_video'] ) && ! empty( $fields['background_video'] )  ) : ?>
 <div class="rbn-card loading fade-in has-background-video" data-bg="<?php echo $fields['background_image']['sizes']['rbn-card'];?>" style="background-image: url('<?php echo $fields['background_image']['sizes']['rbn-card'];?>')">
     <video muted>
        <source src="<?php echo $fields['background_video'];?>" type="video/mp4">
      </video>
     <a href="<?php echo $fields['links_to'];?><" class="sr" aria-label="<?php echo $fields['label'];?>"></a>
     <label><?php echo $fields['label'];?></label>
   </div>
<?php else: ?>
 <div class="rbn-card loading fade-in" data-bg="<?php echo $fields['background_image']['sizes']['rbn-card'];?>" style="background-image: url('<?php echo $fields['background_image']['sizes']['rbn-card'];?>')">
     <a href="<?php echo $fields['links_to'];?><" class="sr" aria-label="<?php echo $fields['label'];?>"></a>
     <label><?php echo $fields['label'];?></label>
   </div>
 <?php endif;?>
