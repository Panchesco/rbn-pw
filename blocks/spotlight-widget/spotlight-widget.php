<?php
/**
 * spotlight widget Block Template.
 */
$spotlight = get_fields($post->ID);
if( $spotlight ) {
  $spotlight['show_spotlight'] = ( isset(  $spotlight['show_spotlight']  ) && ! empty($spotlight['show_spotlight'] ) ) ?  $spotlight['show_spotlight'] : 0;
}
 ?>
<?php if( $spotlight && $spotlight['show_spotlight'] == 1 ) :?>
<aside class="spotlight">
	 <p class="fst-italic"><?php echo $spotlight['spotlight_copy'];?></p>
	 <p class="text-end"><cite>&mdash; <?php echo $spotlight['spotlight_attribution'];?></cite></p>
</aside>
<?php endif;?>
