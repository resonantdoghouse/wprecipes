<?php

// Register Custom Taxonomy
function wprecipes_recipe_type() {

	$taxonomy_label = 'Recipe';
	$relations      = array( 'recipe' );

	$labels  = array(
		'name'                       => $taxonomy_label . ' Types',
		'singular_name'              => $taxonomy_label . ' Type',
		'menu_name'                  => $taxonomy_label . ' Types',
		'all_items'                  => 'All ' . $taxonomy_label . ' Types',
		'parent_item'                => 'Parent ' . $taxonomy_label . ' Type',
		'parent_item_colon'          => 'Parent ' . $taxonomy_label . ' Type:',
		'new_item_name'              => 'New ' . $taxonomy_label . ' Type Name',
		'add_new_item'               => 'Add New ' . $taxonomy_label . ' Type',
		'edit_item'                  => 'Edit ' . $taxonomy_label . ' Type',
		'update_item'                => 'Update ' . $taxonomy_label . ' Type',
		'view_item'                  => 'View ' . $taxonomy_label . ' Type',
		'separate_items_with_commas' => 'Separate ' . $taxonomy_label . ' Types with commas',
		'add_or_remove_items'        => 'Add or remove ' . $taxonomy_label . ' Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular ' . $taxonomy_label . ' Types',
		'search_items'               => 'Search ' . $taxonomy_label . ' Types',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No ' . $taxonomy_label . ' Types',
		'items_list'                 => $taxonomy_label . ' Types list',
		'items_list_navigation'      => $taxonomy_label . ' Types list navigation',
	);
	$rewrite = array(
		'slug'         => 'recipe-type',
		'with_front'   => true,
		'hierarchical' => true,
	);
	$args    = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
		'rewrite'           => $rewrite,
	);
	register_taxonomy( 'recipe-type', $relations, $args );

}