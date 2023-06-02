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

global $template;
$base = basename($template,'.php');
if( isset( $post->ID ) ) {
$spotlight = get_fields($post->ID);

$archives = ['archive-events','archive-news'];

if( ! in_array( $base, $archives ) ) {
  if( isset( $spotlight['show_spotlight'] ) && $spotlight['show_spotlight']  == 1 ) { ?>
	  <?php if( isset( $spotlight['spotlight_copy'] ) && ! empty( $spotlight['spotlight_copy'] ))  : ?>
    <aside class="spotlight">
      <p class="fst-italic"><?php echo $spotlight['spotlight_copy'];?></p>
      <?php if( isset( $spotlight['spotlight_attribution'] ) && ! empty($spotlight['spotlight_attribution']) ) :?><cite class="text-end">&mdash; <?php echo $spotlight['spotlight_attribution'];?></cite><?php endif;?>
    </aside>
	<?php endif;?>
  <?php }
} else {
  if( $base == 'archive-events' ) {
    if( is_active_sidebar( 'events-header-spotlight' ) ) {
      dynamic_sidebar( 'events-header-spotlight' );
    }
  } elseif( $base == 'archive-news' ) {
    if( is_active_sidebar( 'news-header-spotlight' ) ) {
    dynamic_sidebar( 'news-header-spotlight' );
  }
  }
}
}?>

