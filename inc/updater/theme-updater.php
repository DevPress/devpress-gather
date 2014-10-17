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

	// Config settings
	$config = array(
		'remote_api_url' => 'https://devpress.com',
		'item_name' => 'Gather',
		'theme_slug' => 'gather',
		'version' => '0.6.0',
		'author' => 'DevPress',
		'download_id' => '21186',
	)

);