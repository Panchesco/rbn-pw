<div id="global-header" class="has-ivory-buff-background-color">
	<nav id="header" class="navbar navbar-expand-md container" aria-label="Global Navigation">
			<div class="navbar-toggler" data-bs-toggle="collapse" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle global navigation', 'rbn-pw' ); ?>">
				<div><input type="checkbox" class="visually-hidden" id="hi">
				  	<label id="toggle-label" class="menu me-auto" for="hi"><span><?php echo _e('Toggle Mobile Navigation','rbn-pw');?></span>
					  <div class="hamburger-wrapper">
				  		<div class="bar"></div>
				  		<div class="bar"></div>
				  		<div class="bar"></div>
					  </div>
					</label>
				</div>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<div class="d-flex ms-xl-auto flex-column">
			<?php
				// Loading WordPress Custom Menu (theme_location).
				wp_nav_menu(
					array(
						'menu_class'     => 'navbar-nav p-0 m-0 ms-md-auto has-sans-serif-font-family strtoupper order-2',
						'container'      => '',
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
						'walker'         => new WP_Bootstrap_Navwalker(),
						'theme_location' => 'main-menu',
					)
				);
			?>
			<div class="order-1 d-flex justify-content-xl-end">
				<?php $array = trp_custom_language_switcher(); ?>
				<?php //IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. ?>
				<ul id="language-switcher" data-no-translation class="d-flex py-5 py-lg-2">
					<?php foreach ($array as $name => $item){ ?>
							<li class="p-0">
								<?php if( get_locale() != $item['language_code'] ) : ?>
								<a href="<?php echo $item['current_page_url']?>"><?php echo trim( $item['language_name'] );?></a>
								<?php else :?>
								<?php echo trim( $item['language_name']); ?>
							<?php endif;?>
							</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div><!-- /.navbar-collapse -->
	</nav>
	<div id="butterfly" class="container">
		<div class="row d-flex justify-content-between">
			<div class="col-12 col-xl-6 d-flex flex-column">
				<?php global $post;  if( is_home() || is_front_page() ) : ?>
				<h1><?php bloginfo('sitename');?></h1>
				<h2 class="h2"><?php bloginfo('description');?></h2>
				<?php elseif( isset($post->post_type ) && in_array($post->post_type,['news','events','contributor']) ) : ?>
				<h1 class="fw-lighter order-2"><?php echo get_post_type_object($post->post_type)->label;?></h1>
				<h2 class="h1 order-1"><a href="<?php echo bloginfo('siteurl');?>"><?php bloginfo('sitename');?></a></h2>
				<?php else: ?>
				<?php if( isset( $post->post_type ) ) :?>
				<h1 class="fw-lighter order-2"><?php echo $post->post_title; ?></h1>
				<?php endif ;?>
				<h2 class="h1 order-1"><a href="<?php echo bloginfo('siteurl');?>"><?php bloginfo('sitename');?></a></h2>
				<?php endif;?>
			</div>
			<div class="d-none d-xl-block col-xl-6">
			<?php get_template_part('template-parts/header-spotlight','header-spotlight');?>
			</div>
		</div><!-- end .row -->
	</div><!-- end .container -->
</div>
