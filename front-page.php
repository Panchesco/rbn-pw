<?php
/**
 * Template Name: Homepage
 */
 get_header();?>
 <main id="main" class="container">
 <?php if( have_posts() ) :
     while( have_posts() ):
         the_post();
         the_content();
endwhile;
endif;?>
</main>
 <?php get_footer();?>
