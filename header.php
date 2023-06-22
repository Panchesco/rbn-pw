<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/safari-pinned-tab.svg" color="#b85e00">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri();?>/dist/imgs/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>
<body <?php body_class(["d-flex flex-column h-100"]); ?>>
<?php wp_body_open(); ?>
<a href="#main" class="visually-hidden-focusable" tabindex="0"><?php esc_html_e( 'Skip to main content', 'rbn-pw' ); ?></a>
<?php //get_template_part('template-parts/special-collections-branding', 'global-header', []);?>
<?php get_template_part('template-parts/global-header', 'global-header', []);?>

