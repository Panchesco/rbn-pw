<?php
extract($args);
$img = rbn_get_attachment($image,'rbn-large');
if( isset( $image ) && ! empty( $image ) ) { ?>
	<figure class="p-0 m-0 w-100">
		<div class="media">
		<img class="img-fluid" src="<?php echo $img->url;?>" alt="<?php echo $img->alt_text;?>" />
		<?php if( isset( $image_caption )  && ! empty( $image_caption ) ) {?>
	<figcaption class="fs-5 fst-italic pt-2 pb-4">
			<?php echo $image_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
