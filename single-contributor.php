<?php
/**
 * The Template for displaying single Contributor posts.
 */

get_header(); ?>
<main id="main">
<?php
if( have_posts() ) : while( have_posts() ) : the_post();
	// Gotta set some defaults for custom fields.
	$fields = [];
	$fields = get_fields();
	$fields['grantee_organization'] = ( isset($fields['grantee_organization']) && ! empty($fields['grantee_organization']) ) ? $fields['grantee_organization'] : "";
	$fields['grantee_principal_link'] = ( isset($fields['grantee_principal_link']) && ! empty($fields['grantee_principal_link']) ) ? $fields['grantee_principal_link'] : "";;
	$fields['grantee_description'] = ( isset($fields['grantee_description']) && ! empty($fields['grantee_description']) ) ? $fields['grantee_description'] : "";
	$fields['grantee_project_name'] = ( isset($fields['grantee_project_name']) && ! empty($fields['grantee_project_name']) ) ? $fields['grantee_project_name'] : "";
	$fields['media_gallery'] = ( isset($fields['media_gallery']) && is_array($fields['media_gallery'])) ? $fields['media_gallery'] : [];
	$fields['grantee_headshot'] = ( isset($fields['grantee_headshot']) && ! empty($fields['grantee_headshot']) ) ? $fields['grantee_headshot'] : "";
	$fields['grantee_bio]'] = ( isset($fields['grantee_bio']) && ! empty($fields['grantee_bio']) ) ? $fields['grantee_bio'] : "";
	$fields['label'] = ( isset($fields['label']) && ! empty($fields['label']) ) ? $fields['label'] : "";
	$fields['background_image'] = ( isset($fields['background_image']) && ! empty($fields['background_image']) ) ? $fields['background_image'] : "";
	$fields['has_background_video'] = ( isset($fields['has_background_video']) && ! empty($fields['has_background_video']) ) ? $fields['has_background_video'] : "";
	$fields['spotlight_copy'] = ( isset($fields['spotlight_copy']) && ! empty($fields['spotlight_copy']) ) ? $fields['spotlight_copy'] : "";
	$fields['spotlight_attribution'] = ( isset($fields['spotlight_attribution']) && ! empty($fields['spotlight_attribution']) ) ? $fields['spotlight_attribution'] : "";
	$fields['show_spotlight'] = ( isset($fields['show_spotlight']) && ! empty($fields['show_spotlight']) ) ? $fields['show_spotlight'] : 0;
	$fields['column_widths'] = ( isset($fields['column_widths']) && ! empty($fields['column_widths']) ) ? explode("-",$fields['column_widths']) : ['33','33','33'];
	$fields['embed_aspect_ratio'] = ( isset($fields['embed_aspect_ratio']) ) ? $fields['embed_aspect_ratio'] : '';
	$fields['oembed_aspect_ratio'] = ( isset($fields['oembed_aspect_ratio']) ) ? $fields['oembed_aspect_ratio'] : '';
	$media_row_count = count($fields['media_gallery']);

	// Add an array to set some classes for stage column widths.
	if( $media_row_count ==  1 ) {
		$fields['column_widths'] = ['100'];
	} elseif( $media_row_count ==  2 ) {
		$fields['column_widths'] = ['50','50'];
	} else {
		$fields['column_widths'] = ['25', '50','25'];
	}

	$post_id = get_the_ID();

?>
<div class="container">
	<div class="row">
		<div class="col-xl-8">
			<h1 class="h2"><?php echo $fields['grantee_organization'];?></h1>
			<h2 class="project-name pb-4"><?php echo $fields['grantee_project_name'];?></h2>
		</div><!-- /.col-lg-8 -->
	</div>
	<div class="row d-flex justify-content-center pb-4">
		<div class="col-xl-8">
			<?php echo $fields['grantee_description'];?>
		</div><!-- /.col-lg-8 -->
	</div><!-- /.row -->
</div><!-- /.container -->
<?php if( isset( $fields['media_gallery'] )  && ! empty( $fields['media_gallery']) ) : // Begin #stage branch ?>
<div id="stage" class="has-ivory-buff-background-color my-6 px-4 px-xl-6">
	<div>
		<div class="row">
			<h2 class="visually-hidden"><?php _e("Contributor Work","rbn-pw");?></h2>
			<?php if( isset($fields['grantee_principal_link']['url']) ) :
				$title = ( isset( $fields['grantee_principal_link']['title'])  ) ? $fields['grantee_principal_link']['title'] : "";
				$url = ( isset( $fields['grantee_principal_link']['url'])  ) ? $fields['grantee_principal_link']['url'] : "";
				$target = ( isset( $fields['grantee_principal_link']['target'])  ) ? $fields['grantee_principal_link']['target'] : "";
				?>
				<div class="wp-block-button is-style-outline text-center has-raw-sienna-color py-4 pt-6">
					<a class="wp-block-button__link wp-element-button" href="<?php echo $url;?>" target="<?php echo $target;?>"><?php echo $title;?></a>
				</div>
			<?php endif;?>
		</div>
	</div>
	<div>
		<div class="items items-<?php echo $media_row_count;?> py-6">
			<?php foreach( $fields['media_gallery'] as $key => $item ) : $item['width'] = $fields['column_widths'][$key]; ?>
				<div class="w-100 rbn-w-<?php echo $fields['column_widths'][$key];?>">
			<?php if( $item['type'] == 'embed' ) {
				get_template_part('template-parts/embed','embed',$item);
			} elseif( $item['type'] == 'oembed' ) {
				get_template_part('template-parts/oembed','oembed',$item);
			} elseif( $item['type'] == 'image') {
				get_template_part('template-parts/image','image',$item);
			}?>
				</div>
			<?php endforeach; ?>
		</div>
	</div><!-- /.container -->
</div><?php endif; // End #stage branch ?>
<?php if( isset( $fields['grantee_bio'] ) && ! empty( $fields['grantee_bio'] )  ) : ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="d-xl-flex flex-wrap col-xl-8 justify-content-around pb-5">
			<h2 class="text-center w-100 pb-6"><?php _e('Contributor Profile','rbn-wp');?></h2>
			<?php if( isset( $fields['grantee_headshot'] ) && ! empty( $fields['grantee_headshot'] ) ) : ?>
			<figure class="d-block contributor-photo pb-5">
				<div class="mx-auto"><?php echo wp_get_attachment_image($fields['grantee_headshot'],'large',['class' => 'img-fluid']);
			$caption = wp_get_attachment_caption($fields['grantee_headshot']);
			if( $caption ) :?></div><figcaption class="fs-5 fst-italic pt-2"><?php echo $caption;?></figcaption><?php endif;?>
			</figure>
			<?php endif;?>
			<div class="w-100">
			<?php echo $fields['grantee_bio'] ;?>
			</div>
		</div><!-- /.d-flex -->
	</div><!-- /.row -->
</div><!-- /.container -->
<?php endif; ?>
<?php

$prev = get_previous_post();

if( $prev ) {
	$prev_permalink = get_the_permalink($prev->ID);
	$prev_title = get_field('grantee_organization',$prev->ID);
}

$next = get_next_post();

if( $next ) {
	$next_permalink = get_the_permalink($next->ID);
	$next_title = get_field('grantee_organization',$next->ID);
}
?>
<nav class="container">
	<div class="row ">
	<div class="col-xl-8 mx-auto">
	<h2 class="visually-hidden"><?php _e('Contibutors Navigation','rbn-pw');?></h2>
<?php if( $prev ) :?><div class="d-flex flex-wrap gap-4 pb-6 justify-content-between">
	<div class="col">
		<div class="left-arrow"><a class="text-start" href="<?php echo $prev_permalink;?>"><?php echo $prev_title;?></a></div>
	</div><?php endif;?>
	<?php if( $next ) :?>
	<div class="col text-right">
		<div class="right-arrow"><a class="text-end" href="<?php echo $next_permalink;?>"><?php echo $next_title;?></a></div>
	</div>
	<?php endif;?>
	</div>
	</div>
</nav>
<?php endwhile; endif; ?>
</main>
<script>
const navItems = document.querySelectorAll('.nav-item a');
navItems.forEach( (item) => {
	if(item.href.indexOf('/contributors') != -1) {
		item.classList.add('active');
	}
})
</script>
<?php
get_footer();
