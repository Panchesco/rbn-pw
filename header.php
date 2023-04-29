<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
	<script>
		const newStyle = document.createElement('style');
		newStyle.innerHTML = ".rbn-card {opacity:0;}";
		document.querySelector('head').appendChild(newStyle)
	</script>
</head>
<body <?php body_class(["d-flex flex-column h-100"]); ?>>
<?php wp_body_open(); ?>
<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'rbn-pw' ); ?></a>
<?php get_template_part('template-parts/global-header', 'global-header', []);?>
	<main id="main">

