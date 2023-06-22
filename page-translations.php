<?php
/**
 * This is a workaround template translating any loose strings the non-subscription
 * version of the translation plugin doesn't handle natively.
 */

get_header();

$data = [];
$args = array(
	'post_type' => 'attachment',
	'numberposts' => -1
);
$media = get_posts($args);

if( $media ) {
	foreach( $media as $key => $post ) {
		setup_postdata( $post );
			$id = get_the_ID();
			$data[$key]['id'] = $id;
			$data[$key]['title'] = get_the_title();
			$data[$key]['alt'] = get_post_meta($id, '_wp_attachment_image_alt', TRUE);
			$data[$key]['description'] = wp_get_attachment_caption( $id );
			$data[$key]['caption'] = wp_get_attachment_caption( $id );
		}
}

?>
<main id="main" class="container">
	<div class="row d-xl-flex justify-content-end">
<?php foreach($data as $img) :?>
		<div class="col-8">
			<figure class="has-silver-medal-background-color p-4 mb-4">
				<?php echo wp_get_attachment_image( $img['id'], 'large', false, ['class' => 'pb-4'] );?>
				<figcaption>

					<h1 class="h3 pt-0 pb-2"><strong>Title:</strong> <?php echo $img['title'];?></h1>
					<p class="pt-2"><strong>Alternative text:</strong> <?php if( ! empty($img['alt']) ): ?><?php echo $img['alt'];?><?php else: ?>
						<span class="alert"><a href="/wp-admin/upload.php?item=<?php echo $img['id'];?>" target="_blank"><?php _e('Add alternative text','rbn-pw');?></a></span>
					<?php endif;?></p>
				</figcaption>
			</figure>
		</div>
<?php endforeach;?>
	</div>
</main>
<?php get_footer(); ?>
