<?php
/**
 * One-click updater for Gather
 *
 * @package EDD Theme Updater
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	array(
		'remote_api_url' => 'https://devpress.com',
		'item_name' => 'Gather',
		'theme_slug' => 'gather',
		'version' => GATHER_VERSION,
		'author' => 'DevPress'
	)

);