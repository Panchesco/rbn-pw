<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63f54965e704b',
	'title' => 'Contributor',
	'fields' => array(
		array(
			'key' => 'field_64011485cb73a',
			'label' => 'Organization',
			'name' => 'grantee_organization',
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
			'key' => 'field_643456c66a86d',
			'label' => 'Project Name',
			'name' => 'grantee_project_name',
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
			'key' => 'field_63f54b40b0e5e',
			'label' => 'Description',
			'name' => 'grantee_description',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
			'delay' => 0,
		),		array(
			'key' => 'field_64553d4585c3d',
			'label' => 'Media Gallery',
			'name' => 'media_gallery',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 3,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_64553dc885c3e',
					'label' => 'Type',
					'name' => 'type',
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
						'image' => 'Image',
						'oembed' => 'oEmbed',
						'embed' => 'Embed',
					),
					'default_value' => 'image',
					'return_format' => 'value',
					'allow_null' => 0,
					'other_choice' => 0,
					'layout' => 'vertical',
					'save_other_choice' => 0,
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
					'key' => 'field_64553e74266d1',
					'label' => 'Image',
					'name' => 'image',
					'aria-label' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64553dc885c3e',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'preview_size' => 'medium',
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
				'key' => 'field_6455416865749',
				'label' => 'Image Caption',
				'name' => 'image_caption',
				'aria-label' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_64553dc885c3e',
							'operator' => '==',
							'value' => 'image',
						),
					),
				),
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
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
					'key' => 'field_64553ea4852f2',
					'label' => 'oEmbed',
					'name' => 'oembed',
					'aria-label' => '',
					'type' => 'oembed',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64553dc885c3e',
								'operator' => '==',
								'value' => 'oembed',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'width' => '',
					'height' => '',
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
					'key' => 'field_6455419930cab',
					'label' => 'oEmbed Caption',
					'name' => 'oembed_caption',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64553dc885c3e',
								'operator' => '==',
								'value' => 'oembed',
							),
						),
					),
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
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
					'key' => 'field_64553f5a6ad85',
					'label' => 'Code Block/Embedded HTML',
					'name' => 'embed',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64553dc885c3e',
								'operator' => '==',
								'value' => 'embed',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'rows' => 4,
					'placeholder' => '',
					'new_lines' => '',
					'parent_repeater' => 'field_64553d4585c3d',
				),
				array(
					'key' => 'field_645541da7ba8c',
					'label' => 'Code Block/Embedded HTML Caption',
					'name' => 'embed_caption',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64553dc885c3e',
								'operator' => '==',
								'value' => 'embed',
							),
						),
					),
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
					'parent_repeater' => 'field_64553d4585c3d',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'contributor',
				),
			),
		),		array(
			'key' => 'field_643472a1147f7',
			'label' => 'Grantee Headshot',
			'name' => 'grantee_headshot',
			'aria-label' => 'Grantee Headshot',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
		),
		array(
			'key' => 'field_63f54b61b0e5f',
			'label' => 'Bio',
			'name' => 'grantee_bio',
			'aria-label' => 'Bio',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
			'delay' => 0,
		),
		array(
			'key' => 'field_6455437cbb892',
			'label' => 'Principal Link',
			'name' => 'grantee_principal_link',
			'aria-label' => '',
			'type' => 'link',
			'instructions' => 'The link you add (if any) should point to one of three locations: 1.	The grantee\'s exhibit in the digital archive; 2. The self-hosted DoOO website; 3. The grantee\'s self-hosted website elsewhere on the web.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'contributor',
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

if ( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_644d773dbd243',
	'title' => 'Contributor Thumbnail Card',
	'fields' => array(
		array(
			'key' => 'field_644d773eeee19',
			'label' => 'Label',
			'name' => 'label',
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
			'key' => 'field_644d77bb1b800',
			'label' => 'Background Image',
			'name' => 'background_image',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'jpg,jpeg,png,gif',
			'preview_size' => 'rbn-card',
		),
		array(
			'key' => 'field_644d81892d572',
			'label' => 'Add background video?',
			'name' => 'has_background_video',
			'aria-label' => '',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				0 => 'No',
				1 => 'Yes',
			),
			'default_value' => 0,
			'return_format' => 'value',
			'allow_null' => 0,
			'layout' => 'horizontal',
		),
		array(
			'key' => 'field_644d77d71b801',
			'label' => 'Background Video',
			'name' => 'background_video',
			'aria-label' => '',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_644d81892d572',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'contributor',
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


