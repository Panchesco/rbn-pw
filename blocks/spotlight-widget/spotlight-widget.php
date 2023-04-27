<?php
/**
 * spotlight widget Block Template.
 */
$spotlight = get_fields($post->ID);
 ?>
<aside class="spotlight">
	 <p class="fst-italic"><?php echo $spotlight['spotlight_copy'];?></p>
	 <p class="text-end"><cite>&mdash; <?php echo $spotlight['spotlight_attribution'];?></cite></p>
</aside>
