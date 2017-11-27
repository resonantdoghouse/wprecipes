<footer class="wprecipes__footer">

    <div class="wprecipes__footer__nav">
		<?php
		wp_nav_menu( array(
			'menu'           => 'WP Recipes Nav',
			'theme_location' => 'footer'
		) );
		?>
    </div>

    <div class="wprecipes__info">
        <span><?php echo get_bloginfo( 'name' ); ?></span>
        <time><?php echo date( 'Y' ); ?></time>
    </div>
</footer>
</body>
</html>

<?php wp_footer();