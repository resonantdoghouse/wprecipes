<?php
/**
 * Register Menus
 */
function wprecipes_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu' ),
			'footer'  => __( 'Footer Menu' )
		)
	);
}