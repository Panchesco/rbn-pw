<div id="global-header" class="has-ivory-buff-background-color">
	<nav id="header" class="navbar navbar-expand-md container">
			<div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'rbn-pw' ); ?>">
				<div>
					<input type="checkbox" id="hi">
				  	<label class="menu me-auto" for="hi">
				  		<div class="bar"></div>
				  		<div class="bar"></div>
				  		<div class="bar"></div>
					</label>
				</div>
			</div>
			<div id="navbar" class="collapse navbar-collapse pt-4">
			<div class="d-xl-flex ms-xl-auto flex-xl-column">
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
		<div class="d-flex order-1 ms-md-auto">
			<?php $array = trp_custom_language_switcher();?>
			<?php //IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. ?>
			<ul id="language-switcher" data-no-translation class="d-flex py-4">
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
		<div class="row d-flex justify-content-between">
			<div class="col-12 col-xl-6 d-flex flex-column">
				<?php global $post;  if( is_home() || is_front_page() ) : ?>
				<h1><?php bloginfo('sitename');?></h1>
				<p class="h2"><?php bloginfo('description');?></p>
				<?php elseif( in_array($post->post_type,['news','events','contributors']) ) : ?>
				<h1 class="h2 order-2"><?php echo get_post_type_object($post->post_type)->label;?></h1>
				<p class="h1 order-1"><a href="<?php echo bloginfo('siteurl');?>"><?php bloginfo('sitename');?></a></p>
				<?php else: ?>
				<h1 class="h2 order-2"><?php echo $post->post_title; ?></h1>
				<p class="h1 order-1"><a href="<?php echo bloginfo('siteurl');?>"><?php bloginfo('sitename');?></a></p>
				<?php endif;?>
			</div>
			<div class="d-none d-xl-block col-xl-6">
				<?php $spotlight = get_fields($post->ID); ?>
				<?php if( $spotlight && ! empty( $spotlight['spotlight_copy']) ) :?>
					<aside class="spotlight">
						<p class="fst-italic"><?php echo $spotlight['spotlight_copy'];?></p>
						<p class="text-end"><cite>&mdash; <?php echo $spotlight['spotlight_attribution'];?></cite></p>
					</aside>
				<?php endif;?>
			</div>
		</div><!-- end .row -->
	</div><!-- end .container -->
</div>
