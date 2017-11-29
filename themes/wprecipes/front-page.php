<?php
/**
 * Front Page WP Recipes
 */
get_header(); ?>
    <div class="wprecipes__site">
        <main class="wprecipes__main">

            <section id="wprecipes-recipes">
                <h1><?php _e( 'Recipes', 'wprecipes' ); ?></h1>
                <div class="wprecipes__owlcarousel">
                    <div class="owl-carousel owl-theme">
						<?
						/**
						 * Recipe Posts Loop
						 */
						if ( have_posts() ):
							$args = array( 'posts_per_page' => 6, 'post_type' => 'recipe' );
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                                <article class="wprecipes__main__post">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <h1 class="wprecipes__page-title"><?php echo esc_html( get_the_title() ); ?></h1>
										<?php if ( has_post_thumbnail() ):
											the_post_thumbnail( 'wprecipe-thumb' );
										endif; ?>
                                    </a>
                                </article>
							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
                    </div>
                </div>
            </section>

            <section id="wprecipes-posts">
                <h1><?php _e( 'Posts', 'wprecipes' ); ?></h1>
                <div class="wprecipes__owlcarousel">
                    <div class="owl-carousel owl-theme">
						<?
						/**
						 * Recipe Posts Loop
						 */
						if ( have_posts() ):
							$args = array( 'posts_per_page' => 6, 'post' => 'recipe' );
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                                <article class="wprecipes__main__post">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <h1 class="wprecipes__page-title"><?php echo esc_html( get_the_title() ); ?></h1>
										<?php if ( has_post_thumbnail() ):
											the_post_thumbnail( 'wprecipe-thumb' );
										endif; ?>
                                    </a>
                                </article>
							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
                    </div>
                </div>
            </section>

            <section>
                <h1><?php _e( 'More Recipes', 'wprecipes' ); ?></h1>
				<?php
				$args_recipes = array(
					'post_type'      => 'recipe',
					'post_status'    => 'publish',
					'posts_per_page' => 3,
					'orderby'        => 'rand',
					'paged'          => true
				);
				$the_query    = new WP_Query( $args_recipes );
				?>

				<?php
				if ( $the_query->have_posts() ) { ?>
                    <ul class="wprecipes__list">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li class="wprecipes__list__item">
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </li>
						<?php endwhile; ?>
                    </ul>

                    <div class="wprecipes__postnav__wrapper">
						<?php
						the_post_navigation( array(
							'prev_text'          => __( 'prev recipe: %title' ),
							'next_text'          => __( 'next recipe: %title' ),
							'in_same_term'       => false,
							'taxonomy'           => __( 'recipe-type' ),
							'screen_reader_text' => __( 'Continue Reading' ),
						) );
						?>
                    </div>

					<?php


					/* Restore original Post Data */
					wp_reset_postdata();


				} else {
					// no posts found
				}


				?>
            </section>

        </main>
		<? get_sidebar(); ?>
    </div>
<?php get_footer();