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
		<ul class="order-lg-1">
			<li><a href="/">English</a></li>
			<li><a href="/es">Español</a></li>
		</ul>
			</div>
	</div><!-- /.navbar-collapse -->
	</nav>
	<div class="container">
		<div class="row align-items-end">
			<div class="col-12 col-lg-6">
				<h1><?php bloginfo('sitename');?></h1>
				<p class="h2"><?php bloginfo('description');?></p>
			</div>
			<div class="d-none d-lg-block col-lg-6">
				[spotlight]
			</div>
		</div><!-- end .row -->
	</div><!-- end .container -->
</div>
