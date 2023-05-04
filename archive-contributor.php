<?php
/**
 * The Template for displaying Contributors Archive page.
 */

get_header();
?>
<div class="row mb-6">
<?php
if(is_active_sidebar('contributors-archive-page')) { dynamic_sidebar('contributors-archive-page');}?>
</div><!-- /.row -->
<?php
get_footer();
?>
