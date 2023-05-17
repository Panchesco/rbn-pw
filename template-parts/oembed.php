<?php
extract($args);
if( isset( $oembed ) && ! empty( $oembed ) ) { ?>
<figure class="p-0 m-0 o-embed">
	<div class="media<?php echo " " . $oembed_aspect_ratio;?>"><?php echo $oembed;?></div>
	<?php if( isset( $oembed_caption )  && ! empty( $oembed_caption ) ) { ?>
	<figcaption class="fs-5 fst-italic pt-2 pb-4">
		<?php echo $oembed_caption;?>
	</figcaption>
	<?php } ?>
</figure>
<?php } ?>


