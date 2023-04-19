	<header>
	<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
					$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

					if ( ! empty( $header_logo ) ) :
				?>
					<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php
					else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
					endif;
				?>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'rbn-pw' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navbar" class="collapse navbar-collapse">
				<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
						array(
							'menu_class'     => 'navbar-nav me-auto',
							'container'      => '',
							'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							'walker'         => new WP_Bootstrap_Navwalker(),
							'theme_location' => 'main-menu',
						)
					);

					if ( '1' === $search_enabled ) :
				?>
						<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="input-group">
								<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'rbn-pw' ); ?>" title="<?php esc_attr_e( 'Search', 'rbn-pw' ); ?>" />
								<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'rbn-pw' ); ?></button>
							</div>
						</form>
				<?php
					endif;
				?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav><!-- /#header -->
</header>
