<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo( 'name' ) . ' &dash; ' . get_the_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'wprecipes' ); ?>>
<header class="wprecipes__header">

    <div class="wprecipes--flex-wrapper">
        <a href="<?php echo home_url( '/' ); ?>" class="wprecipes__logo wprecipes--flex-wrapper__item">
            <div class="svg-hack">
                <!-- logo -->
                <svg class="wprecipes__logo__svg" baseProfile="basic" xmlns="http://www.w3.org/2000/svg"
                     x="0px" y="0px" width="128px" height="128px"
                     viewBox="0 0 128 128"
                     preserveAspectRatio="xMidYMid meet">
                    <path d="M63.848 29.312S17 26.368 17 66.048 63.848 128 63.848 128s46.976-22.272 46.976-61.952-46.976-36.736-46.976-36.736zm28.16-8.32C104.168 18.048 106.856 0 92.008 0c-14.72 0-15.36 9.088-19.84 18.688-1.024 2.304-2.176 4.224-3.456 5.888 4.224.128 8.576.64 12.672 1.536 3.2-2.176 6.912-4.224 10.624-5.12zm-56.32 0c3.84.896 7.424 2.944 10.752 5.12 4.992-1.024 9.472-1.408 12.672-1.536-1.28-1.664-2.56-3.584-3.584-5.888C51.048 9.088 50.536 0 35.688 0c-14.72 0-12.16 18.048 0 20.992z"/>
                    <title>Beet Logo</title>
                    <description><?php echo get_bloginfo( 'name' ); ?></description>
                </svg>
            </div>
        </a>
        <div class="wprecipes--flex-wrapper__item wprecipes__description"><?php echo get_bloginfo( 'description' ); ?></div>
        <div class="wprecipes--flex-wrapper__item wprecipes__toggle">
            <div id="wprecipes-nav-toggle" class="wprecipes__toggle-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div><!-- flex-wrapper -->
	<?php
	wp_nav_menu( array(
		'container'      => 'nav',
		'menu'           => 'WP Recipes Nav',
		'theme_location' => 'primary',
		'items_wrap'     => '<ul id="%1$s" class="wprecipes__nav %2$s">%3$s</ul>',
		'walker'         => new WPRecipes_Walker()
	) );
	?>
</header>
