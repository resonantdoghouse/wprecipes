<?php
/**
 * Register Widget Areas
 */
function wprecipes_widget_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'wprecipes' ),
		'id'            => 'main-sidebar',
		'description'   => __( 'Widgets appearing on all pages' ),
		'before_widget' => '<section id ="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}