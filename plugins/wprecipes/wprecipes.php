<?php
/**
 * WP Recipes Theme
 *
 * @package     WpRecipes
 * @author      BCW
 * @copyright   2017 BCW
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: WP Recipes
 * Plugin URI:  https://buildcreativewebsites.com
 * Description: WP Recipes
 * Version:     1.0.0
 * Author:      BCW
 * Author URI:  https://buildcreativewebsites.com
 * Text Domain: wprecipes
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


define( 'WPRECIPES_PATH', plugin_dir_path( __FILE__ ) );

require_once( WPRECIPES_PATH . 'post-type.php' );
require_once( WPRECIPES_PATH . 'taxonomy.php' );
require_once( WPRECIPES_PATH . 'widget.php' );
require_once( WPRECIPES_PATH . 'FavouriteRecipe.php' );


/**
 * Register Recipe Post-Type & Taxonomy
 */
add_action( 'init', 'wprecipes_recipe_post_type', 0 );
add_action( 'init', 'wprecipes_recipe_type', 0 );