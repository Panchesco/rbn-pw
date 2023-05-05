<?php

if ( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_64415b741c749',
	'title' => 'Spotlight',
	'fields' => array(
		array(
			'key' => 'field_64415b743bcc0',
			'label' => 'Spotlight Copy',
			'name' => 'spotlight_copy',
			'aria-label' => '',
			'type' => 'textarea',
			'instructions' => '50 words max, please.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'rows' => 2,
			'placeholder' => '',
			'new_lines' => 'br',
		),
		array(
			'key' => 'field_64415ba93bcc1',
			'label' => 'Spotlight Attribution',
			'name' => 'spotlight_attribution',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_64546d0493a2c',
			'label' => 'Spotlight Options',
			'name' => 'show_spotlight',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => 'Show Spotlight',
				0 => 'Hide Spotlight',
			),
			'default_value' => 0,
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'events',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'news',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'contributor',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/spotlight-widget',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;
