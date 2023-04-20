
		</main><!-- /#main -->
		<footer id="footer" class="footer mt-auto bg-black text-white">
			<div class="has-ivory-buff-background-color">
				<div class="container">
					<div class="row" style="height: 4.6875rem;">

					</div>
				</div>
			</div>
		  <div class="container py-5">
			<div class="row">
				<div class="col col-12 col-xl-3">
					Special Collections
				</div>
				<div class="col col-12 col-xl-6">
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
								'items_wrap'      => '<ul class="d-flex flex-column sans-serif">%3$s</ul>',
							)
						);
					endif;?>
				</div>
				<div class="col col-xl-3">
				</div>
			</div>
		  </div>
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
</body>
</html>
