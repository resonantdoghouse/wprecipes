<?php

/**
 * Class WPRecipes_Walker
 */
class WPRecipes_Walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;

		$output .= "<li class='wprecipes__nav__item" . implode( " ", $item->classes ) . "'>";

		//Add SPAN if no Permalink
		if ( $permalink && $permalink != '#' ) {
			$output .= '<a class="wprecipes__nav__item__link" href="' . $permalink . '">';
		} else {
			$output .= '<span>';
		}

		$output .= $title;
		if ( $description != '' && $depth == 0 ) {
//			$output .= '<small class="description">' . $description . '</small>';
		}
		if ( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}
}