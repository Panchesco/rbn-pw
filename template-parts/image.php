<?php
extract($args);
if( isset( $image ) && ! empty( $image ) ) { ?>
	<figure class="p-0 m-0 w-100">
		<div class="media"><?php echo wp_get_attachment_image($image,'large',false,['class' => 'img-fluid']);?></div>
		<?php if( isset( $image_caption )  && ! empty( $image_caption ) ) {?>
	<figcaption class="fs-5 fst-italic pt-2 pb-4">
			<?php echo $image_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
