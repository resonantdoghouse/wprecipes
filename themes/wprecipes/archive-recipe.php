<?php
/**
 * Front Page WP Recipes
 */
get_header(); ?>

    <div class="wprecipes__site">
        <main class="wprecipes__main">

            <h1 class="wprecipes__page-title"><?php echo post_type_archive_title(); ?></h1>

			<? if ( have_posts() ):
				while ( have_posts() ): the_post(); ?>

                    <article class="wprecipes__main__post">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h1 class="wprecipes__main__post__title">
								<?php echo esc_html( get_the_title() ); ?>
                            </h1>

							<?php if ( has_post_thumbnail() ):
								the_post_thumbnail( 'large' );
							endif; ?>
                        </a>
						<?php the_content(); ?>
                    </article>

				<?php endwhile;
			endif; ?>

        </main>
		<? get_sidebar(); ?>
    </div>

<?php get_footer();