<?php

get_header(); ?>

	<div class="wprecipes__site">
		<main class="wprecipes__main">
			<? if ( have_posts() ):
				while ( have_posts() ): the_post(); ?>
					<article class="wprecipes__main__post">
						<h1 class="wprecipes__page-title"><?php echo esc_html( get_the_title() ); ?></h1>
						<?php if ( has_post_thumbnail() ):
							the_post_thumbnail( 'large' );
						endif; ?>
						<?php the_content(); ?>
					</article>
				<?php endwhile;
			endif; ?>
		</main>
		<? get_sidebar(); ?>
	</div>

<?php get_footer();