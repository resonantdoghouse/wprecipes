<?php
/**
 * Front Page WP Recipes
 */
get_header(); ?>

    <div class="wprecipes__site">
        <main class="wprecipes__main">

			<? if ( have_posts() ): while ( have_posts() ): the_post(); ?>

                <article class="wprecipes__main__post">
                    <h1 class="wprecipes__page-title"><?php echo esc_html( get_the_title() ); ?></h1>

					<?php if ( has_post_thumbnail() ):
						the_post_thumbnail( 'large' );
					endif;

					the_content();

					/**
					 * ACF repeater
					 */
					if ( have_rows( 'wprecipes_recipe_ingredients' ) ): ?>
                        <section id="wprecipes-recipe" class="wprecipes__recipe">
                            <button id="wprecipes-increase-recipe">&plus;</button>
                            <button id="wprecipes-decrease-recipe">&minus;</button>
                            <ul class="wprecipes__recipe__items">
								<?php while ( have_rows( 'wprecipes_recipe_ingredients' ) ) : the_row(); ?>
                                    <li class="wprecipes__recipe__items__item">
											<span class="wprecipes__recipe__items__item__quantity">
                                                <?php the_sub_field( 'wprecipes_recipe_ingredient_quantity' ); ?>
                                            </span>
										<?php the_sub_field( 'wprecipes_recipe_ingredient_quantity_measurement' ); ?>
                                        <strong><?php the_sub_field( 'wprecipes_recipe_ingredient' ); ?></strong>
                                        <input class="ingredient-checked" type="checkbox">
                                    </li>
								<?php endwhile; ?>
                            </ul>

                            <ul>
								<?php
								/**
								 * Taxonomy Terms
								 */
								$recipe_term_list = wp_get_post_terms( $post->ID, 'recipe-type',
									array( "fields" => "all" ) );

								foreach ( $recipe_term_list as $recipe_term ): ?>
                                    <li>
                                        <a href="<?php echo get_term_link( $recipe_term ); ?>">
											<?php echo $recipe_term->name; ?>
                                        </a>
                                    </li>
								<?php endforeach; ?>
                            </ul>

                        </section>

					<?php else : // no rows found
					endif; ?>

                </article>

			<?php endwhile; // have_posts ?>

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

			<?php endif; // have_posts ?>

            <section id="related-products">
                <h1><?php _e( 'Related Products', 'wprecipes' ); ?></h1>

				<?php
				$recipe_related_products_key = 'wprecipes_related_products';
				$recipe_related_products_obj = get_field_object( $recipe_related_products_key );
				$recipe_related_products     = get_field( $recipe_related_products_key );

				if ( $recipe_related_products ): ?>
                    <ul class="wprecipes__related-products">
						<?php foreach ( $recipe_related_products as $post ): ?>
							<?php setup_postdata( $post ); ?>
                            <li class="wprecipes__related-products__item">
                                <a href="<?php the_permalink(); ?>">
									<?php the_title( '<h3>', '</h3>' ); ?>
									<?php if ( has_post_thumbnail() ):
										the_post_thumbnail( 'thumbnail' );
									endif; ?>
                                </a>
                            </li>
							<?php

						endforeach; ?>
                    </ul>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </section>

        </main>
		<? get_sidebar(); ?>
    </div>
<?php get_footer();