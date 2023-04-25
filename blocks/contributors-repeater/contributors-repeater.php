<?php
/**
 * Contributors Repeater Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */
// Support custom "anchor" values.
 $anchor = '';
 if ( ! empty( $block['anchor'] ) ) {
	 $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $class_name = 'contributors-repeater';
 if ( ! empty( $block['className'] ) ) {
	 $class_name .= ' ' . $block['className'];
 }
 if ( ! empty( $block['align'] ) ) {
	 $class_name .= ' align' . $block['align'];
 }

$data = [];
$fields = get_field('contributors_repeater');
foreach( $fields as $key => $row ) {
	if( isset( $row['thumbnail'] ) && ! empty( $row['thumbnail'] ) ) {
		$data[$key] = array_merge($row, get_fields($row['contributor']->ID ) );
	}
}
?><?php if( ! is_admin()) :?>
 <div id="tiles" class="container">
	  <div class="row justify-content-sm-center">
<?php foreach( $data as $thumb ) : ?>
  		<div class="col col-12 col-sm-12 col-lg-4">
			<?php if( isset( $thumb['video'] ) && ! empty( $thumb['video'] ) ) :?>
	  		<div class="rbn-card loading"
			  data-bg="<?php echo $thumb['thumbnail']['sizes']['rbn-card']; // Video Background ?>">
			  <a href="<?php echo get_permalink($thumb['contributor']->ID);?>" class="sr" aria-label="<?php __('Link to contributor detail page for','rbn-pw');?> <?php echo $thumb['grantee_organization'];?>"></a>
				<label><?php echo $thumb['grantee_organization'];?></label>
		  		<video muted>
					<source src="<?php echo $thumb['video'];?>" type="video/mp4">
		  		</video>
	  		</div>
			<?php else: // Regular Background ?>
				<div class="rbn-card loading" data-bg="<?php echo $thumb['thumbnail']['sizes']['rbn-card'];?>">
					<a href="<?php echo get_permalink($thumb['contributor']->ID);?>" class="sr" aria-label="<?php __('Link to contributor detail page for','rbn-pw');?> <?php echo $thumb['grantee_organization'];?>"></a>
					<label><?php echo $thumb['grantee_organization'];?></label>
				  </div>
			<?php endif;?>
		</div><!-- end .col-lg-4 -->
<?php endforeach;?>
	  </div><!-- end .row -->
  </div><!-- end #tiles-->
 <?php else: ?>
	  <p><?php _e('Block Editor Preview is unavailable for this block.','rbn-pw');?></p>
<?php endif;?>













