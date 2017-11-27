<?php

/**
 * Favourites Reverse Engineered from Read Me Later:
 * https://www.sitepoint.com/premium/books/better-wordpress-development
 *
 * TODO update to use rest api
 */
if ( ! class_exists( 'FavouriteRecipe' ) ) {
	class FavouriteRecipe {

		public function __construct() {
			$this->init();
		}

		/**
		 * Action hooks
		 */
		public function init() {
//		add_filter( 'the_excerpt', array( $this, 'favourite_button' ) );
			add_filter( 'the_content', array( $this, 'favourite_button' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'wprecipes_enqueue_scripts' ) );
			add_action( 'wp_ajax_wprecipes_favourite', array( $this, 'read_me_later' ) );
			add_action( 'widgets_init', array( $this, 'wprecipes_register_widgets' ) );
		}

		public function wprecipes_enqueue_scripts() {
			wp_enqueue_script( 'wprecipes_favourites', plugins_url( 'src/js/wprecipes-favourites.js', __FILE__ ),
				array( 'jquery' ), null, true );
			wp_localize_script( 'wprecipes_favourites', 'wprecipes_favourite', array(
				'ajax_url'    => admin_url( 'admin-ajax.php' ),
				'check_nonce' => wp_create_nonce( 'wprecipes-nonce' ),
				'the_id'      => get_the_ID()
			) );
		}

		public function favourite_button( $content ) {
			if ( is_user_logged_in() && get_post_type() == 'recipe' && is_single() ) {
				$html    = '<a href="#" class="wprecipes__favourites__btn" data-id="' . get_the_ID() . '">Add to Favourites</a>';
				$content .= $html;
			}

			return $content;
		}

		public function read_me_later() {
			check_ajax_referer( 'wprecipes-nonce', 'security' );
			$wprecipes_post_id = $_POST['post_id'];
			$echo              = array();

			if ( get_user_meta( wp_get_current_user()->ID, 'wprecipes_post_ids', true ) !== null ) {
				$value = get_user_meta( wp_get_current_user()->ID, 'wprecipes_post_ids', true );
			}
			if ( $value ) {
				$echo = $value;
				array_push( $echo, $wprecipes_post_id );
			} else {
				$echo = array( $wprecipes_post_id );
			}

			update_user_meta( wp_get_current_user()->ID, 'wprecipes_post_ids', $echo );
			$ids = get_user_meta( wp_get_current_user()->ID, 'wprecipes_post_ids', true );

			// Query read me later posts
			$args = array(
				'post_type'      => 'recipe',
				'orderby'        => 'DESC',
				'posts_per_page' => - 1,
				'numberposts'    => - 1,
				'post__in'       => $ids
			);

			$wprecipes_posts = get_posts( $args );

			if ( $ids ) :

				global $post;

				foreach ( $wprecipes_posts as $post ) :

					setup_postdata( $post );
					$img = wp_get_attachment_image_src( get_post_thumbnail_id() ); ?>

                    <div class="wprecipes__favourites__post">
                        <div class="wprecipes__favourites__post__content">
                            <h5>
                                <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <img src="<?php echo $img[0]; ?>"
                             alt="<?php echo get_the_title(); ?>"
                             class="wprecipes__favourites__post__img">
                    </div>

				<?php endforeach;
				wp_reset_postdata();
			endif;

		}

		public function wprecipes_register_widgets() {
			register_widget( 'WPRecipes_Widget' );
		}
	}

	/**
	 * Instantiate FavouriteRecipe Class
	 */
	new FavouriteRecipe;

}