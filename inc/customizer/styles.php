<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Gather
 * @credit Based on code from "Make" by The Theme Foundary
 */

if ( ! function_exists( 'gather_build_css_rules' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function gather_build_css_rules() {

	// Primary Color
	$setting = 'primary-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod !== gather_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );
		$color_obj = new Jetpack_Color( $color );

		// Link Styling
		gather_css()->add( array(
			'selectors' => array(
				'a',
				'.site-title a',
				'.masonry .entry-footer-meta a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

		// Button Styling
		gather_css()->add( array(
			'selectors' => array(
				'button',
				'.button',
				'input[type="button"]',
				'input[type="reset"]',
				'input[type="submit"]'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );

		// Button Hover State
		gather_css()->add( array(
			'selectors' => array(
				'button:hover',
				'.button:hover',
				'input[type="button"]:hover',
				'input[type="reset"]:hover',
				'input[type="submit"]:hover'
			),
			'declarations' => array(
				'background-color' => $color_obj->darken(5)
			)
		) );

	}

	// Secondary Color
	$setting = 'secondary-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod !== gather_get_default( $setting ) ) {

		// Colors
		gather_css()->add( array(
			'selectors' => array(
				'.site-title a:hover',
			),
			'declarations' => array(
				'color' => sanitize_hex_color( $color )
			)
		) );

	}

	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );
	$stack = gather_get_font_stack( $mod );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'body',
				'.site-description',
				'.widget-title',
				'.comments-title',
				'#reply-title'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );
	$stack = gather_get_font_stack( $mod );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'h1, h2, h3, h4, h5, h6',
				'.comment-author',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Menu Styling
	$menus = array(
		'primary',
		'secondary'
	);

	foreach ( $menus as $menu ) {

		if ( ! has_nav_menu( $menu ) ) {
			break;
		}

		if ( $menu == 'primary' ) {
			$selector = '#primary-navigation' . ' ';
		}

		if ( $menu == 'secondary' ) {
			$selector = '#secondary-navigation' . ' ';
		}

		// Background
		$setting = $menu . '-menu-background';
		$mod = get_theme_mod( $setting, false );

		if ( $mod ) {
			gather_css()->add( array(
				'selectors' => array(
					$selector,
					$selector . 'ul ul a:hover'
				),
				'declarations' => array(
					'background-color' => $mod
				)
			) );
		}

		// Background Hover
		$setting = $menu . '-menu-background-hover';
		$mod = get_theme_mod( $setting, false );

		if ( $mod ) {
			gather_css()->add( array(
				'selectors' => array(
					$selector . 'a:hover',
					$selector . 'li:hover a'
				),
				'declarations' => array(
					'background-color' => $mod
				)
			) );
		}

		// Navigation Text
		$setting = $menu . '-menu-color';
		$mod = get_theme_mod( $setting, false );

		if ( $mod ) {
			gather_css()->add( array(
				'selectors' => array(
					$selector . 'a',
					$selector . 'a:hover',
					$selector . 'li:hover a',
					$selector . '.dropdown-toggle:after'
				),
				'declarations' => array(
					'color' => $mod
				)
			) );
		}

		// Border
		$setting = $menu . '-menu-border';
		$mod = get_theme_mod( $setting, false );

		if ( $mod ) {
			gather_css()->add( array(
				'selectors' => array(
					$selector . 'ul',
					$selector . 'a',
					$selector . '.dropdown-toggle',
					$selector . 'ul ul',
					$selector . 'ul ul a',
					$selector . 'ul li:hover ul a',
					$selector . 'ul ul ul'
				),
				'declarations' => array(
					'border-color' => $mod
				)
			) );
		}

	}

	// Header Background Color
	$setting = 'header-background-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-color' => $mod
			)
		) );

	}

	// Header Background Image
	$setting = 'header-background-image';
	$mod = get_theme_mod( $setting, false );

	if ( $mod ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-image' => 'url(' . $mod . ')'
			)
		) );

	}

	// Header Background Image Styles
	$setting = 'header-background-image-style';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-size' => 'auto auto',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			)
		) );

	}

	// Center Header Text
	$setting = 'center-branding';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'text-align' => 'center'
			)
		) );

	}

	// Site Title Color
	$setting = 'site-title-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-title a'
			),
			'declarations' => array(
				'color' => $mod
			)
		) );

	}

	// Site Title Color
	$setting = 'site-title-hover-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-title a:hover'
			),
			'declarations' => array(
				'color' => $mod
			)
		) );

	}

	// Site Title Font
	$setting = 'site-title-font';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );
	$stack = gather_get_font_stack( $mod );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-title'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Site Tagline Color
	$setting = 'site-tagline-color';
	$mod = get_theme_mod( $setting, gather_get_default( $setting ) );

	if ( $mod != gather_get_default( $setting ) ) {

		gather_css()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'color' => $mod
			)
		) );

	}

}
endif;

add_action( 'gather_css', 'gather_build_css_rules' );

if ( ! function_exists( 'gather_display_customizations' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "gather_css" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function gather_display_customizations() {

	do_action( 'gather_css' );

	// Echo the rules
	$css = gather_css()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Gather Custom CSS -->\n<style type=\"text/css\" id=\"gather-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Gather Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'gather_display_customizations', 11 );
