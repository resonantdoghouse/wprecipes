<?php
/**
 * Sidebar Template WP Recipes
 */

if ( is_active_sidebar( 'main-sidebar' ) ): ?>

    <aside class="wprecipes__sidebar sidebar widget-area">
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
    </aside>

<?php endif; ?>