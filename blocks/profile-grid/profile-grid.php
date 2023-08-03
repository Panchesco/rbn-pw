<?php
/**
 * Profile Grid Block Template.
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
$anchor = "";
if (!empty($block["anchor"])) {
  $anchor = 'id="' . esc_attr($block["anchor"]) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = "";
if (!empty($block["className"])) {
  $class_name .= " " . $block["className"];
}
if (!empty($block["align"])) {
  $class_name .= " align" . $block["align"];
}
// Load values and assign defaults.
$grid = get_field("profiles");
?>
<div class="row d-flex pb-2">
<?php foreach ($grid as $row):
  extract($row); ?>
  <div class="col-xl-4  p-2 profile-card d-flex flex-column">
		<figure class="headshot">
			<?php if (!empty($headshot)):
     $postmeta = get_post_meta($headshot, "_wp_attachment_image_alt", true); ?>
			<img src="<?php echo wp_get_attachment_image_url(
     $headshot,
     "rbn-card",
     false,
     []
   ); ?>" alt="<?php echo $postmeta; ?>" />
			<?php
   endif; ?>
		</figure>
	<div class="card-body pt-4 px-4">
	  <header><h3 class="card-title pb-4"><?php echo $heading; ?></h3></header>
	  <?php if (
     !empty($body)
   ): ?><div class="body"><?php echo $body; ?></div><?php endif; ?>
	</div>
	<footer>
	 <?php if (!empty($footer)):
    echo $footer;
  endif; ?>
	</footer>
  </div>
  <?php
endforeach; ?>
</div><!-- /.row -->

