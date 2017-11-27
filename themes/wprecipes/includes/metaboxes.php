<?php
/**
 * CMB2 MetaBoxes
 */
function wprecipes_metaboxes() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_wprecipes_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'           => 'test_metabox',
		'title'        => __( 'Test Metabox', 'cmb2' ),
		'object_types' => array( 'recipe' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
	) );

	// Ingredient
	$cmb->add_field( array(
		'name'       => __( 'Ingredient', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'ingredient',
		'type'       => 'text',
		'repeatable' => true,
	) );
}