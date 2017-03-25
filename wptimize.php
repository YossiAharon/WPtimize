<?php

/**
 * WPtimize
 *
 * @link              http://www.yossi.co.il/
 * @since             1.0.0
 * @package           Wptimize
 *
 * @wordpress-plugin
 * Plugin Name:       WPtimize
 * Plugin URI:        wptimize
 * Description:       Optimization and cleanup plugin for WordPress.
 * Version:           1.0.0
 * Author:            Yossi Aharon
 * Author URI:        http://www.yossi.co.il/
 * Donate link: https://www.paypal.me/YossiAharon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wptimize
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wptimize-activator.php
 */
function activate_wptimize() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wptimize-activator.php';
	Wptimize_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wptimize-deactivator.php
 */
function deactivate_wptimize() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wptimize-deactivator.php';
	Wptimize_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wptimize' );
register_deactivation_hook( __FILE__, 'deactivate_wptimize' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wptimize.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wptimize() {

	$plugin = new Wptimize();
	$plugin->run();

}
run_wptimize();
