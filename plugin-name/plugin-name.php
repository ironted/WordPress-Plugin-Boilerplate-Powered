<?php

/**
  //WPBPGen{{#unless author_name}}
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
  //{{/unless}}
 * @package   Plugin_Name
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   {{author_license}}
 * @link      {{author_url}}
 *
 * Plugin Name:       {{plugin_name}}
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           {{plugin_version}}
 * Author:            {{author_name}}
 * Author URI:        {{author_url}}
 * Text Domain:       plugin-name
 * License:           {{author_license}}
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * WordPress-Plugin-Boilerplate-Powered: v2.0.4
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

define( 'PN_VERSION', '{{plugin_version}}' );
define( 'PN_TEXTDOMAIN', 'plugin-name' );
define( 'PN_NAME', '{{plugin_name}}' );

function pn_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), PN_TEXTDOMAIN );
	load_textdomain( PN_TEXTDOMAIN, trailingslashit( WP_PLUGIN_DIR ) . PN_TEXTDOMAIN . '/languages/' . PN_TEXTDOMAIN . '-' . $locale . '.mo' );
}

add_action( 'plugins_loaded', 'pn_load_plugin_textdomain', 1 );

require_once( plugin_dir_path( __FILE__ ) . 'composer/autoload.php' );

//WPBPGen{{#unless libraries_freemius__wordpress-sdk}}
/**
 * Create a helper function for easy SDK access.
 * 
 * @global type $pn_fs
 * @return object
 */
function pn_fs() {
	global $pn_fs;

	if ( !isset( $pn_fs ) ) {
		$pn_fs = fs_dynamic_init( array(
			'id' => '',
			'slug' => 'plugin-name',
			'public_key' => '',
			'is_live' => false,
			'is_premium' => true,
			'has_addons' => false,
			'has_paid_plans' => true,
			'menu' => array(
				'slug' => 'plugin-name'
			),
				) );
	}

	return $pn_fs;
}

// Init Freemius.
// pn_fs();
//{{/unless}}

require_once( plugin_dir_path( __FILE__ ) . 'public/Plugin_Name.php' );
//WPBPGen{{#unless act-deact_actdeact}}
require_once( plugin_dir_path( __FILE__ ) . 'includes/PN_ActDeact.php' );
//{{/unless}}
//WPBPGen{{#unless act-deact_uninstall}}
require_once( plugin_dir_path( __FILE__ ) . 'includes/PN_Uninstall.php' );
//{{/unless}}
//WPBPGen{{#unless wpcli}}
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/PN_WPCli.php' );
}
//{{/unless}}
//WPBPGen{{#unless libraries_wpackagist-plugin__posts-to-posts}}
require_once( plugin_dir_path( __FILE__ ) . 'includes/PN_P2P.php' );
//{{/unless}}
//WPBPGen{{#unless libraries_wpbp__fakepage}}
require_once( plugin_dir_path( __FILE__ ) . 'includes/PN_FakePage.php' );
//{{/unless}}
//WPBPGen{{#if admin-page}}
/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */

if ( is_admin() &&
		(function_exists( 'wp_doing_ajax' ) && !wp_doing_ajax() ||
		(!defined( 'DOING_AJAX' ) || !DOING_AJAX ) )
 ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/Plugin_Name_Admin.php' );
}
//{{/if}}
