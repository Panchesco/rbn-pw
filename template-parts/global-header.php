<div id="global-header" class="has-ivory-buff-background-color">
	<nav id="header" class="navbar navbar-expand-md container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'rbn-pw' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
			<div id="navbar" class="collapse navbar-collapse">
			<div class="d-flex ms-auto flex-column">
			<?php
				// Loading WordPress Custom Menu (theme_location).
				wp_nav_menu(
					array(
						'menu_class'     => 'navbar-nav ms-auto has-sans-serif-font-family strtoupper order-lg-2',
						'container'      => '',
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
						'walker'         => new WP_Bootstrap_Navwalker(),
						'theme_location' => 'main-menu',
					)
				);
			?>
		<div class="order-lg-1">
			<?php $array = trp_custom_language_switcher();?>
			<?php //IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. ?>
			<ul id="language-switcher" data-no-translation class="d-flex justify-content-end">
				<?php foreach ($array as $name => $item){ ?>
						<li>
							<a href="<?php echo $item['current_page_url']?>">
								<span><?php echo $item['language_name']?>
								</span>
							</a>
						</li>
				<?php } ?>
			</ul>
		</div>
			</div>
	</div><!-- /.navbar-collapse -->
	</nav>
	<div class="container">
		<div class="row align-items-end">
			<div class="col-12 col-xl-6">
				<?php global $post;  if( is_home() || is_front_page() ) : ?>
				<h1><?php bloginfo('sitename');?></h1>
				<p class="h2"><?php bloginfo('description');?></p>
				<?php elseif( in_array($post->post_type,['news','events']) ) : ?>
				<h1 class="h2"><?php echo get_post_type_object($post->post_type)->label;?></h1>
				<p class="h1"><?php bloginfo('sitename');?></p>

				<?php endif;?>
			</div>
			<div class="d-lg-none d-xl-block col-xl-6">
				[spotlight]
			</div>
		</div><!-- end .row -->
	</div><!-- end .container -->
</div>
