<?php

/**
 * WP Recipes Boot
 */
require_once __DIR__ . '/includes/setup.php';
require_once __DIR__ . '/includes/widgets.php';
require_once __DIR__ . '/includes/menus.php';
require_once __DIR__ . '/includes/enqueue.php';
require_once __DIR__ . '/includes/walker.php';
require_once __DIR__ . '/includes/acf-fields.php';
require_once __DIR__ . '/includes/customizer.php';
require_once __DIR__ . '/includes/admin/_dashboard.php';
require_once __DIR__ . '/includes/admin/remove-menus.php';


/**
 * Actions & Hooks
 */
add_action( 'init', 'wprecipes_menus' );
add_action( 'after_setup_theme', 'wprecipes_setup' );
add_action( 'wp_enqueue_scripts', 'wprecipes_scripts' );
add_action( 'widgets_init', 'wprecipes_widget_init' );

/**
 * Theme Customizer
 * includes/customizer.php
 */
add_action( 'customize_register', 'wprecipes_customizer_settings' );

add_action( 'admin_init', 'wprecipes_remove_menus', 102 );

/**
 * WooCommerce theme support
 */
add_action( 'woocommerce_before_main_content', 'wprecipes_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'wprecipes_wrapper_end', 10 );
add_action( 'after_setup_theme', 'woocommerce_support' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_image_size( 'wprecipe-thumb', 300, 200, array( 'center', 'center' ) );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function wprecipes_wrapper_start() {
	echo '<section id="main">';
}

function wprecipes_wrapper_end() {
	echo '</section>';
}


/**
 * Filter custom post type archive
 */
add_action( 'pre_get_posts', 'custom_post_type_archive' );

function custom_post_type_archive( $query ) {

	if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'recipe' ) ) {

		$query->set( 'posts_per_page', '6' );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'DESC' );
	}

}


/**
 * Filter the Product post type archive.
 */
function wprecipes_modify_archive_queries( $query ) {
	if ( is_post_type_archive( array( 'recipe' ) ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', 16 );
	} elseif ( $query->is_tax( 'recipe-type' ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'wprecipes_modify_archive_queries' );