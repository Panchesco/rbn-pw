<?php
/**
 * The Template for displaying Contributors Archive page.
 */

get_header(); ?>
<main id="main" class="container">
<div class="row mb-6">
<?php
if(is_active_sidebar('contributors-archive-page')) { dynamic_sidebar('contributors-archive-page');}?>
</div><!-- /.row -->
</main>
<?php get_footer(); ?>
