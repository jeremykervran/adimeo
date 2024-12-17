<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key' => 'group_67615ed1a5bc5',
	'title' => 'Base documentaire',
	'fields' => array(
		array(
			'key' => 'field_67615ed19e656',
			'label' => 'Document',
			'name' => 'document',
			'aria-label' => '',
			'type' => 'file',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => 5,
			'mime_types' => 'pdf',
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_67615f309e657',
			'label' => 'Date de publication',
			'name' => 'date_de_publication',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_67615f4f9e658',
					'label' => 'Année',
					'name' => 'annee',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
					),
					'default_value' => false,
					'return_format' => 'array',
					'multiple' => 0,
					'allow_null' => 0,
					'allow_in_bindings' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_676160679e659',
					'label' => 'Mois',
					'name' => 'mois',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
					),
					'default_value' => false,
					'return_format' => 'array',
					'multiple' => 0,
					'allow_null' => 0,
					'allow_in_bindings' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_6761607c9e65a',
					'label' => 'Jour',
					'name' => 'jour',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
					),
					'default_value' => false,
					'return_format' => 'array',
					'multiple' => 0,
					'allow_null' => 0,
					'allow_in_bindings' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_676160a59e65b',
			'label' => 'Description',
			'name' => 'description',
			'aria-label' => '',
			'type' => 'textarea',
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
			'allow_in_bindings' => 0,
			'rows' => '',
			'placeholder' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'base-documentaire',
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
	'show_in_rest' => 1,
) );

