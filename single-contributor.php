<?php

/**
 * The Template for displaying single Contributor posts.
 */

get_header(); ?>
<main id="main">
<?php
if( have_posts() ) : while( have_posts() ) : the_post();
$fields = get_fields();
$media_row_count = count($fields['media_gallery']);
$stage_cols = ( $media_row_count < 3 ) ? 6 : 4; // set bootstrap col size for stage
$post_id = get_the_ID();
?>
<div class="container">
	<div class="row">
		<div class="col-xl-8">
			<h1 class="h2"><?php echo $fields['grantee_organization'];?></h1>
			<h2 class="project-name pb-4"><?php echo $fields['grantee_project_name'];?></h2>
		</div><!-- /.col-lg-8 -->
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-xl-8">
			<?php echo $fields['grantee_description'];?>
		</div><!-- /.col-lg-8 -->
	</div><!-- /.row -->
</div><!-- /.container -->
<?php if( isset( $fields['media_gallery'] )  && ! empty( $fields['media_gallery']) ) : // Begin #stage branch ?>
<div id="stage" class="has-ivory-buff-background-color my-6 p-6">
	<div class="container">
		<div class="row pb-4">
			<h2 class="visually-hidden"><?php _e("Contributor Work","rbn-pw");?></h2>
			<?php if( isset($fields['grantee_principal_link']['url']) ) :
				$title = ( isset( $fields['grantee_principal_link']['title'])  ) ? $fields['grantee_principal_link']['title'] : "";
				$url = ( isset( $fields['grantee_principal_link']['url'])  ) ? $fields['grantee_principal_link']['url'] : "";
				$target = ( isset( $fields['grantee_principal_link']['target'])  ) ? $fields['grantee_principal_link']['target'] : "";
				?>
				<div class="wp-block-button is-style-outline text-center has-raw-sienna-color pb-5">
					<a class="wp-block-button__link wp-element-button" href="<?php echo $url;?>" target="<?php echo $target;?>"><?php echo $title;?></a>
				</div>
			<?php endif;?>
		</div>
	</div>
	<div class="container">
		<div class="d-xl-flex justify-content-center gap-xl-6 pb-5">
			<?php foreach( $fields['media_gallery'] as $item ) : ?>
				<div class="d-flex col-lg-6 align-items-center">
			<?php if( $item['type'] == 'embed' ) {
				get_template_part('template-parts/embed','embed',$item);
			} elseif( $item['type'] == 'image' ) {
				get_template_part('template-parts/image','embed',$item);
			} elseif( $item['type'] == 'oembed') {
				get_template_part('template-parts/oembed','embed',$item);
			}?>
				</div>
			<?php endforeach; ?>
		</div>
	</div><!-- /.container -->
</div><?php endif; // End #stage branch ?>
<?php if( isset( $fields['grantee_bio'] ) && ! empty( $fields['grantee_bio'] )  ) : ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="d-xl-flex flex-wrap col-xl-8 justify-content-around pb-6">
			<h2 class="text-center pb-<?php echo $stage_cols;?> w-100"><?php _e('Contributor Profile','rbn-wp');?></h2>
			<?php if( isset( $fields['grantee_headshot'] ) && ! empty( $fields['grantee_headshot'] ) ) : ?>
			<figure class="contributor-photo d-inline-block mx-auto pb-4">
			<?php echo wp_get_attachment_image($fields['grantee_headshot'],'rbn-card',['class' => 'mx-auto pb-6']);
			$caption = wp_get_attachment_caption($fields['grantee_headshot']);
			if( $caption ) :?><figcaption><p><?php echo $caption;?></p></figcaption><?php endif;?>
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
$prev_permalink = get_the_permalink($prev->ID);
$prev_title = get_field('grantee_organization',$prev->ID);
$next = get_next_post();
$next_permalink = get_the_permalink($next->ID);
$next_title = get_field('grantee_organization',$next->ID);
?>
<nav class="container">
	<div class="row justify-content-around">
	<h2 class="visually-hidden"><?php _e('Contibutors Navigation','rbn-pw');?></h2>
<?php if( $prev ) :?><div class="d-xl-flex flex-wrap col-xl-8 gap-6 pb-6">
	<div class="col">
		<div class="left-arrow"><a class="text-start" href="<?php echo $prev_permalink;?>"><?php echo $prev_title;?></a></div>
	</div><?php endif;?>
	<?php if( $next ) :?>
	<div class="col">
		<div class="right-arrow"><a class="text-end" href="<?php echo $next_permalink;?>"><?php echo $next_title;?></a></div>
	</div>
	<?php endif;?>
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
