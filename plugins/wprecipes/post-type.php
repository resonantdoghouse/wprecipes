<?php
/**
 * Register Recipe Post Type
 */
function wprecipes_recipe_post_type() {

	$post_type_name = 'Recipe';
	$singular       = $post_type_name;
	$plural         = $post_type_name . 's';

	$labels = array(
		'name'                  => _x( $plural, 'Post Type General Name', 'wprecipes' ),
		'singular_name'         => _x( $singular, 'Post Type Singular Name', 'wprecipes' ),
		'menu_name'             => __( $plural, 'wprecipes' ),
		'name_admin_bar'        => __( $singular, 'wprecipes' ),
		'archives'              => __( $singular . ' Archives', 'wprecipes' ),
		'attributes'            => __( $singular . ' Attributes', 'wprecipes' ),
		'parent_item_colon'     => __( 'Parent ' . $singular . ':', 'wprecipes' ),
		'all_items'             => __( 'All Recipes', 'wprecipes' ),
		'add_new_item'          => __( 'Add New ' . $singular, 'wprecipes' ),
		'add_new'               => __( 'Add New', 'wprecipes' ),
		'new_item'              => __( 'New ' . $singular, 'wprecipes' ),
		'edit_item'             => __( 'Edit ' . $singular, 'wprecipes' ),
		'update_item'           => __( 'Update ' . $singular, 'wprecipes' ),
		'view_item'             => __( 'View ' . $singular, 'wprecipes' ),
		'view_items'            => __( 'View ' . $plural, 'wprecipes' ),
		'search_items'          => __( 'Search ' . $singular, 'wprecipes' ),
		'not_found'             => __( $singular . ' Not found', 'wprecipes' ),
		'not_found_in_trash'    => __( $singular . ' Not found in Trash', 'wprecipes' ),
		'featured_image'        => __( $singular . ' Featured Image', 'wprecipes' ),
		'set_featured_image'    => __( 'Set ' . $singular . ' featured image', 'wprecipes' ),
		'remove_featured_image' => __( 'Remove ' . $singular . ' featured image', 'wprecipes' ),
		'use_featured_image'    => __( 'Use as ' . $singular . ' featured image', 'wprecipes' ),
		'insert_into_item'      => __( 'Insert into ' . $singular, 'wprecipes' ),
		'uploaded_to_this_item' => __( 'Uploaded ' . $singular . ' to this item', 'wprecipes' ),
		'items_list'            => __( $plural . ' list', 'wprecipes' ),
		'items_list_navigation' => __( $plural . ' list navigation', 'wprecipes' ),
		'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'wprecipes' ),
	);
	$args   = array(
		'label'               => __( $singular, 'wprecipes' ),
		'description'         => __( 'WP Recipes', 'wprecipes' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-carrot',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'recipe', $args );

}