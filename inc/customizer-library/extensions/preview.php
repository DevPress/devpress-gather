<?php
/**
 * Customizer Utility Functions
 *
 * @package Customizer_Library
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gather_customize_preview_js() {

	$path = get_template_directory_uri() . '/inc/customizer';

	wp_enqueue_script( 'gather_customizer', $path . '/js/customizer.js', array( 'customize-preview' ), GATHER_VERSION, true );

}
add_action( 'customize_preview_init', 'gather_customize_preview_js' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gather_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'gather_customize_register' );