<?php
extract($args);
if( isset( $easy_video_player ) && ! empty( $easy_video_player) ) { ?>
	<figure class="m-0 p-0">
		<div class="media"><?php /*do_shortcode('[evp_embed_video url="' . $easy_video_player . '" autoplay="false" muted="true"/]',true); */?></div>
		<?php if( isset( $easy_video_caption )  && ! empty( $easy_video_caption ) ){?>
		<figcaption class="fs-5 fst-italic pt-2 pb-4">
			<?php echo $easy_video_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
