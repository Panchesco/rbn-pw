<?php
/**
 * Template Name: Homepage 
 */
 
 
 get_header();
 
 $data = [];
 $args = array(
	 'post_type' => 'grantee-project',
	 'posts_per_page' => -1,
	 'orderby' => 'title',
	 'order' => 'ASC'
  );
  
  
  $acf_fields = ['grantee-location',
                 'grantee_organization',
                 'grantee_principal_link',
                 'grantee_description',
                 'grantee_project_name',
                 'grantee_background_image',
                 'grantee_bio',
                 'grantee_background_video'
               ];
 
  $grantees = new WP_Query( $args );
 
  foreach($grantees->posts as $key => $row) {
	  $data[$key] = $row;
	  $data[$key]->taxonomies = get_the_terms($row->ID,'grantee-location');
	  $data[$key]->acf = get_fields($row->ID);
	  
    // Set default values for expected acf fields
    foreach( $acf_fields as $field ) {
      if( ! isset( $data[$key]->acf[$field] ) ) {
        $data[$key]->acf[$field] = false;
      }
    }
  }

 the_post();
 ?>
 <div id="intro" class="container">
	 <div class="row justify-content-sm-center">
		 <div class="col col-sm-12 col-md-10">
<?php
	the_content();
?>		</div>
	 </div><!-- end .row -->
 </div><!-- end #intro -->
 <div id="tiles" class="container">
	  <div class="row justify-content-sm-center">	  
 <?php foreach( $data as $key => $row ) { if( $row->acf['grantee_background_image'] ) { ?>
   
   <?php if( $row->acf['grantee_background_video'] ) { ?> 
  <div class="col col-12 col-sm-12 col-lg-4">
      <div class="rbn-card loading"  data-bg="<?php echo $row->acf['grantee_background_image'];?>">
        <a href="<?php echo get_the_permalink($row->ID);?>"></a>
        <label><?php echo $row->acf['grantee_organization'];?></label>
          <video muted>
            <source src="<?php echo $row->acf['grantee_background_video'];?>" type="video/mp4">
          </video>
      </div>
    </div><!-- end .ratio -->   
   <?php } else {?> 
  <div class="col col-12 col-sm-12 col-lg-4">
     <div class="rbn-card loading"  data-bg="<?php echo $row->acf['grantee_background_image'];?>">
       <a href="<?php echo get_the_permalink($row->ID);?>"></a>
       <label><?php echo $row->acf['grantee_organization'];?></label>
     </div>
   </div><!-- end .ratio -->   
    <?php } ?>
	 
	 <?php } } ?>		
	  </div><!-- end .row -->
  </div><!-- end #tiles-->
 <?php
 get_footer();
 