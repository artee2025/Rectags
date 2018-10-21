<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://artee.io/
 * @since             1.0.0
 * @package           RecTags
 *
 * @wordpress-plugin
 * Plugin Name:       RecTags
 * Plugin URI:        http://artee.io/pr/rectags/
 * Description:       Tab cloud in the form of rectangles
 * Version:           1.0.0
 * Author:            Artee
 * Author URI:        http://artee.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rectags
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RECTAGS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rectags-activator.php
 */
function activate_rectags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rectags-activator.php';
	Rectags_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rectags-deactivator.php
 */
function deactivate_rectags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rectags-deactivator.php';
	Rectags_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rectags' );
register_deactivation_hook( __FILE__, 'deactivate_rectags' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rectags.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rectags() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_rectags();
