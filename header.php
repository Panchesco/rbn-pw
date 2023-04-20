<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(["d-flex flex-column h-100"]); ?>>
<?php wp_body_open(); ?>
<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'rbn-pw' ); ?></a>
<div id="wrapper">
<?php get_template_part('template-parts/global-header', 'global-header', []);?>
	<main id="main" class="container">

