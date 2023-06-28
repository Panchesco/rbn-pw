<?php

namespace RbnPw;

class RbnContributorsGrid {

	 public $page_id;
	 public $post_id;
	 public $contributors_grid;
	 public $prev = false;
	 public $next = false;
	 public $contributors;
	 protected $contributors_post_id;
	 protected $grid_post_id;

	 function __construct( $page_id,$post_id ) {

			 $this->page_id = $page_id;
			  $this->post_id = $post_id;
			  $this->set_contributors();
			  $this->set_prev();
			  $this->set_next();
	 }

	 function set_contributors() {

	 $post = get_post($this->page_id);
	 $blocks = parse_blocks( $post->post_content );

	 $data = [];
	 $this->contributors = [];
	 foreach( $blocks as $row ) {
		 if( $row['blockName'] == 'acf/contributors-grid' )  {
			 if( isset( $row['attrs']['data']) ) {
				 if( is_array(  $row['attrs']['data'] ) ) {
					 $data[] = $row['attrs']['data'];
				 }
			 }
		 }
	 }

	 $i = 0;
	 foreach( $data as $row ) {
		 foreach( $row as  $key => $val) {
			 if( substr($key,0,1) != '_' ) {
				 if( $key == "contributors_grid_{$i}_contributor" ) {
					 $this->contributors[$i]['ID'] =  ($val);
					 $this->contributors[$i]['post_title'] =  get_the_title($val);
					 $this->contributors[$i]['permalink'] =  get_the_permalink($val);
				 $i++;
				 }
			 }
		 }
	 }
}

	 function set_prev() {
		 $i = -1;
		 foreach( $this->contributors as $key => $val ) {

			 if( $val['ID'] == $this->post_id ) {
				 if( isset( $this->contributors[$i] ) ) {
					  $this->prev = $this->contributors[$i];
					 return;
				 }
			 }
			 $i++;
		 }
		 $this->prev = false;
	 }


	 function set_next() {
		 $i = 1;

		 foreach( $this->contributors as $key => $val ) {
			 if( $val['ID'] == $this->post_id ) {
				 if( isset( $this->contributors[$i] ) ) {
					 $this->next = $this->contributors[$i];
					return;
				 }
			 }
			 $i++;
		 }
		 $this->next = false;
	 }

 } // End RbnContributorsGrid
