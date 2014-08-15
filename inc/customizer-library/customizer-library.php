<?php
/**
 * Customizer Library
 *
 * @package		Customizer_Library
 * @author		Devin Price
 * @license   	GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Helper functions to output the customizer controls.
require plugin_dir_path( __FILE__ ) . 'extensions/interface.php';

// Helper functions for customizer sanitization.
require plugin_dir_path( __FILE__ ) . 'extensions/sanitization.php';

// Helper functions to build the inline CSS.
require plugin_dir_path( __FILE__ ) . 'extensions/style-builder.php';

// Helper functions for fonts.
require plugin_dir_path( __FILE__ ) . 'extensions/fonts.php';

// Utility functions for the customizer.
require plugin_dir_path( __FILE__ ) . 'extensions/utilities.php';

// Customizer preview functions.
require plugin_dir_path( __FILE__ ) . 'extensions/preview.php';

// Custom controls for the theme customizer.
require plugin_dir_path( __FILE__ ) . 'custom-controls/textarea.php';