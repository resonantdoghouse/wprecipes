<?php
/**
 * Register ACF Fields
 */
if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'      => 'wprecipes_recipe',
		'title'    => 'WP Recipes',
		'fields'   => array(
			array(
				'key'          => 'wprecipes_recipe_ingredients',
				'name'         => 'wprecipes_recipe_ingredients',
				'type'         => 'repeater',
				'instructions' => 'list recipe ingredients: e.g. 1 cup brown sugar',
				'sub_fields'   => array(

					array(
						'key'           => 'wprecipes_recipe_ingredient_quantity',
						'label'         => 'Quantity',
						'name'          => 'quantity',
						'type'          => 'number',
						'default_value' => 1,
						'min'           => 1,
						'instructions'  => 'Amount',
						'step'          => 0.25,
					),
					array(
						'key'               => 'wprecipes_recipe_ingredient_quantity_measurement',
						'label'             => 'Quantity Measurement',
						'name'              => 'quantity-measurement',
						'type'              => 'select',
						'choices'           => array(
							'cup'        => 'cup(s)',
							'teaspoon'   => 'teaspoon(s)',
							'tablespoon' => 'tablespoon(s)',
							'gram'       => 'gram(s)',
							'kilogram'   => 'kilogram(s)',
							'milliliter' => 'milliliter(s)',
							'litre'      => 'litre(s)',
							'ounce'      => 'ounce(s)',
							'pound'      => 'pound(s)',
							'other'      => 'other',
						),
						'conditional_logic' => 0,
					),
					array(
						'key'               => 'wprecipes_recipe_ingredient_quantity_measurement_other',
						'label'             => 'Other',
						'name'              => 'other',
						'type'              => 'text',
						'instructions'      => 'Other e.g. clove, pinch',
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'wprecipes_recipe_ingredient_quantity_measurement',
									'operator' => '==',
									'value'    => 'other',
								),
							),
						),
					),
					array(
						'key'         => 'wprecipes_recipe_ingredient',
						'label'       => 'Ingredient',
						'name'        => 'ingredient',
						'type'        => 'text',
						'placeholder' => 'Ingredient',
					),
				),
				'button_label' => 'Add Ingredient',
				'min'          => 1,
				'max'          => '',
			),
			array(
				'key'       => 'wprecipes_related_products',
				'label'     => 'Related Products',
				'name'      => 'related_products',
				'type'      => 'relationship',
				'post_type' => 'product',
				'filters'   => array( 'search', 'taxonomy' ),
			),
			array(
				'key'   => 'wprecipes_recipe_gallery',
				'label' => 'Recipe Gallery',
				'name'  => 'recipe_gallery',
				'type'  => 'gallery',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'recipe',
				),
			),
		),
	) );

endif;