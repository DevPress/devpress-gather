<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Gather
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function gather_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => '#posts-wrap',
		'footer'    => false,
		'footer_widgets' => 'footer',
		'render' => 'gather_infinite_scroll_render'
	) );
}
add_action( 'after_setup_theme', 'gather_jetpack_setup' );

/**
 * Used by JetPack to render the correct template part
 */
function gather_infinite_scroll_render() {
	while( have_posts() ) {
	    the_post();
	    get_template_part( 'content', 'masonry' );
	}
}
