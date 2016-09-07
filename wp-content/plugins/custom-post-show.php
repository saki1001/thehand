<?php
   /*
   Plugin Name: Show Posts by Rayogram
   Description: This plugin creates custom posts that display shows by The Hand.
   Version: 1.0
   Author: rayogram
   Author URI: http://rayogram.com
   License: GPL2
   */

	// Register Custom Post Type
	function custom_post_show() {

		$labels = array(
			'name'                  => 'Shows',
			'singular_name'         => 'Show',
			'menu_name'             => 'Shows',
			'name_admin_bar'        => 'Show',
			'archives'              => 'Show Archives',
			'parent_item_colon'     => 'Parent Show:',
			'all_items'             => 'All Shows',
			'add_new_item'          => 'Add New Show',
			'add_new'               => 'Add New',
			'new_item'              => 'New Show',
			'edit_item'             => 'Edit Show',
			'update_item'           => 'Update Show',
			'view_item'             => 'View Show',
			'search_items'          => 'Search Show',
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into Show',
			'uploaded_to_this_item' => 'Uploaded to this Show',
			'items_list'            => 'Shows list',
			'items_list_navigation' => 'Shows list navigation',
			'filter_items_list'     => 'Filter Shows list',
		);
		$args = array(
			'label'                 => 'Show',
			'description'           => 'A show contains a title, images, and description.',
			'labels'                => $labels,
			'supports'              => array( 'title', 'author', 'thumbnail', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => false,
			'capability_type'       => 'post',
		);
		register_post_type( 'show', $args );

	}
	add_action( 'init', 'custom_post_show', 0 );