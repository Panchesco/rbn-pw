<?php
/**
 * Profile Card Block Template.
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
$class_name = 'testimonial-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$profile_card             = get_field( 'profile_card' ) ?: ['name' => "" ,'title_affiliation' => "", 'footer' => ""];
extract($profile_card);
?>
  <div class="card rbn-profile-card">
	<?php if( ! empty( $headshot ) ) :?><?php echo wp_get_attachment_image( $headshot,'thumbnail',false,['class'=>'card-img-top'] );?><?php endif;?>
	<div class="card-body">
	  <h2 class="card-title"><?php echo $name;?></h2>
	  <?php if( ! empty( $title_affiliation ) ) :?><p class="card-text"><?php echo $title_affiliation;?></p><?php endif;?>
	</div><?php if( ! empty( $title_affiliation ) ) :?>
	<div class="card-footer">
	  <?php echo $footer;?>
	</div><?php endif;?>
  </div>

