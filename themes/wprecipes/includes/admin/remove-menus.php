<?php

function wprecipes_remove_menus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
//	add_filter( 'acf/settings/show_admin', '__return_false' );
}