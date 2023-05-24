<?php
/**
 *RBN Logos Row Block Template.
 *
 */
$fields = get_fields();
if( isset( $fields['logos_block']) ) {
	extract($fields);
	$logo_count = count($logos_block);
	$cols_selector = ( $logo_count > 1 ) ? 12 / $logo_count : 4;
}
?>
<div class="logo-row">
<?php foreach( $logos_block as $logo) :	?>
	<div>
<?php if( isset($logo['links_to'])  && !empty($logo['links_to'])) :?><a href="<?php echo $logo['links_to'];?>" title="<?php echo $logo['link_title'];?>"><?php endif;?>
<?php echo wp_get_attachment_image($logo['logo'],'large',false,['class'=>'img-fluid']);?>
<?php if( isset($logo['links_to'])  && !empty($logo['links_to'])):?></a><?php endif;?>
	</div>
<?php endforeach;?>
</div>
