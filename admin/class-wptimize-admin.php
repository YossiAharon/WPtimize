<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.yossi.co.il/
 * @since      1.0.0
 *
 * @package    Wptimize
 * @subpackage Wptimize/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wptimize
 * @subpackage Wptimize/admin
 * @author     Yossi Aharon <yossiaharon@yahoo.com>
 */
class Wptimize_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $options_slug, $options_data ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options_slug = $options_slug;
		$this->options_data = $options_data;
		$this->clean_my_head_options = get_option($this->options_slug);

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wptimize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptimize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wptimize-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wptimize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptimize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wptimize-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */	
	public function add_options_page() {
        $plugin_screen_hook_suffix = add_options_page( 
	__( 'WPtimize Settings', 'wptimize' ),
	__( 'WPtimize', 'wptimize' ),
	'manage_options', 
	$this->plugin_name, 
	array($this, 'display_options_page')
    );
	
	}
	
	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {
	   $settings_link = array(
		'<a href="' . admin_url( 'options-general.php?page=wptimize' ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}
	
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
		public function display_options_page() {
			include_once 'partials/wptimize-admin-display.php';
		}
		
	/**
	*
	* Update options and validate
	*
	**/ 
 public function options_update() {
        register_setting( $this->options_slug, $this->options_slug, array($this, 'validate') );
    }
    public function validate($input) {
        // All checkboxes inputs
        $options = wp_parse_args(get_option($this->options_slug), $this->options_data);
        $valid = array();

		//Cleanup
		$valid['rsd_clean'] = (isset($input['rsd_clean']) && !empty($input['rsd_clean'])) ? 1 : 0;
		$valid['wlwmanifest_clean'] = (isset($input['wlwmanifest_clean']) && !empty($input['wlwmanifest_clean'])) ? 1: 0;
		$valid['wp_generator_clean'] = (isset($input['wp_generator_clean']) && !empty($input['wp_generator_clean'])) ? 1 : 0;
		$valid['shortlink_clean'] = (isset($input['shortlink_clean']) && !empty($input['shortlink_clean'])) ? 1 : 0;
		$valid['feed_links_clean'] = (isset($input['feed_links_clean']) && !empty($input['feed_links_clean'])) ? 1 : 0;
		$valid['feed_links_extra_clean'] = (isset($input['feed_links_extra_clean']) && !empty($input['feed_links_extra_clean'])) ? 1 : 0;
		$valid['rel_links_clean'] = (isset($input['rel_links_clean']) && !empty($input['rel_links_clean'])) ? 1 : 0;
		$valid['canonical_clean'] = (isset($input['canonical_clean']) && !empty($input['canonical_clean'])) ? 1 : 0;
		$valid['emoji_clean'] = (isset($input['emoji_clean']) && !empty($input['emoji_clean'])) ? 1 : 0;
		$valid['js2footer'] = (isset($input['js2footer']) && !empty($input['js2footer'])) ? 1 : 0;
		$valid['query_string_clean'] = (isset($input['query_string_clean']) && !empty($input['query_string_clean'])) ? 1 : 0;
		$valid['wp_api_clean'] = (isset($input['wp_api_clean']) && !empty($input['wp_api_clean'])) ? 1 : 0;
	
		return $valid;
	 }

}
