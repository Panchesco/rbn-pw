<?php
  /**
   * Global Header Spotlight Handler
   *
   * Spotlights can be added to individual page, event, post entries within those posts or
   * the Event Archives and News Archives landing pages via widgets by selecting the
   * Appearance > Widgets and adding a Spotlight Widget Block the Events - Archive Header and
   * News - Archive Header widgets.
   * Template part looks first for a Spotlight assigned to a single record and then to an widget.
   * If a single record's spotlight fields are entered, that is the spotlight that appears.
   * If not, but a spotlight widget has been added for the Archive page, then that is used.
   * If none of the above exist, nothing is shown.
   */
?>
<?php global $template; $base = basename($template,'.php'); $spotlight = get_fields($post->ID); ?>
<?php if( $spotlight && ! empty( $spotlight['spotlight_copy']) ) :?>
	<aside class="spotlight">
		<p class="fst-italic"><?php echo $spotlight['spotlight_copy'];?></p>
		<p class="text-end"><cite>&mdash; <?php echo $spotlight['spotlight_attribution'];?></cite></p>
	</aside>
<?php elseif( in_array( $base, ['archive-events','single-events'] ) ) : if(is_active_sidebar( 'events-header-spotlight' ) ) :
	dynamic_sidebar('events-header-spotlight');
 endif;?>
<?php elseif( in_array( $base, ['archive-news','single-news'] ) ) : if(is_active_sidebar( 'events-header-spotlight' ) ) :
		dynamic_sidebar('news-header-spotlight');endif;?>
<?php elseif( in_array( $base, ['archive-contributor','single-contributor'] ) ) : if(is_active_sidebar( 'contributors-header-spotlight' ) ) :
    dynamic_sidebar('contributors-header-spotlight');endif;?>
<?php endif;?>
