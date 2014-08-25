<?php
/**
 * Functions used to implement options
 *
 * @package Gather
 */

/**
 * Get default footer text
 *
 * @return string $text
 */
function gather_get_default_footer_text() {
	$text = sprintf(
		__( 'Powered by %s', 'gather' ),
		'<a href="' . esc_url( __( 'http://wordpress.org/', 'gather' ) ) . '">WordPress</a>'
	);
	$text .= '<span class="sep"> | </span>';
	$text .= sprintf(
		__( '%1$s by %2$s.', 'gather' ),
			'Gather Theme',
			'<a href="http://devpress.com/" rel="designer">DevPress</a>'
	);
	return $text;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Gather 0.1
 */
function gather_body_classes( $classes ) {

	if ( gather_load_masonry() ) {
		$classes[] = get_theme_mod( 'archive-layout', customizer_library_get_default( 'archive-layout' ) );
		$classes[] = 'masonry';
	}

	if ( gather_show_sidebar() ) {
		$classes[] = get_theme_mod( 'standard-layout', customizer_library_get_default( 'standard-layout' ) );
	} else {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'gather_body_classes' );

/**
 * Conditional logic for displaying sidebar
 *
 * @since Gather 0.1
 */
 function gather_show_sidebar() {

 	 // If an archive page is displayed and display sidebar on archives is checked
 	if ( !is_singular() && !is_404() && !is_author() && !is_search() && !get_theme_mod( 'archive-sidebar', '0' ) ) {
	 	return false;
 	}

 	// If the "no-sidebar" customizer option is selected return false
 	if ( get_theme_mod( 'standard-layout', 'sidebar-right' ) == 'no-sidebar' ) {
	 	return false;
 	}

 	return true;
}

/**
 * Conditional logic for loading masonry script
 *
 * @since Gather 0.1
 */
 function gather_load_masonry() {

 	if ( !is_singular() && !is_404() && !is_author() && !is_search() ) {
 		$archive_layout = get_theme_mod( 'archive-layout', customizer_library_get_default( 'archive-layout' ) );
 		if ( $archive_layout != 'standard' ) {
 			return true;
 		}
 	}

 	return false;
 }

/**
 * Outputs the number of masonry columns as a data attribute
 *
 * @since Gather 0.1
 */
 function gather_get_columns() {
	 $layout = get_theme_mod( 'archive-layout', customizer_library_get_default( 'archive-layout' ) );
	 switch ( $layout ) {
	 	case '4-column-masonry':
	 		return '4';
	 	case '3-column-masonry':
	 		return '3';
	 	case '2-column-masonry':
	 		return '2';
	 	default:
	 		return '0';
	 }
 }

/**
 * Outputs search icon in menu based on customizer option
 *
 * @since Gather 0.1
 */
function gather_search_in_menu( $items, $args ) {

	if (
		( get_theme_mod( 'primary-menu-search', false ) && 'primary' == $args->theme_location ) ||
		( get_theme_mod( 'secondary-menu-search', false ) && 'secondary' == $args->theme_location )
	) :

		$selector = '#' . $args->theme_location . '-navigation .toggle-search';
	    $items .= '<li class="menu-item menu-search">';
	    $items .= '<a class="toggle-search-link" href="#search" data-toggle="' . $selector . '">';
	    $items .= '<span class="screen-reader-text">' . __( 'Search', 'gather' ) . '</span>';
	    $items .= '</a></li>';
	    $items .= '<div class="toggle-search">' . get_search_form( false ) . '</div>';

	endif;

    return $items;
}
add_filter( 'wp_nav_menu_items', 'gather_search_in_menu', 10, 2 );

/**
 * Append class "social" to specific off-site links
 *
 * @since Gather 0.1
 */
function gather_social_nav_class( $classes, $item ) {

    if ( 0 == $item->parent && 'custom' == $item->type) {

    	$url = parse_url( $item->url );
    	$base = str_replace( "www.", "", $url['host'] );

    	// @TODO Make this filterable
    	$social = array(
    		'behance.com',
    		'dribbble.com',
    		'facebook.com',
    		'flickr.com',
    		'github.com',
    		'linkedin.com',
    		'pinterest.com',
    		'plus.google.com',
    		'instagr.am',
    		'instagram.com',
    		'skype.com',
    		'spotify.com',
    		'tumblr.com',
    		'twitter.com',
    		'vimeo.com'
    	);

    	if ( in_array( $base, $social ) ) {
	    	$classes[] = 'social';
    	}

    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'gather_social_nav_class', 10, 2 );