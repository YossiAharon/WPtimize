<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.yossi.co.il/
 * @since      1.0.0
 *
 * @package    Wptimize
 * @subpackage Wptimize/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wptimize
 * @subpackage Wptimize/public
 * @author     Yossi Aharon
 */
class Wptimize_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $options_slug, $options_data ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options_slug = $options_slug;
		$this->options_data = $options_data;
		$this->wptimize_options = get_option($this->options_slug);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wptimize-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wptimize-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Cleanup functions depending on each checkbox returned value in admin
     *
     * @since    1.0.0
     */
    // Cleanup head
    public function wptimize_cleanup() {

        if($this->wptimize_options['rsd_clean']){
            remove_action( 'wp_head', 'rsd_link' );
        }
		
		if($this->wptimize_options['wlwmanifest_clean']){
            remove_action( 'wp_head', 'wlwmanifest_link' );
        }
		
		if($this->wptimize_options['wp_generator_clean']){
            remove_action( 'wp_head', 'wp_generator' );
        }
		
		if($this->wptimize_options['shortlink_clean']){
            remove_action( 'wp_head', 'wp_shortlink_wp_head' );
        }
		
		if($this->wptimize_options['feed_links_clean']){
           remove_action( 'wp_head', 'feed_links', 2 );   
        }
		
		if($this->wptimize_options['feed_links_extra_clean']){
    		remove_action('wp_head', 'feed_links_extra', 3);
        }
		
		if($this->wptimize_options['rel_links_clean']){
    		remove_action( 'wp_head', 'index_rel_link' );
        }
		
		if($this->wptimize_options['canonical_clean']){
			remove_action( 'wp_head', 'rel_canonical', 10, 0 );
        }
		
		if($this->wptimize_options['emoji_clean']){
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
        }
		
		if($this->wptimize_options['js2footer']){
			remove_action('wp_head', 'wp_print_scripts');
			remove_action('wp_head', 'wp_print_head_scripts', 9);
			remove_action('wp_head', 'wp_enqueue_scripts', 1);

			add_action('wp_footer', 'wp_print_scripts', 5);
			add_action('wp_footer', 'wp_enqueue_scripts', 5);
			add_action('wp_footer', 'wp_print_head_scripts', 5);
        }
		
		if($this->wptimize_options['query_string_clean']){
		function remove_cssjs_ver( $src ) {
		 if( strpos( $src, '?ver=' ) )
		 $src = remove_query_arg( 'ver', $src );
		 return $src;
		}
		add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
		add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
        }
		
		if($this->wptimize_options['wp_api_clean']){
			remove_action( 'wp_head', 'rest_output_link_wp_head' );
        }
		
    }   

}
