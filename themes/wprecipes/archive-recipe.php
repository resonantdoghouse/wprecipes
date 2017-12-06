<?php
/**
 * Front Page WP Recipes
 */
get_header(); ?>
    <div class="wprecipes__site">
        <main class="wprecipes__main">
            <h1 class="wprecipes__page-title"><?php echo post_type_archive_title(); ?></h1>


            <div class="recipes-dropdown">
                <form id="recipe-category-select" class="recipe-category-select" method="get">
					<?php
					// Create and display the dropdown menu.
					wp_dropdown_categories(
						array(
							'orderby'         => 'NAME',
							'taxonomy'        => 'recipe-type',
							'name'            => 'recipe-types',
							'show_option_all' => 'All Recipes',
							'selected'        => wprecipes_get_selected_taxonomy_dropdown_term(),
						) );
					?>
                    <input type="submit" value="View"/>
                </form>
            </div>

            <section id="recipe-listing" class="wprecipes__main__grid">
				<?php $recipes_in_taxonomy_term = wprecipes_get_recipes_in_taxonomy_term();

				if ( $recipes_in_taxonomy_term->have_posts() ) :
					while ( $recipes_in_taxonomy_term->have_posts() ) : $recipes_in_taxonomy_term->the_post(); ?>
                        <article class="wprecipes__main__post wprecipes__main__grid__item">
                            <a href="<?php the_permalink(); ?>">
                                <h1 class="wprecipes__main__post__title"><?php the_title(); ?></h1>
								<?php if ( has_post_thumbnail() ):
									the_post_thumbnail( 'large' );
								endif; ?>
                                <p><?php the_content(); ?></p>
                            </a>
                        </article>
					<?php endwhile;
					wp_reset_postdata(); ?>

				<?php endif; ?>
            </section>

        </main>
		<? get_sidebar(); ?>
    </div>
<?php get_footer();