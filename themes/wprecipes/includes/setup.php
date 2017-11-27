<?php
/**
 * Register Features
 */
if ( ! function_exists( 'wprecipes_setup' ) ):

	function wprecipes_setup() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	}

endif;