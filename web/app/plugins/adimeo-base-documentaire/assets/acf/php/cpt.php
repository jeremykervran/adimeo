<?php

add_action( 'init', function() {
	register_post_type( 'base-documentaire', array(
		'labels' => array(
			'name' => 'Base documentaire',
			'singular_name' => 'Base documentaire',
			'menu_name' => 'Base documentaire',
			'all_items' => 'All Base documentaire',
			'edit_item' => 'Edit Base documentaire',
			'view_item' => 'View Base documentaire',
			'view_items' => 'View Base documentaire',
			'add_new_item' => 'Add New Base documentaire',
			'add_new' => 'Add New Base documentaire',
			'new_item' => 'New Base documentaire',
			'parent_item_colon' => 'Parent Base documentaire:',
			'search_items' => 'Search Base documentaire',
			'not_found' => 'No base documentaire found',
			'not_found_in_trash' => 'No base documentaire found in Trash',
			'archives' => 'Base documentaire Archives',
			'attributes' => 'Base documentaire Attributes',
			'insert_into_item' => 'Insert into base documentaire',
			'uploaded_to_this_item' => 'Uploaded to this base documentaire',
			'filter_items_list' => 'Filter base documentaire list',
			'filter_by_date' => 'Filter base documentaire by date',
			'items_list_navigation' => 'Base documentaire list navigation',
			'items_list' => 'Base documentaire list',
			'item_published' => 'Base documentaire published.',
			'item_published_privately' => 'Base documentaire published privately.',
			'item_reverted_to_draft' => 'Base documentaire reverted to draft.',
			'item_scheduled' => 'Base documentaire scheduled.',
			'item_updated' => 'Base documentaire updated.',
			'item_link' => 'Base documentaire Link',
			'item_link_description' => 'A link to a base documentaire.',
		),
		'public' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-media-document',
		'supports' => array(
			0 => 'title',
			1 => 'editor',
			2 => 'thumbnail',
			3 => 'custom-fields',
		),
		'delete_with_user' => false,
	) );
} );

