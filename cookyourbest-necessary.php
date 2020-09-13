<?php
/**
 * Plugin Name: CookYourBest Plugin by Ramona Eid
 * Plugin URI: http://www.checklistme.com/Bio.html
 * Description: Do NOT deactivate or delete.  Necessary plugin for CookYourBest.com Website functionality.
 * Version: 0.0.02
 * Author: Ramona Eid
 * Author URI: http://www.checklistme.com/Bio.html
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: sustainable
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'COOKYOURBEST_VERSION', '0.0.02' );

add_action( 'init', 'cookyourbest_init' );

function cookyourbest_init() {
	include( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcodes.php' );

	/*wp_register_script($id, $path, $dependencies, $version, $in_footer);*/
	wp_register_script( 'cookyourbest-full', plugins_url( 'js/cookyourbest_full.js', __FILE__ ), array( 'jquery' ), COOKYOURBEST_VERSION, true );

	add_action( 'wp_enqueue_scripts', 'cookyourbest_enqueue_scripts' );

//	add_shortcode( 'sps-technical-columns', 'create_sps_technical_columns' );

    include_once('github-plugin-updater/updater.php');

    define('WP_GITHUB_FORCE_UPDATE', true);

    if (is_admin()) {

        $config = array(
            'slug' => plugin_basename(__FILE__),
            'proper_folder_name' => 'cookyourbest-necessary-by-ramona-eid',
            'api_url' => 'https://api.github.com/repos/RamonaEid/PluginCookYourBest',
            'raw_url' => 'https://raw.github.com/RamonaEid/PluginCookYourBest/master',
            'github_url' => 'https://github.com/RamonaEid/PluginCookYourBest',
            'zip_url' => 'https://github.com/RamonaEid/PluginCookYourBest/zipball/master',
            'sslverify' => true,
            'requires' => '3.0',
            'tested' => '3.3',
            'readme' => 'README.md',
            'access_token' => ''
        );

        new WP_GitHub_Updater($config);

    }

}

function cookyourbest_enqueue_scripts() {
	wp_enqueue_script( 'cookyourbest-full', plugins_url( 'js/cookyourbest_full.js', __FILE__ ), array( 'jquery' ), COOKYOURBEST_VERSION, true );
	// See: https://codex.wordpress.org/AJAX_in_Plugins
	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
//	wp_localize_script( 'sps-full', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
    // TODO: add named array values like:  gallery4249 => do_shortcode([foogallery id="4249c"])
//	wp_localize_script( 'sps-full', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), gallery4249 => do_shortcode('[foogallery id="4249"]') ) );
    wp_localize_script( 'cookyourbest-full', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

include( plugin_dir_path( __FILE__ ) . 'widgets/ramona-latest-news-and-articles.php' );
