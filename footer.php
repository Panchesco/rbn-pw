
		<footer id="footer" class="mt-xl-4 pb-5">
			<div class="has-ivory-background-color mh-6">
				<div class="container">
					<div class="d-flex justify-content-end">
						<div class="d-inline-block py-3">&nbsp;</div>
					</div>
				</div><!--/.container -->
			</div><!-- e/.has-ivory-background-container -->
			<div class="container">
				<div class="row py-6 ">
					<div class="col py-4 py-xl-0 col-xl-7">
						<?php if ( is_active_sidebar( 'footer-area-one' ) ) : ?>
							<?php dynamic_sidebar( 'footer-area-one' );?>
						<?php endif;?>
					</div>
					<div class="col ps-5 ps-xl-0 pt-4 py-xl-0 col-xl-2">
					<?php
						if ( has_nav_menu( 'footer-menu' ) ) : // See function register_nav_menus() in functions.php
							/*
								Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
								Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
								!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
							*/
							wp_nav_menu(
								array(
									'container'       => 'nav',
									'container_class' => '',
									//'fallback_cb'     => 'WP_Bootstrap4_Navwalker_Footer::fallback',
									'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
									'theme_location'  => 'footer-menu',
									'items_wrap'      => '<ul class="p-0 m-0 sans-serif text-uppercase">%3$s</ul>',
								)
							);
						endif;
					?>
					</div><!-- /.col -->
					<div class="col py-4 py-xl-0 col-xl-3">
						<?php if ( is_active_sidebar( 'footer-area-two' ) ) : ?>
							<?php dynamic_sidebar( 'footer-areatwo' );?>
						<?php endif;?>
						<?php if( get_locale() == 'es_ES' ) : ?>
							<p class="text-end">
								<a class="no-decoration" href="#header" role="navigation" aria-label="Vuelva al comienzo de la pagina">
									<svg id="Group_199" data-name="Group 199" xmlns="http://www.w3.org/2000/svg" width="115.338" height="62" viewBox="0 0 115.338 62">
						  			<text id="Arriba" transform="translate(19.338)" fill="#fff" font-size="42" font-family="Oswald-ExtraLight, Oswald" font-weight="200"><tspan x="0" y="50">Arriba</tspan></text>
						  			<g id="Right_Arrow" data-name="Right Arrow" transform="translate(0 53.871) rotate(-90)">
										<rect id="Rectangle_21" data-name="Rectangle 21" width="38.204" height="0.889" transform="translate(0 3.395)" fill="#fff"/>
										<path id="Subtraction_1" data-name="Subtraction 1" d="M.028,7.675v0A4.032,4.032,0,0,0,2.069,6.256,3.965,3.965,0,0,0,2.88,3.84,4.019,4.019,0,0,0,0,0L26.88,3.839Z" transform="translate(12.653)" fill="#fff"/>
						  			</g>
									</svg>
								</a>
							</p>
						<?php else : ?>
							<p class="text-end"><a class="no-decoration" href="#header" role="navigation" aria-label="Scroll to top"><svg id="TOP" xmlns="http://www.w3.org/2000/svg" width="87.338" height="62" viewBox="0 0 87.338 62">
							  <text id="Top-2" data-name="Top" transform="translate(19.338)" fill="#fff" font-size="42" font-family="Oswald-ExtraLight, Oswald" font-weight="200"><tspan x="0" y="50">Top</tspan></text>
							  <g id="Right_Arrow" data-name="Right Arrow" transform="translate(0 53.871) rotate(-90)">
								<rect id="Rectangle_21" data-name="Rectangle 21" width="38.204" height="0.889" transform="translate(0 3.395)" fill="#fff"/>
								<path id="Subtraction_1" data-name="Subtraction 1" d="M.028,7.675v0A4.032,4.032,0,0,0,2.069,6.256,3.965,3.965,0,0,0,2.88,3.84,4.019,4.019,0,0,0,0,0L26.88,3.839Z" transform="translate(12.653)" fill="#fff"/>
							  </g>
							</svg></a></p>

						<?php endif;?>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
			<?php if ( is_active_sidebar( 'footer-area-three' ) ) : ?>
			<div class="container has-mineral-gray-color-background">
				 <div class="row">
					<div class="col">
					<?php
						dynamic_sidebar( 'footer-area-three' );
						if ( current_user_can( 'manage_options' ) ) : ?>
						<?php
						endif;
					?>
					</div><!-- /.col -->
				</div>
			</div>
			<?php endif;?>
		</footer><!-- /#footer -->
	<?php
		wp_footer();
	?>
</body>
</html>
