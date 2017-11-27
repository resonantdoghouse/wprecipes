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

        </main>
		<? get_sidebar(); ?>
    </div>
<?php get_footer();