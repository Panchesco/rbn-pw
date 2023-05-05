
<?php
extract($args);
if( isset( $embed ) && ! empty( $embed ) ) { ?>
	<figure class="m-0 p-0">
		<div class="media"><?php echo $embed;?></div>
		<?php if( isset( $embed_caption )  && ! empty( $embed_caption ) ){?>
	<figcaption class="fs-5 fst-italic pt-2 pb-4">
			<?php echo $embed_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
