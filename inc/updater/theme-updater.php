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
		'version' => '0.5.0',
		'author' => 'DevPress',
		'download_id' => '21186',
		'renew_url' => ''
	),
	// Strings should use theme textdomain
	$strings = array(
		'theme-license' => __( 'Theme License', 'gather' ),
		'enter-key' => __( 'Enter your theme license key.', 'gather' ),
		'license-key' => __( 'License Key', 'gather' ),
		'license-action' => __( 'License Action', 'gather' ),
		'deactivate-license' => __( 'Deactivate License', 'gather' ),
		'activate-license' => __( 'Activate License', 'gather' ),
		'status-unknown' => __( 'License status is unknown.', 'gather' ),
		'renew' => __( 'Renew?', 'gather' ),
		'unlimited' => __( 'unlimited', 'gather' ),
		'license-key-is-active' => __( 'License key is active.', 'gather' ),
		'expires%s' => __( 'Expires %s.', 'gather' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'gather' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'gather' ),
		'license-key-expired' => __( 'License key has expired.', 'gather' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'gather' ),
		'license-is-inactive' => __( 'License is inactive.', 'gather' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'gather' ),
		'site-is-inactive' => __( 'Site is inactive.', 'gather' ),
		'license-status-unknown' => __( 'License status is unknown.', 'gather' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'gather' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'gather' )
	)
);