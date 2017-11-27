<?php

class WPRecipes_Widget extends WP_Widget {
	function __construct() {
		parent::__construct( 'wprecipes__widget',
			__( 'Favourites', 'text_domain' ),
			array(
				'classname'   => 'wprecipes__widget',
				'description' => __( 'Favourite Recipes widget for displaying Favourite Recipes', 'text_domain' ),
			)
		);
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ):
			$title = $instance['title'];
		else:
			$title = __( 'Recipe Box', 'text_domain' );

		endif;
		?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:' ); ?>
            </label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) ):
			echo $args['before_title'] . $title . $args['after_title'];
		endif;

		echo '<div class="wprecipes__favourites">';

		$ids = get_user_meta( wp_get_current_user()->ID, 'wprecipes_post_ids', true );

		$args_query = array(
			'post_type'      => 'recipe',
			'orderby'        => 'DESC',
			'posts_per_page' => - 1,
			'numberposts'    => - 1,
			'post__in'       => $ids
		);

		$wprecipes_posts = get_posts( $args_query );

		if ( $ids ) :

			global $post;

			foreach ( $wprecipes_posts as $post ) : setup_postdata( $post );
				$img = wp_get_attachment_image_src( get_post_thumbnail_id() ); ?>

                <div class="wprecipes__favourites__item">
                    <div class="wprecipes__favourites__item__content">
                        <h2>
                            <a href="<?php echo get_the_permalink(); ?>">
								<?php the_title(); ?>
                            </a>
                        </h2>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img src="<?php echo $img[0]; ?>"
                                 alt="<?php echo get_the_title(); ?>"
                                 class="wprecipes__favourites__img">
                        </a>
                    </div>
                </div>

			<?php endforeach;
			wp_reset_postdata();

		else :

			if ( is_user_logged_in() ):
				echo '<p>' . __( 'No favourites yet', 'wprecipes' ) . '</p>';

            elseif ( ! is_user_logged_in() ):
	            echo '<p><a href="' . wp_login_url() . '">' . __( 'Login to add favourites', 'wprecipes' ) . '</a></p>';
			endif;

		endif;
		echo '</div>';

		echo $args['after_widget'];

	}

}