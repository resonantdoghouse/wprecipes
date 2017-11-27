<?php

function wprecipes_scripts() {
	wp_enqueue_style( 'wprecipes_normalize', get_stylesheet_directory_uri() . '/src/css/normalize.css' );
	wp_enqueue_style( 'wprecipes_style', get_stylesheet_directory_uri() . '/build/css/style.min.css' );
	wp_enqueue_style( 'wprecipes_gfonts', 'https://fonts.googleapis.com/css?family=Lora|Nunito' );

	wp_enqueue_style( 'owl_carousel', get_stylesheet_directory_uri() . '/src/lib/owl-carousel/assets/owl.carousel.min.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'owl_carousel', get_stylesheet_directory_uri() . '/src/lib/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'wprecipes', get_stylesheet_directory_uri() . '/build/js/wprecipes.min.js', array( 'jquery', 'owl_carousel' ), '', true );

	wp_localize_script( 'wprecipes', 'wprecipes_rest_obj',
		array(
			'api_nonce' => wp_create_nonce( 'wp_rest' ),
			'api_url'   => site_url( '/wp-json/wp/v2/' ),
			'user_id'   => get_current_user_id(),
			'post_id'   => get_the_ID()
		)
	);
}

function wprecipes_register_endpoints() {
	register_rest_route(
		'wprecipes/v1',
		'/favourite/',
		array(
			'methods'  => 'POST',
			'callback' => 'wprecipes_add_favourite',
		)
	);
}

function wprecipes_add_favourite( WP_REST_Request $request ) {

	$favourite = get_post_meta( $request->get_param( 'id' ), 'favourite', true );
	if ( empty( $favourite ) ) {
		$favourite = 'ham';
		update_post_meta( $request->get_param( 'id' ), 'favourite', $favourite );

	} else {

		return new WP_Error( 'favourite_error', __( 'Already favourited', 'wpbasic' ), $request->get_param( 'id' ) );
	}

	return $favourite;

}