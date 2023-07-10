<?php
extract($args);
if( isset( $easy_video_player ) && ! empty( $easy_video_player) ) { ?>
	<figure class="m-0 p-0 pt-2">
		<div class="media"><?php /*do_shortcode('[evp_embed_video url="' . $easy_video_player . '" autoplay="false" muted="true"/]',true); */?></div>
		<?php if( isset( $easy_video_caption )  && ! empty( $easy_video_caption ) ){?>
		<figcaption class="fs-5 pt-2">
			<?php echo $easy_video_caption;?>
		</figcaption>
		<?php }?>
	</figure>
<?php } ?>
