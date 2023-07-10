<?php
extract($args);
if( isset( $oembed ) && ! empty( $oembed ) ) { ?>
<figure class="p-0 pt-2 m-0 o-embed w-100">
	<div class="media<?php echo " " . $oembed_aspect_ratio;?>"><?php echo $oembed;?></div>
	<?php if( isset( $oembed_caption )  && ! empty( $oembed_caption ) ) { ?>
	<figcaption class="fs-5 pt-2">
		<?php echo $oembed_caption;?>
	</figcaption>
	<?php } ?>
</figure>
<?php } ?>


