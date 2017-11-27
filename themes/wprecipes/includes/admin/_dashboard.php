<?php

class WPRecipes_Dashboard_Widget {

	public function __construct() {

		add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );

	}

	public function add_dashboard_widget() {

		wp_add_dashboard_widget(
			'wprecipes_dashboard',
			__( 'WP Recipes', 'wprecipes' ),
			array( $this, 'render_dashboard_widget' ),
			array( $this, 'save_dashboard_widget' )
		);

	}

	public function render_dashboard_widget() {

		$args    = array( 'posts_per_page' => 6, 'post_type' => 'recipe', 'orderby' => 'rand' );
		$myposts = get_posts( $args );


		ob_start();
		echo '<ul>';

		foreach ( $myposts as $post ) : setup_postdata( $post );
//			d($post);
			echo '<li>';
			echo '<a href="' . $post->guid .'">';
			echo $post->post_title . '</a>';
			echo '<p>' . $post->post_content . '</p>';
			echo '</li>';

		endforeach;

		echo '<ul>';

		$content = ob_get_clean();
		wp_reset_postdata();


		echo $content;


	}

	public function save_dashboard_widget() {


	}

}

new WPRecipes_Dashboard_Widget;