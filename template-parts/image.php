<?php
extract($args);
$start = rbn_get_attachment($image,'rbn-thumbnail');
$img = rbn_get_attachment($image,'original');
if( isset( $img ) && ! empty( $img ) ) { ?>
	<figure class="p-0 pt-2 m-0 w-100">
		<div class="media">
			<img src="<?php echo $start->url;?>" data-src="<?php echo $img->url;?>" class="img-fluid soft" loading="lazy" alt="<?php echo $img->alt_text;?>" />
		</div>
		<?php if( isset( $image_caption )  && ! empty( $image_caption ) ) {?>
		<figcaption class="fs-5 pt-2">
			<?php echo $image_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
