
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
					<div class="col py-4 py-xl-0 col-xl-2">
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
						<p class="text-end"><a class="no-decoration" href="#header" title="Scroll to top"><img src="/wp-content/themes/rbn-pw/dist/imgs/svg/top.svg" alt="Scroll to top link"></a></p>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
			<?php if ( is_active_sidebar( 'footer-area-three' ) ) : ?>
			<div class="container has-mineral-gray-color-background">
				 <div class="row">
					<div class="col">
					<?php
						dynamic_sidebar( 'footer-area-three' );
						if ( current_user_can( 'manage_options' ) ) :
					?>
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
